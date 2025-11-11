<?php
// index.php - Simple "Buka Jastip" app (SQLite + PDO)
// Usage: drop in htdocs, open http://localhost/index.php

session_start();
$dbFile = __DIR__ . '/data/jastip.db';
if (!is_dir(__DIR__ . '/data')) mkdir(__DIR__ . '/data', 0755, true);

// Initialize DB if needed
$init = !file_exists($dbFile);
$pdo = new PDO('sqlite:' . $dbFile);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if ($init) {
    $pdo->exec("
        CREATE TABLE users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT NOT NULL,
            balance INTEGER DEFAULT 0
        );
        CREATE TABLE jastip_sessions (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_id INTEGER,
            open_time TEXT, -- ISO datetime
            close_time TEXT, -- ISO datetime
            slot_count INTEGER DEFAULT 0,
            shipping_fee INTEGER DEFAULT 0,
            status TEXT DEFAULT 'closed', -- open, closed
            created_at TEXT DEFAULT CURRENT_TIMESTAMP,
            updated_at TEXT DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY(user_id) REFERENCES users(id)
        );
    ");
    // Seed example user and one closed session
    $stmt = $pdo->prepare("INSERT INTO users (name, balance) VALUES (?, ?)");
    $stmt->execute(['Ruddy', 7500000]); // Rp 75.000,00 -> store in cents/IDR int
    $userId = $pdo->lastInsertId();
    $stmt = $pdo->prepare("INSERT INTO jastip_sessions (user_id, open_time, close_time, slot_count, shipping_fee, status) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$userId, null, null, 0, 0, 'closed']);
}

// helper: get the (first) user
$user = $pdo->query("SELECT * FROM users LIMIT 1")->fetch(PDO::FETCH_ASSOC);
$session = $pdo->query("SELECT * FROM jastip_sessions WHERE user_id = {$user['id']} ORDER BY id DESC LIMIT 1")->fetch(PDO::FETCH_ASSOC);

// Basic routing by action param
$action = $_REQUEST['action'] ?? 'home';
$messages = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($action === 'save_settings') {
        // sanitize
        $open = trim($_POST['open_time'] ?? '');
        $close = trim($_POST['close_time'] ?? '');
        $slots = intval($_POST['slot_count'] ?? 0);
        $fee = intval($_POST['shipping_fee'] ?? 0);

        // update or insert session
        if ($session) {
            $stmt = $pdo->prepare("UPDATE jastip_sessions SET open_time = ?, close_time = ?, slot_count = ?, shipping_fee = ?, updated_at = CURRENT_TIMESTAMP WHERE id = ?");
            $stmt->execute([$open ?: null, $close ?: null, $slots, $fee, $session['id']]);
        } else {
            $stmt = $pdo->prepare("INSERT INTO jastip_sessions (user_id, open_time, close_time, slot_count, shipping_fee, status) VALUES (?, ?, ?, ?, ?, 'closed')");
            $stmt->execute([$user['id'], $open ?: null, $close ?: null, $slots, $fee]);
        }
        $messages[] = "Pengaturan tersimpan.";
        header("Location: index.php?action=home&msg=" . urlencode(implode(';', $messages)));
        exit;
    }

    if ($action === 'start') {
        // start jastip -> require at least slot_count >0 and open/close times set
        $s = $pdo->query("SELECT * FROM jastip_sessions WHERE user_id = {$user['id']} ORDER BY id DESC LIMIT 1")->fetch(PDO::FETCH_ASSOC);
        if (!$s || !$s['open_time'] || !$s['close_time'] || $s['slot_count'] <= 0) {
            $messages[] = "Data jastip belum lengkap: pastikan jam buka/tutup, jumlah slot, dan biaya pengiriman sudah diisi.";
        } else {
            $stmt = $pdo->prepare("UPDATE jastip_sessions SET status = 'open', updated_at = CURRENT_TIMESTAMP WHERE id = ?");
            $stmt->execute([$s['id']]);
            $messages[] = "Jastip dibuka.";
        }
        header("Location: index.php?action=home&msg=" . urlencode(implode(';', $messages)));
        exit;
    }

    if ($action === 'end') {
        $s = $pdo->query("SELECT * FROM jastip_sessions WHERE user_id = {$user['id']} ORDER BY id DESC LIMIT 1")->fetch(PDO::FETCH_ASSOC);
        if ($s && $s['status'] === 'open') {
            $stmt = $pdo->prepare("UPDATE jastip_sessions SET status = 'closed', updated_at = CURRENT_TIMESTAMP WHERE id = ?");
            $stmt->execute([$s['id']]);
            $messages[] = "Jastip ditutup.";
        } else {
            $messages[] = "Tidak ada jastip yang sedang dibuka.";
        }
        header("Location: index.php?action=home&msg=" . urlencode(implode(';', $messages)));
        exit;
    }
}

