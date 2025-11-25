<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;

Route::get('/', function () {  //5026231038 - Nabila Shinta Luthfia
    return view('home');
})->name('home');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login'); //5026231038 - Nabila Shinta Luthfia
Route::post('/login', [AuthController::class, 'login']);

// 🔥 Route Daftar (pengganti register)
Route::get('/daftar', function () {
    return view('daftar'); // pastikan file resources/views/daftar.blade.php
})->name('daftar');

Route::get('/dashboard', function (Request $request) { //5026231038 - Nabila Shinta Luthfia
    if (!$request->session()->has('role')) {
        return redirect()->route('login');
    }

    $user = $request->session()->get('user');

    return view('dashboard', compact('user'));
})->name('dashboard');

Route::get('/managementpengantaran', function (Request $request) { //5026231038 - Nabila Shinta Luthfia
    if (!$request->session()->has('role')) {
        return redirect()->route('login');
    }

    return view('managementpengantaran');
})->name('managementpengantaran');

// 🔥 ROUTE TEST — bisa lihat halaman tanpa login //5026231038 - Nabila Shinta Luthfia
Route::get('/test-managementpengantaran', function () {
    return view('managementpengantaran');
})->name('test.managementpengantaran');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); //5026231038 - Nabila Shinta Luthfia

Route::get('/bahasa', function () {
    return view('bahasa');
})->name('bahasa');

Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::get('/welcome', function () { //5026231038 - Nabila Shinta Luthfia
    return view('welcome');
})->name('welcome');

Route::get('/test-daftar', function () {
    return view('daftar');
})->name('test.daftar');

Route::get('/test-pesananMasuk', function () {
    return view('pesananMasuk');
})->name('pesananMasuk');
