<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/dashboard', function (Request $request) {
    if (!$request->session()->has('role')) {
        return redirect()->route('login');
    }

    $user = $request->session()->get('user');

    return view('dashboard', compact('user'));
})->name('dashboard');

Route::get('/managementpengantaran', function (Request $request) {
    if (!$request->session()->has('role')) {
        return redirect()->route('login');
    }

    return view('managementpengantaran');
})->name('managementpengantaran');

// 🔥 ROUTE TEST — bisa lihat halaman tanpa login
Route::get('/test-managementpengantaran', function () {
    return view('managementpengantaran');
})->name('test.managementpengantaran');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/bahasa', function () {
    return view('bahasa');
})->name('bahasa');

Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('/buka-jastip', function () {
    return view('bukaJastip');
});
