<?php
// 5026231010 - Daniel Setiawan
// 5026 - Dzaky Ahmad
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SellerController extends Controller
{
    // Menampilkan halaman form
    public function index()
    {
        return view('setupSeller');
    }

    // Memproses penyimpanan data
    public function store(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'nama_toko' => 'required|string|max:255',
            'bio'       => 'required|string',
            'lokasi'    => 'required|string',
            'foto_profil' => 'nullable|image|max:2048', // Maks 2MB
            'foto_ktp'  => 'required|image|max:2048',
            'nama_bank' => 'required|string',
            'no_rekening' => 'required|numeric',
            'atas_nama' => 'required|string',
        ]);

        $user = Auth::user();

        // 2. Upload Foto Profil (Jika ada)
        if ($request->hasFile('foto_profil')) {
            $pathProfile = $request->file('foto_profil')->store('photos', 'public');
            $user->foto_profil = $pathProfile;
        }

        // 3. Upload KTP (Disimpan di folder private/ktp agar aman, atau public jika untuk demo)
        if ($request->hasFile('foto_ktp')) {
            // Kita simpan di 'public/ktp' untuk kemudahan akses saat ini
            $pathKTP = $request->file('foto_ktp')->store('ktp', 'public');
            // Simpan path KTP ke kolom database (pastikan Anda sudah buat kolomnya)
            // $user->foto_ktp = $pathKTP; 
        }

        // 4. Update Data User (Asumsi kolom-kolom ini ada di tabel users atau tabel sellers terpisah)
        $user->name = $request->nama_toko; // Contoh menimpa nama user dengan nama toko
        // $user->bio = $request->bio;
        // $user->lokasi = $request->lokasi;
        
        $user->save();

        // 5. Redirect Sukses
        return redirect()->route('welcome')->with('success', 'Selamat! Akun seller Anda berhasil dibuat.');
    }
}