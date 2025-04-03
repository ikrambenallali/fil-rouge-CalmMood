<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('registerForme');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('loginForme');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/home', function () {
    return view('home.index'); 
});
Route::get('/about', function () {
    return view('about.index'); 
});
Route::get('/contact', function () {
    return view('about.contactUs'); 
});
Route::get('/dashboard', function () {
    return view('admin.dashboard'); 
});

Route::post('/contactStore', [ContactController::class, 'store'])->name('contact.store');