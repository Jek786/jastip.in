<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;

Route::get('/', function () {  //5026231038 - Nabila Shinta Luthfia
    return view('home');
})->name('home');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login'); //5026231038 - Nabila Shinta Luthfia
Route::post('/login', [AuthController::class, 'login']);


Route::get('/daftar', [AuthController::class, 'showDaftar'])->name('daftar');
Route::post('/daftar', [AuthController::class, 'daftar'])->name('daftar.submit');


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

// 🔥 ROUTE TEST — bisa lihat halaman tanpa login
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

Route::get('/home-chat', function () {
    return view('home-chat');
})->name('home-chat');

Route::get('/home-chat-unreaded', function () {
    return view('home-chat-unreaded');
})->name('home-chat-unreaded');

Route::get('/call', function () {
    return view('call');
})->name('call');

Route::get('/chatroom', function () {
    return view('chatroom');
})->name('chatroom');

Route::get('/chatroom-complaint', function () {
    return view('chatroom-complaint');
})->name('chatroom-complaint');

Route::prefix('chat')->name('chat.')->group(function () {
    Route::get('/{buyerId}', [ChatController::class, 'show'])->name('show');
    Route::post('/send', [ChatController::class, 'sendMessage'])->name('send');
    Route::get('/messages/{buyerId}', [ChatController::class, 'getMessages'])->name('messages');
    Route::post('/refund', [ChatController::class, 'refund'])->name('refund');
    Route::post('/end', [ChatController::class, 'endChat'])->name('end');
    Route::post('/mark-read/{chatId}', [ChatController::class, 'markAsRead'])->name('markRead');
});

Route::get('/test-chat/{buyerId}', [ChatController::class, 'show'])->name('test.chat');
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

// Route untuk Forgot Password
Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('forgot.password');
Route::get('/forgotpass-otp', [AuthController::class, 'showOtpVerification'])->name('forgot.otp');

// API Routes untuk AJAX
Route::post('/api/forgot-password', [AuthController::class, 'forgotPassword']);
Route::post('/api/verify-otp', [AuthController::class, 'verifyOtp']);

Route::get('/newpass', function () {
    $email = request()->query('email');
    
    // Cek apakah user sudah verifikasi OTP
    if (!session('reset_verified')) {
        return redirect()->route('forgot.password')->with('error', 'Silakan verifikasi OTP terlebih dahulu.');
    }
    
    return view('newpass', compact('email'));
})->name('reset.password');