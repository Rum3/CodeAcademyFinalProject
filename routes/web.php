<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/info', function () {
    return view('info');
})->name('info');


Route::get('/user/settings', function () {
    return view('accSettings');
})->name('acc-settings');


Route::get('/java', function () {
    return view('trainings.java');
})->name('java');

Route::get('/html', function () {
    return view('trainings.html');
})->name('html');

Route::get('/angular', function () {
    return view('trainings.angular');
})->name('angular');

Route::get('/php', function () {
    return view('trainings.php');
})->name('php');

Route::get('/c', function () {
    return view('trainings.c');
})->name('c');

Route::get('/sql', function () {
    return view('trainings.sql');
})->name('sql');

Route::get('/register', [RegisterController::class, 'showRegForm'])->name('register');
Route::post('/register/create', [RegisterController::class, 'createUser'])->name('authenticate');
Route::get('/login', [RegisterController::class, 'showLoginForm'])->name('loginForm');
Route::post('/users/login', [RegisterController::class, 'login'])->name('login');
Route::get('/logout', [RegisterController::class, 'logout'])->name('logout');
Route::get('/courses', [RegisterController::class, 'logout'])->name('my-courses');
