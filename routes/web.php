<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DatabaseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\siteController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\userController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::view('home', 'home');
Route::view('signup', 'sign_up');
Route::post('signUpFrom', [userController::class, 'newuser']);

Route::view('student_form', 'student_form');
Route::post('student_form', [StudentController::class, 'store']);
Route::get('studentList', [StudentController::class, 'show']);
Route::get('student_view/{id}', [StudentController::class, 'show']);
Route::get('student_edit/{id}', [StudentController::class, 'edit']);
Route::post('student_update/{id}', [StudentController::class, 'update']);
Route::delete('student_delete/{id}', [StudentController::class, 'delete'])->name('student.delete');

