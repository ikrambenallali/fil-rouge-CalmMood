<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
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
Route::get('/typeStress', function () {
    return view('utilisateurs.typeStress'); 
});
Route::post('/contactStore', [ContactController::class, 'store'])->name('contact.store');
// dashboard routes
Route::get('/dashboard',[UserController::class, 'index'])->name('allUsers');
Route::delete('/dashboard/{id}', [UserController::class, 'destroy'])->name('deleteUser');
Route::post('/dashboard/{id}', [UserController::class, 'activate'])->name('activerUser');
Route::post('/dashboards/{id}', [UserController::class, 'desactivate'])->name('desactiverUser');



Route::post('/logout', function () {
    return view('authentification.login'); 
})->name('logout');
