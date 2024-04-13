<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::view('/', 'welcome')->name('home');

Route::name('user.')->group(function () {
    Route::get('/dashboard', function () {
        if(auth()->check()) {
           return view('dashboard');
        }

        return redirect('/login')->with('error', 'Сначала войдите в систему');
    })->name('dashboard');

    Route::view('/register', 'user.create');
    Route::post('/register', [UserController::class, 'store'])->name('store');

    Route::view('/login', 'user.login');
    Route::post('/login', [UserController::class, 'login'])->name('login');

    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
});
