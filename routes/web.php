<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// 🔥 Route Daftar (pengganti register)
Route::get('/daftar', function () {
    return view('daftar'); // pastikan file resources/views/daftar.blade.php
})->name('daftar');

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

<<<<<<< HEAD
Route::get('/buka-jastip', function () {
    return view('bukaJastip');
});
=======
Route::get('/test-daftar', function () {
    return view('daftar');
})->name('test.daftar');

Route::get('/test-pesananMasuk', function () {
    return view('pesananMasuk');
})->name('pesananMasuk');
>>>>>>> 9833ce2d4d0c49f03430165bba4227fa880e7e81
