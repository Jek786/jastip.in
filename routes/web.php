<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JastipController;


Route::get('/', function () {
    return view('home');
})->name('home');

// Login  // 5026231038 - Nabila Shinta Luthfia
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Register  // 5026231038 - Nabila Shinta Luthfia
Route::get('/daftar', [AuthController::class, 'showDaftar'])->name('daftar');
Route::post('/daftar', [AuthController::class, 'daftar'])->name('daftar.submit');

/// Dashboard (butuh login)  // 5026231038 - Nabila Shinta Luthfia
Route::get('/dashboard', function (Request $request) {

    // Cek apakah user sudah login 
    if (!$request->session()->has('user')) {
        return redirect()->route('login');
    }

   // Ambil data user dari session  
    $user = $request->session()->get('user');

    return view('dashboard', compact('user'));

})->name('dashboard');

// Logout  // 5026231038 - Nabila Shinta Luthfia
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Management Pengantaran (butuh login)  // 5026231038 - Nabila Shinta Luthfia
Route::get('/managementpengantaran', function (Request $request) { //5026231038 - Nabila Shinta Luthfia
    if (!$request->session()->has('role')) {
        return redirect()->route('login');
    }

    return view('managementpengantaran');
})->name('managementpengantaran');

// Route khusus testing tanpa login  // 5026231038 - Nabila Shinta Luthfia
Route::get('/test-managementpengantaran', function () {
    return view('managementpengantaran');
})->name('test.managementpengantaran');



Route::get('/bahasa', function () { //5026231010 - Daniel Setiawan Yulius Putra
    return view('bahasa');
})->name('bahasa');

Route::get('/profile', function () { //5026231010 - Daniel Setiawan Yulius Putra
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

Route::get('/buka-jastip', [JastipController::class, 'index'])
    ->name('jastip.index');

Route::post('/buka-jastip/waktu', [JastipController::class, 'setWaktu'])
    ->name('jastip.setWaktu');

Route::post('/buka-jastip/slot', [JastipController::class, 'setSlot'])
    ->name('jastip.setSlot');

Route::post('/buka-jastip/biaya', [JastipController::class, 'setBiaya'])
    ->name('jastip.setBiaya');

Route::post('/buka-jastip/start', [JastipController::class, 'startJastip'])
    ->name('jastip.start');