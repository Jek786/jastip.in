<?php   //5026231038 - Nabila Shinta Luthfia 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use App\Models\Buyer;
use App\Models\Driver;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;

class AuthController extends Controller
{
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

        $user = Buyer::where('emailAddress', $email)->first();
        $role = 'buyer';

        if (!$user) {
            $user = Driver::where('emailAddress', $email)->first();
            $role = 'driver';
        }

        if ($user && Hash::check($password, $user->password)) {
            $request->session()->put('user', $user);
            $request->session()->put('role', $role);
            $request->session()->put('user_id', $user->IDBuyer ?? $user->IDDriver);
            return redirect()->route('dashboard');
        }

        return back()->with('error', 'Email atau password salah.');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('login');
    }

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

        return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login.');
    }

    // Method baru untuk Forgot Password
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

        // Cek apakah email ada di tabel Buyer atau Driver
        $user = Buyer::where('emailAddress', $email)->first();
        $role = 'buyer';

        if (!$user) {
            $user = Driver::where('emailAddress', $email)->first();
            $role = 'driver';
        }

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Email tidak terdaftar dalam sistem kami.'
            ], 404);
        }

        // Generate OTP (6 digit random)
        $otp = rand(100000, 999999);

        // Simpan OTP ke cache dengan expiry 5 menit
        Cache::put('otp_' . $email, [
            'otp' => $otp,
            'role' => $role,
            'user_id' => $user->IDBuyer ?? $user->IDDriver
        ], now()->addMinutes(5));

        // TODO: Kirim OTP ke email user menggunakan Mail
        // Mail::to($email)->send(new OTPMail($otp));

        // Untuk development, bisa log OTP
        \Log::info("OTP untuk {$email}: {$otp}");

        return response()->json([
            'success' => true,
            'message' => 'Kode OTP telah dikirim ke email Anda.',
            'otp' => $otp // Hapus ini di production!
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

        // Ambil OTP dari cache
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

        // OTP benar, hapus dari cache dan buat session untuk reset password
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

    // Cek apakah user sudah verifikasi OTP
    if (!$request->session()->get('reset_verified')) {
        return response()->json([
            'success' => false,
            'message' => 'Sesi verifikasi tidak valid. Silakan ulangi proses reset password.'
        ], 403);
    }

    // Cari user di tabel Buyer atau Driver
    $user = Buyer::where('emailAddress', $email)->first();
    
    if (!$user) {
        $user = Driver::where('emailAddress', $email)->first();
    }

    if (!$user) {
        return response()->json([
            'success' => false,
            'message' => 'User tidak ditemukan.'
        ], 404);
    }

    // Update password
    $user->password = Hash::make($password);
    $user->save();

    // Hapus session verifikasi
    $request->session()->forget('reset_verified');
    $request->session()->forget('reset_email');

    return response()->json([
        'success' => true,
        'message' => 'Password berhasil diubah.'
    ], 200);
}
}