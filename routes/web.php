<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\GradesController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminStudentsController;
use App\Http\Controllers\AdminTrainingController;
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

Route::group(['controller' => GradesController::class], function(){
    Route::get('/trainings/fetch','getTrainings');
    Route::post('/modules/fetch','getModules');
    Route::post('/lectures/fetch','getLectures');
    Route::post('/homework/fetch','getHomework');
    Route::get('/trainings/{training}/students','getStudents');
    Route::post('/store/absence','storeAbsence')->name('absence');
    Route::get('/lecture/{lectureId}/averages','calculateGrades');
    Route::get('/students/{studentId}/trainings/{trainingId}/average-grade', 'getTrainingAverageGrade');
    Route::get('/modules/{moduleId}/trainings/{trainingId}/students/{studentId}/average-grade', 'getModuleAverageGrade');
    Route::get('/lectures/{lectureId}/modules/{moduleId}/trainings/{trainingId}/students/{studentId}/average-grade', 'getLectureAverageGrade');
});

Route::group(['controller' => PagesController::class], function(){
    Route::get('/info', 'info')->name('info');
    Route::get('/', 'welcome')->name('welcome');
    Route::get('/account/settings', 'accSettings')->name('acc-settings');
});

Route::get('/trainings/{id}', [TrainingController::class, 'renderTrainings'])->name('trainings');


Route::group(['controller' => RegisterController::class],function () {
    Route::get('/register', 'showRegForm')->name('register');
    Route::any('/register/create', 'createUser')->name('authenticate');
});

Route::group(['controller' => LoginController::class], function () {
    Route::get('/login', 'showLoginForm')->name('loginForm');
    Route::post('/users/login', 'login')->name('login');
    Route::get('/users/logout', 'logout')->name('logout');
    Route::get('/courses', 'logout')->name('my-courses');
});

Route::group(['controller' => AdminController::class, 'middleware' => ['role:admin']], function() {
    Route::get('/admin/dashboard', 'showAdminDash')->name('admin.dashboard');
    Route::get('/admin/dashboard/users', 'showUsers')->name('users.table');
    Route::get('/admin/dashboard/users/edit/{id}', 'showEditForm')->name('users.edit');
    Route::put('/admin/dashboard/users/update/{id}', 'updateUser')->name('user.update');
    Route::delete('/admin/dashboard/users/delete/{id}', 'deleteUser')->name('user.delete');
    Route::get('/admin/pages', 'showPages')->name('pages');
    Route::get('/grades','showGradesForm')->name('grades.form');
});


Route::group(['controller' => AdminStudentsController::class, 'middleware' => ['isAdminOrTeacher']], function() {
    Route::get('/students/form', 'showStudentForm')->name('student.form');
    Route::post('/students/create', 'store')->name('student.store');
    Route::get('/students/{student}/edit', 'showEditForm')->name('student.edit');
    Route::put('/students/{student}', 'update')->name('student.update');
    Route::delete('/students/{student}', 'delete')->name('deleteStudent');
    Route::get('/students/{student}/delete', 'deleteConfirmation')->name('deleteStudentConfirmation');
    Route::get('/students', 'showStudentTable')->name('student.table');
    Route::get('/students/skill/{student_id}', 'showStudentSkill')->name('student.skill');
    Route::any('/students/details' , 'storeDetails')->name('detailStore');
});

Route::group(['controller' => AdminTrainingController::class, 'middleware' => ['isAdminOrTeacher']], function() {
    Route::get('/trainings', 'showTrainingTable')->name('training.table');
    Route::get('/trainings/form/add', 'showTrainingForm')->name('training.form');
    Route::post('/trainings/add', 'storeTraining')->name('training.store');
    Route::get('/trainings/{training}/edit', 'showTrainingEditForm')->name('training.edit');
    Route::put('/trainings/{training}', 'updateTraining')->name('training.update');
    Route::delete('/trainings/{training}', 'deleteTraining')->name('training.destroy');
    Route::get('/trainings/{training_id}/module', 'showModule')->name('module');
    Route::get('/trainings/{id}/lecture', 'showModuleTable')->name('module.table');
    Route::post('/trainings/module/{id}/add', 'storeModule')->name('module.store');
    Route::get('/trainings/{training}/module/{module}/edit', 'editModule')->name('module.edit');
    Route::put('/trainings/{training}/module/{module}',  'updateModule')->name('module.update');
    Route::delete('/trainings/module/{module}', 'deleteModule')->name('module.destroy');
    Route::get('/trainings/lecture/{id}', 'showLecture')->name('lecture');
    Route::get('/trainings/lecture/table/{id}', 'showLectureTable')->name('lecture.table');
    Route::post('/trainings/lectures', 'storeLecture')->name('lecture.store');
    Route::put('/trainings/lecture/{lecture}',  'updateLecture')->name('lecture.update');
    Route::delete('/trainings/lecture/{lecture}', 'deleteLecture')->name('lecture.destroy');
    Route::get('/trainings/lecture/{lecture}/edit', 'editLecture')->name('lecture.edit');
    Route::get('/trainings/homework/{id}', 'showHomework')->name('homework');
    Route::post('/trainings/homework/store', 'storeHomework')->name('homework.store');
    Route::get('/trainings/homework/table/{id}', 'showHomeworkTable')->name('homework.table');
    Route::get('/trainings/homework/{homework}/edit', 'editHomework')->name('homework.edit');
    Route::put('/trainings/homework/{homework}',  'updateHomework')->name('homework.update');
    Route::delete('/homework/{homework}', 'deleteHomework')->name('homework.destroy');
    Route::get('/upload', 'showUploadForm')->name('upload.form');
    Route::post('/upload', 'upload')->name('upload.file');
});


Route::get('students/progress',[StudentsController::class,'showOverallProgress'])->name('students-progress')->middleware('role:employer');

Route::group(['controller'=>StudentsController::class, 'middleware'=>['role:student']], function(){
    Route::get('/dashboard/progress','showOverallProgress')->name('progress');
    Route::get('/dashboard/grades','showGrades')->name('grades');
    Route::get('/dashboard/training','showTrainings')->name('training');
    Route::get('/student/download-resume/{id}','downloadResume')->name('downloadResume');
});


Route::get('activate/{token}', [ActivationController::class, 'activating'])->name('activate');

Route::group(['controller' => ForgotPasswordController::class], function(){
    Route::get('password/reset', [ForgotPasswordController::class,'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [ResetPasswordController::class,'showResetForm'])->name('password.reset');
    Route::post('password/reset', [ResetPasswordController::class,'reset'])->name('password.update');
});



