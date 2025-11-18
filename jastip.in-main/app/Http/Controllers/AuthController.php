<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buyer;
use App\Models\Driver;
use Illuminate\Support\Facades\Hash;

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

    public function showRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'emailAddress' => 'required|email|unique:buyer,emailAddress',
            'password' => 'required|min:6|confirmed',
        ]);

        Buyer::create([
            'name' => $request->name,
            'emailAddress' => $request->emailAddress,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login');
    }
}
