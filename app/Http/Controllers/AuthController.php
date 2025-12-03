<?php
// 5026231038 - Nabila Shinta Luthfia

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // gunakan tabel users
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Tampilkan halaman login
    public function showLogin()
    {
        return view('login');
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'emailAddress' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Ambil email & password dari form
        $email = $request->emailAddress;
        $password = $request->password;

        // Cari user dari tabel users
        $user = User::where('email', $email)->first();

        // Jika user ditemukan & password benar
        if ($user && Hash::check($password, $user->password)) {

            // Simpan data pengguna ke session
            $request->session()->put('user', $user);
            $request->session()->put('user_id', $user->id);

            return redirect()->route('dashboard');
        }

        // Jika gagal login
        return back()->with('error', 'Email atau password salah.');
    }

    // Logout
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('login');
    }

    // Tampilkan halaman daftar
    public function showDaftar()
    {
        return view('daftar');
    }

    // Proses daftar
    public function daftar(Request $request)
    {
        // Validasi input register
        $request->validate([
            'name'          => 'required|min:3',
            'emailAddress'  => 'required|email|unique:users,email',
            'password'      => 'required|min:6|confirmed',
        ]);

        // Simpan user baru ke tabel users
        User::create([
            'name'     => $request->name,
            'email'    => $request->emailAddress, // simpan sebagai email
            'password' => Hash::make($request->password), // hash password
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}
