<?php
// 5026231038 - Nabila Shinta Luthfia

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Kita standarisasi pakai User agar konsisten dengan Login/Daftar
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    // ================= LOGIN =================
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'emailAddress' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $email = $request->emailAddress;
        $password = $request->password;

        // Cari user dari tabel users
        $user = User::where('email', $email)->first();

        if ($user && Hash::check($password, $user->password)) {
            $request->session()->put('user', $user);
            $request->session()->put('user_id', $user->id);
            return redirect()->route('welcome');
        }

        return back()->with('error', 'Email atau password salah.');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('login');
    }

    // ================= DAFTAR / REGISTER =================
    public function showDaftar()
    {
        return view('daftar');
    }

    public function daftar(Request $request)
    {
        $request->validate([
            'name'          => 'required|min:3',
            'emailAddress'  => 'required|email|unique:users,email',
            'password'      => 'required|min:6|confirmed',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->emailAddress,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    // ================= FORGOT PASSWORD =================
    public function showForgotPassword()
    {
        return view('forgotpass');
    }

    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $email = $request->email;

        // PERBAIKAN: Gunakan User model agar konsisten dengan Login/Daftar
        $user = User::where('email', $email)->first();
        
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Email tidak terdaftar dalam sistem kami.'
            ], 404);
        }

        // Generate OTP
        $otp = rand(100000, 999999);

        // Simpan OTP ke cache (5 menit)
        Cache::put('otp_' . $email, [
            'otp' => $otp,
            'user_id' => $user->id
        ], now()->addMinutes(5));

        // Log OTP untuk debugging (Cek file storage/logs/laravel.log untuk lihat kodenya)
        Log::info("OTP untuk {$email}: {$otp}");

        return response()->json([
            'success' => true,
            'message' => 'Kode OTP telah dikirim ke email Anda.',
            'otp' => $otp // Hapus baris ini nanti saat production!
        ], 200);
    }

    public function showOtpVerification(Request $request)
    {
        $email = $request->query('email');
        return view('forgotpass-otp', compact('email'));
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|numeric|digits:6'
        ]);

        $email = $request->email;
        $otp = $request->otp;

        $cachedData = Cache::get('otp_' . $email);

        if (!$cachedData) {
            return response()->json([
                'success' => false,
                'message' => 'Kode OTP telah kadaluarsa. Silakan minta kode baru.'
            ], 400);
        }

        if ($cachedData['otp'] != $otp) {
            return response()->json([
                'success' => false,
                'message' => 'Kode OTP tidak valid.'
            ], 400);
        }

        Cache::forget('otp_' . $email);
        $request->session()->put('reset_email', $email);
        $request->session()->put('reset_verified', true);

        return response()->json([
            'success' => true,
            'message' => 'Verifikasi berhasil.'
        ], 200);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);

        $email = $request->email;
        $password = $request->password;

        if (!$request->session()->get('reset_verified')) {
            return response()->json([
                'success' => false,
                'message' => 'Sesi verifikasi tidak valid.'
            ], 403);
        }

        // PERBAIKAN: Gunakan User model
        $user = User::where('email', $email)->first();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User tidak ditemukan.'
            ], 404);
        }

        $user->password = Hash::make($password);
        $user->save();

        $request->session()->forget('reset_verified');
        $request->session()->forget('reset_email');

        return response()->json([
            'success' => true,
            'message' => 'Password berhasil diubah.'
        ], 200);
    }
}