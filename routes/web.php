<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\userController;
use App\Http\Controllers\MailController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('students', StudentController::class);
Route::get('/students/edit/{student}', [StudentController::class, 'edit'])->name('students.edit');
Route::resource('teachers', TeacherController::class);
Route::get('/teachers/edit/{teacher}', [TeacherController::class, 'edit'])->name('teachers.edit');
Route::resource('courses', CourseController::class);
Route::get('/courses/edit/{course}', [CourseController::class, 'edit'])->name('courses.edit');
Route::resource('results', ResultController::class);
Route::get('/results/edit/{result}', [ResultController::class, 'edit'])->name('results.edit');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::view('signup', 'sign_up');
Route::post('signUpFrom', [userController::class, 'newuser']);

Route::get('upload_image', [StudentController::class, 'studentWithImage']);
Route::post('upload_image', [StudentController::class, 'upload'])->name('upload_image');

Route::post('send_mail', [MailController::class, 'sendMail'])->name('send_mail');
Route::view('send_mail', 'send_mail');
Route::view('mail', 'mail');
Route::view('layout_view', 'layout_view');
