<?php

use App\Http\Livewire\DynamicForm;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ADD_EDITController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ActivationController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;

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

Route::get('/admin', function () {
    return view('adminView');
})->middleware('auth', 'isAdmin');



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
Route::any('/register/create', [RegisterController::class, 'createUser'])->name('authenticate');
Route::get('/login', [RegisterController::class, 'showLoginForm'])->name('loginForm');
Route::post('/users/login', [RegisterController::class, 'login'])->name('login');
Route::get('/users/logout', [RegisterController::class, 'logout'])->name('logout');
Route::get('/courses', [RegisterController::class, 'logout'])->name('my-courses');

Route::get('/admin/dashboard', [AdminController::class, 'showAdminDash'])->name('admin-dashboard')->middleware('auth', 'isAdmin');
Route::get('/admin/dashboard/users', [AdminController::class, 'showUsers'])->name('users-table')->middleware('auth', 'isAdmin');
Route::get('/users/edit/{id}', [AdminController::class, 'showEditForm'])->name('users-edit')->middleware('auth', 'isAdmin');
Route::put('/users/update/{id}', [AdminController::class, 'updateUser'])->name('user-update')->middleware('auth', 'isAdmin');
Route::delete('/admin/dashboard/users/delete/{id}', [AdminController::class, 'deleteUser'])->name('user-delete')->middleware('auth', 'isAdmin');
Route::get('/pages', [AdminController::class, 'showPages'])->name('show-pages')->middleware('auth', 'isAdmin');

Route::get('/java', [StudentsController::class, 'java'])->name('java');
Route::get('/overallPerformance', [StudentsController::class, 'overallPerformance'])->name('overallPerformance');
Route::get('/grades', [StudentsController::class, 'grades'])->name('grades');
Route::get('/training', [StudentsController::class, 'training'])->name('training');
Route::get('/redirect', [StudentsController::class, 'redirectToView'])->name('redirectToView');
Route::get('/create', [TeacherController::class, 'create'])->name('create');
Route::post('/create', [TeacherController::class, 'submitForm']);
Route::get('/download-resume/{id}',[StudentsController::class,'downloadResume'])->name('downloadResume');
Route::get('/StudentsForm',[StudentsController::class, 'StudentsForm'])->name('StudentsForm');

Route::get('/add_editUsers', [ADD_EDITController::class, 'create'])->name('users.create');
Route::post('/add_editUsers', [ADD_EDITController::class, 'store'])->name('users.store');
Route::get('/add_editUsers/{user}/edit', [ADD_EDITController::class, 'edit'])->name('users.edit');
Route::put('/add_editUsers/{user}', [ADD_EDITController::class, 'update'])->name('users.update');

Route::get('/dynamic-form', DynamicForm::class);

Route::get('activate/{token}', [ActivationController::class, 'activating'])->name('activate');

// Forgotten password
Route::get('password/reset', [ForgotPasswordController::class,'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class,'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class,'reset'])->name('password.update');