// reload session after mutations
$session = $pdo->query("SELECT * FROM jastip_sessions WHERE user_id = {$user['id']} ORDER BY id DESC LIMIT 1")->fetch(PDO::FETCH_ASSOC);
$msg = $_GET['msg'] ?? '';

function rupiah($n) {
    return 'Rp ' . number_format($n, 0, ',', '.');
}

// Simple HTML UI
?>
<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Buka Jastip - Demo</title>
<style>
    body { font-family: Arial, sans-serif; background:#f4f4f6; margin:0; padding:20px; color:#222; }
    .container { max-width:980px; margin:0 auto; }
    header { background:linear-gradient(#2f2f2f,#111); color:#fff; padding:18px 24px; border-radius:8px; text-align:center; }
    .grid { display:flex; gap:20px; margin-top:20px; }
    .col { background:#fff; padding:18px; border-radius:8px; box-shadow:0 2px 6px rgba(0,0,0,0.06); flex:1; }
    .profile { width:260px; }
    .profile .avatar { width:64px; height:64px; border-radius:50%; background:#ddd; display:inline-block; vertical-align:middle; margin-right:10px; }
    .btn { display:inline-block; padding:10px 14px; border-radius:8px; text-decoration:none; border:0; cursor:pointer; }
    .btn-primary { background:#ff9f1c; color:#fff; }
    .btn-danger { background:#ff4d4f; color:#fff; }
    .small { font-size:0.9em; color:#555; }
    form label{ display:block; margin:10px 0 6px; font-weight:600; }
    input[type="time"], input[type="number"], input[type="text"] { width:100%; padding:8px; border-radius:6px; border:1px solid #ddd; }
    .status { padding:12px; border-radius:8px; margin-top:12px; }
    .status.open { background:#e6fff2; color:#006b3c; border:1px solid #cdeed8; }
    .status.closed { background:#fff0f0; color:#8b0000; border:1px solid #ffd6d6; }
    .note { font-size:0.9em; color:#666; margin-top:8px; }
    .messages { margin-top:10px; color:#1b5e20; }
</style>
</head>
<body>
<div class="container">
    <header>
        <h1>Buka Jastip</h1>
        <div class="small">Demo sederhana fitur buka jastip — isi pengaturan lalu mulai/akhiri jastip</div>
    </header>

    <div class="grid" style="margin-top:18px;">
        <div class="col profile" style="flex:0 0 260px;">
            <div style="display:flex;align-items:center;">
                <div class="avatar"></div>
                <div>
                    <div style="font-weight:700; font-size:1.1em;"><?php echo htmlspecialchars($user['name']); ?></div>
                    <div class="small">Saldo sesi ini</div>
                    <div style="margin-top:8px; font-weight:700; color:#ff8f00;"><?php echo rupiah($user['balance']/100); ?></div>
                </div>
            </div>

            <div style="margin-top:18px;">
                <a class="btn" href="index.php?action=home">Beranda</a>
                <a class="btn" href="index.php?action=settings">Atur Jastip</a>
            </div>

            <div style="margin-top:16px;">
                <div class="small">Info</div>
                <ul>
                    <li class="small">Isi jam buka / tutup sesuai jam operasional</li>
                    <li class="small">Jumlah slot menentukan kapasitas order</li>
                    <li class="small">Biaya pengiriman per order (IDR)</li>
                </ul>
            </div>
        </div>

        <div class="col">
            <?php if($msg): ?>
                <div class="messages"><?php echo htmlspecialchars($msg); ?></div>
            <?php endif; ?>

            <?php if($action === 'settings'): ?>
                <h2>Atur Jastip Anda</h2>
                <form method="post" action="index.php?action=save_settings">
                    <label>Jam Buka (HH:MM)</label>
                    <input type="time" name="open_time" value="<?php echo htmlspecialchars($session['open_time'] ? date('H:i', strtotime($session['open_time'])) : ''); ?>" />

                    <label>Jam Tutup (HH:MM)</label>
                    <input type="time" name="close_time" value="<?php echo htmlspecialchars($session['close_time'] ? date('H:i', strtotime($session['close_time'])) : ''); ?>" />

                    <label>Jumlah Slot</label>
                    <input type="number" name="slot_count" min="0" value="<?php echo htmlspecialchars($session['slot_count'] ?? 0); ?>" />

                    <label>Biaya Pengiriman (IDR)</label>
                    <input type="number" name="shipping_fee" min="0" value="<?php echo htmlspecialchars($session['shipping_fee'] ?? 0); ?>" />

                    <div style="margin-top:12px;">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <a class="btn" href="index.php">Batal</a>
                    </div>
                </form>
            <?php else: ?>

                <h2>Status Jastip</h2>
                <?php if(!$session): ?>
                    <p>Belum ada sesi jastip.</p>
                    <p><a class="btn btn-primary" href="index.php?action=settings">Buat Pengaturan Jastip</a></p>
                <?php else: ?>
                    <table style="width:100%; margin-bottom:12px;">
                        <tr><td class="small">Jam Order</td><td><?php echo $session['open_time'] ? date('H:i', strtotime($session['open_time'])) : '-'; ?> - <?php echo $session['close_time'] ? date('H:i', strtotime($session['close_time'])) : '-'; ?></td></tr>
                        <tr><td class="small">Jumlah Slot</td><td><?php echo htmlspecialchars($session['slot_count']); ?></td></tr>
                        <tr><td class="small">Biaya Pengiriman</td><td><?php echo rupiah($session['shipping_fee']); ?></td></tr>
                        <tr><td class="small">Status</td><td><?php echo htmlspecialchars(strtoupper($session['status'])); ?></td></tr>
                    </table>

                    <?php if($session['status'] === 'open'): ?>
                        <div class="status open">Jastip sedang <strong>dibuka</strong>. Terima order sampai jam tutup.</div>
                        <div style="margin-top:12px;">
                            <form method="post" action="index.php?action=end" style="display:inline;">
                                <button class="btn btn-danger" type="submit">Akhiri Jastip</button>
                            </form>
                            <a class="btn" href="index.php?action=settings">Atur ulang</a>
                        </div>
                    <?php else: ?>
                        <div class="status closed">Jastip saat ini <strong>tertutup</strong>.</div>
                        <div style="margin-top:12px;">
                            <form method="post" action="index.php?action=start" style="display:inline;">
                                <button class="btn btn-primary" type="submit">Mulai Jastip</button>
                            </form>
                            <a class="btn" href="index.php?action=settings">Atur</a>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endif; ?>

            <div class="note">
                <strong>Catatan:</strong> Ini demo sederhana. Untuk produksi tambahkan autentikasi, validasi waktu lebih ketat, manajemen slot real-time, dan integrasi pembayaran.
            </div>
        </div>

        <div class="col" style="flex:0 0 260px;">
            <h3>Preview layar (mockup)</h3>
            <div style="background:#fff;border-radius:8px;padding:10px;text-align:center;">
                <div style="height:480px; width:180px; margin:0 auto; border-radius:10px; background:linear-gradient(#fff,#f6f6f6); box-shadow:0 6px 18px rgba(0,0,0,0.08); padding:10px;">
                    <div style="height:34px; background:#eee; border-radius:6px; margin-bottom:6px;"></div>
                    <div style="font-weight:700; margin-top:8px;"><?php echo htmlspecialchars($user['name']); ?></div>
                    <div class="small">Saldo: <?php echo rupiah($user['balance']/100); ?></div>
                    <div style="margin-top:12px; text-align:left;">
                        <div style="background:#fafafa; padding:8px; border-radius:8px; margin-bottom:6px;">
                            <div class="small">Waktu Order</div>
                            <div><?php echo $session['open_time'] ? date('H:i', strtotime($session['open_time'])) : '--:--'; ?> - <?php echo $session['close_time'] ? date('H:i', strtotime($session['close_time'])) : '--:--'; ?></div>
                        </div>
                        <div style="background:#fafafa; padding:8px; border-radius:8px; margin-bottom:6px;">
                            <div class="small">Jumlah Slot</div>
                            <div><?php echo htmlspecialchars($session['slot_count'] ?? 0); ?></div>
                        </div>
                        <div style="background:#fafafa; padding:8px; border-radius:8px;">
                            <div class="small">Biaya Pengiriman</div>
                            <div><?php echo rupiah($session['shipping_fee'] ?? 0); ?></div>
                        </div>
                    </div>
                    <div style="margin-top:14px;">
                        <?php if($session && $session['status']==='open'): ?>
                            <button class="btn btn-danger">Akhiri Jastip</button>
                        <?php else: ?>
                            <button class="btn btn-primary">Mulai Jastip</button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <h4 style="margin-top:12px;">Pesan singkat</h4>
            <ul class="small">
                <li>Gunakan halaman <em>Atur Jastip</em> untuk mengisi jam/slot/biaya.</li>
                <li>Tekan <em>Mulai Jastip</em> untuk membuka order.</li>
                <li>Tekan <em>Akhiri Jastip</em> untuk menutup.</li>
            </ul>
        </div>
    </div>
</div>
</body>
</html>
