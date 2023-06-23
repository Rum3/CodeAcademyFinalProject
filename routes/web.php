<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\Auth\LoginController;
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



Route::get('/info', [PagesController::class, 'info'])->name('info');
Route::get('/', [PagesController::class, 'welcome'])->name('welcome');
Route::get('/account/settings', [PagesController::class, 'accSettings'])->name('acc-settings');


Route::get('/trainings/{id}', [TrainingController::class, 'renderTrainings'])->name('trainings');


Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'showRegForm')->name('register');
    Route::any('/register/create', 'createUser')->name('authenticate');
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('loginForm');
    Route::post('/users/login', 'login')->name('login');
    Route::get('/users/logout', 'logout')->name('logout');
    Route::get('/courses', 'logout')->name('my-courses');
});

Route::controller(AdminController::class)->group(function (){
        Route::middleware(['auth','isAdmin'])->group(function(){
            Route::get('/admin/dashboard', 'showAdminDash')->name('admin.dashboard');
            Route::get('/admin/dashboard/users', 'showUsers')->name('users.table');
            Route::get('/admin/dashboard/users/edit/{id}', 'showEditForm')->name('users.edit');
            Route::put('/admin/dashboard/users/update/{id}', 'updateUser')->name('user.update');
            Route::delete('/admin/dashboard/users/delete/{id}', 'deleteUser')->name('user.delete');
            Route::get('/admin/pages', 'showPages')->name('pages');
            Route::post('/students/create', 'store')->name('student.store');
            Route::get('/students', 'showStudentTable')->name('student.table');
            Route::get('/students/{student}/edit', 'showEditFormWithData')->name('student.edit');
            Route::get('/students/{student}/delete', 'deleteConfirmation')->name('deleteStudentConfirmation');
            Route::delete('/students/{student}', 'studentDestroy')->name('deleteStudent');
            Route::get('/students/form', 'showStudentForm')->name('student.form');
            Route::put('/students/{student}', 'studentUpdate')->name('student.update');
            Route::get('admin/trainings/form', 'showTrainingForm')->name('training.form');
            Route::get('admin/trainings/table', 'showTrainingTable')->name('training.table');
            Route::post('/trainings/add', 'storeTraining')->name('training.store');
            Route::delete('/training/{training}', 'destroyTraining')->name('training.destroy');
            Route::get('/grades','showGradesForm')->name('grades.form');
        });

});

Route::controller(AdminController::class)->group(function (){
        Route::middleware(['auth','isTeacher'])->group(function(){
            Route::post('/students/create', 'store')->name('student.store');
            Route::get('/students', 'showStudentTable')->name('student.table');
            Route::get('/students/{student}/edit', 'showEditFormWithData')->name('student.edit');
            Route::get('/students/{student}/delete', 'deleteConfirmation')->name('deleteStudentConfirmation');
            Route::delete('/students/{student}', 'studentDestroy')->name('deleteStudent');
            Route::get('/students/form', 'showStudentForm')->name('student.form');
            Route::put('/students/{student}', 'studentUpdate')->name('student.update');
            Route::get('/trainings', 'showTrainingForm')->name('training.form');
            Route::get('/trainings/table', 'showTrainingTable')->name('training.table');
            Route::post('/trainings/add', 'storeTraining')->name('training.store');
            Route::delete('/training/{training}', 'destroyTraining')->name('training.destroy');
            Route::get('/grades','showGradesForm')->name('grades.form');
        });

});

Route::get('students/progress',[StudentsController::class,'showOverallProgress'])->name('students-progress')->middleware('isEmployer');

Route::middleware('auth', 'isStudent')->group(function(){
    Route::controller(StudentsController::class)->group(function(){
        Route::get('/dashboard/progress','showOverallProgress')->name('progress');
        Route::get('/dashboard/grades','showGrades')->name('grades');
        Route::get('/dashboard/training','showTrainings')->name('training');
        Route::get('/student/download-resume/{id}','downloadResume')->name('downloadResume');
    });
});




Route::get('activate/{token}', [ActivationController::class, 'activating'])->name('activate');

// Forgotten password
Route::get('password/reset', [ForgotPasswordController::class,'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class,'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class,'reset'])->name('password.update');
