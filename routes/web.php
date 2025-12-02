<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;

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