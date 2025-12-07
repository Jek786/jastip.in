<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController; 
use App\Http\Controllers\JastipController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('home');
})->name('home');

// ================= AUTHENTICATION =================
// 5026231038 - Nabila Shinta Luthfia

// Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Register
Route::get('/daftar', [AuthController::class, 'showDaftar'])->name('daftar');
Route::post('/daftar', [AuthController::class, 'daftar'])->name('daftar.submit');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ================= Welcome =================
// Daniel Setiawan - 5026231010
Route::middleware('auth')->group(function () {
    
    // Welcome Page
    Route::get('/welcome', function () {
        // You can use Auth::user() here too
        return view('welcome', ['user' => Auth::user()]);
    })->name('welcome');

    // Profile Page
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    
    // Detail Transaksi
    Route::get('/detail-transaksi', function() {
        return view('detailtransaksi');
    })->name('detailtransaksi');
});

// Management Pengantaran (butuh login)
Route::get('/managementpengantaran', function (Request $request) { 
    // PERBAIKAN: Ubah 'role' menjadi 'user' agar sesuai dengan AuthController
    if (!$request->session()->has('user')) {
        return redirect()->route('login');
    }
    return view('managementpengantaran');
})->name('managementpengantaran');

// Route khusus testing tanpa login
Route::get('/test-managementpengantaran', function () {
    return view('managementpengantaran');
})->name('test.managementpengantaran');

// ================= HALAMAN LAIN =================

Route::get('/bahasa', function () { //5026231010 - Daniel Setiawan Yulius Putra
    return view('bahasa');
})->name('bahasa');

// ================= CHAT SYSTEM =================

Route::get('/home-chat', function () {
    return view('home-chat');
})->name('home-chat');

Route::get('/home-chat-unreaded', function () {
    return view('home-chat-unreaded');
})->name('home-chat-unreaded');

Route::get('/call', function () {
    return view('call');
})->name('call');

Route::get('/chatroom', function () {
    return view('chatroom');
})->name('chatroom');

Route::get('/chatroom-complaint', function () {
    return view('chatroom-complaint');
})->name('chatroom-complaint');

Route::prefix('chat')->name('chat.')->group(function () {
    Route::get('/{buyerId}', [ChatController::class, 'show'])->name('show');
    Route::post('/send', [ChatController::class, 'sendMessage'])->name('send');
    Route::get('/messages/{buyerId}', [ChatController::class, 'getMessages'])->name('messages');
    Route::post('/refund', [ChatController::class, 'refund'])->name('refund');
    Route::post('/end', [ChatController::class, 'endChat'])->name('end');
    Route::post('/mark-read/{chatId}', [ChatController::class, 'markAsRead'])->name('markRead');
});

Route::get('/test-chat/{buyerId}', [ChatController::class, 'show'])->name('test.chat');

// ================= JASTIP & PESANAN =================

Route::get('/test-daftar', function () {
    return view('daftar');
})->name('test.daftar');

Route::get('/test-pesananMasuk', function () {
    return view('pesananMasuk');
})->name('pesananMasuk');

<<<<<<< Updated upstream
Route::get('/buka-jastip', [JastipController::class, 'index'])->name('jastip.index');
Route::post('/buka-jastip/waktu', [JastipController::class, 'setWaktu'])->name('jastip.setWaktu');
Route::post('/buka-jastip/slot', [JastipController::class, 'setSlot'])->name('jastip.setSlot');
Route::post('/buka-jastip/biaya', [JastipController::class, 'setBiaya'])->name('jastip.setBiaya');
Route::post('/buka-jastip/start', [JastipController::class, 'startJastip'])->name('jastip.start');

// ================= FORGOT PASSWORD =================

// Halaman Input Email
Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('forgot.password');
// Halaman Input OTP
Route::get('/forgotpass-otp', [AuthController::class, 'showOtpVerification'])->name('forgot.otp');

// Halaman Input Password Baru
Route::get('/newpass', function () {
    $email = request()->query('email');
    
    // Cek apakah user sudah verifikasi OTP
    if (!session('reset_verified')) {
        return redirect()->route('forgot.password')->with('error', 'Silakan verifikasi OTP terlebih dahulu.');
    }
    
    return view('newpass', compact('email'));
})->name('reset.password.view');

// API Routes untuk Proses Logic (AJAX)
Route::post('/api/forgot-password', [AuthController::class, 'forgotPassword']);
Route::post('/api/verify-otp', [AuthController::class, 'verifyOtp']);

// TAMBAHAN: Route untuk submit password baru (Wajib ada agar tombol simpan berfungsi)
Route::post('/api/reset-password', [AuthController::class, 'resetPassword'])->name('api.reset.password');
=======
Route::get('/buka-jastip', function () {
    return view('bukajastip'); 
})->name('bukaJastip');

Route::get('/setup-seller', function () {
    return view('setupSeller');
})->name('setupSeller');
>>>>>>> Stashed changes
