<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DatabaseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\siteController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\userController;
use App\Http\Controllers\MailController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [StudentController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';




// Route::view('home', 'home');
Route::view('signup', 'sign_up');
Route::post('signUpFrom', [userController::class, 'newuser']);

Route::view('student_form', 'student_form');
Route::post('student_form', [StudentController::class, 'studentStore']);
Route::get('student_list', [StudentController::class, 'studentWithResult']);
Route::get('student_view/{id}', [StudentController::class, 'show']);
Route::get('student_edit/{id}', [StudentController::class, 'student_edit']);
Route::post('student_update/{id}', [StudentController::class, 'student_update']);
Route::delete('student_delete/{id}', [StudentController::class, 'delete'])->name('student.delete');

Route::view('upload_image', 'upload_image');
Route::get('upload_image', [StudentController::class, 'studentWithImage']);
Route::post('upload_image', [StudentController::class, 'upload'])->name('upload_image');

Route::post('send_mail', [MailController::class, 'sendMail'])->name('send_mail');
Route::view('send_mail', 'send_mail');
Route::view('mail', 'mail');

Route::view('layout_view', 'layout_view');


// Show the form
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');

// Handle form submission
// Route::post('/students', [StudentController::class, 'store'])->name('students.store');
Route::get('/students/edit/{id}', [StudentController::class, 'edit'])->name('students.edit');
Route::resource('students', StudentController::class);
Route::get('/dashboard', [StudentController::class, 'index'])->name('dashboard');

