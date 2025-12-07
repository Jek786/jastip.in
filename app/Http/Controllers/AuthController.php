<?php
// 5026231038 - Nabila Shinta Luthfia

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // ================= LOGIN =================
    public function showLogin()
    {
        return view('login');
    }

    // Updated change to laravel Auth 5026231010 - Daniel Setiawan Yulius Putra
    public function login(Request $request)
    {
        $request->validate([
            'emailAddress' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = [
            'email' => $request->emailAddress, 
            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // Important for security
            return redirect()->route('welcome');
        }

        return back()->with('error', 'Email atau password salah.');
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Use Auth facade
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
    // Update until here

    // ================= REGISTER / DAFTAR =================
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
        $user = User::where('email', $email)->first();
        
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Email tidak terdaftar dalam sistem kami.'
            ], 404);
        }

        $otp = rand(100000, 999999);
        Cache::put('otp_' . $email, [
            'otp' => $otp,
            'user_id' => $user->id
        ], now()->addMinutes(5));

        Log::info("OTP untuk {$email}: {$otp}");

        return response()->json([
            'success' => true,
            'message' => 'Kode OTP telah dikirim ke email Anda.',
            'otp' => $otp // Hanya untuk testing, hapus di production
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
