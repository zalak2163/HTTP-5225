<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CoursesController;

Route::get('/', function () {
    return view('welcome');
});

// Student Routes
Route::get('students/trash/{id}', [StudentController::class, 'trash'])->name('students.trash');  // Soft delete student
Route::get('students/trashed', [StudentController::class, 'trashed'])->name('students.trashed');  // Show trashed students
Route::get('students/restore/{id}', [StudentController::class, 'restore'])->name('students.restore');  // Restore trashed student
Route::get('students/destroy/{id}', [StudentController::class, 'destroy'])->name('students.destroy');  // Permanently delete student
Route::resource('students', StudentController::class);  // Default CRUD routes for students

// Course Routes
Route::get('courses/trash/{id}', [CoursesController::class, 'trash'])->name('courses.trash');  // Soft delete course
Route::get('courses/trashed', [CoursesController::class, 'trashed'])->name('courses.trashed');  // Show trashed courses
Route::get('courses/restore/{id}', [CoursesController::class, 'restore'])->name('courses.restore');  // Restore trashed course
Route::get('courses/destroy/{id}', [CoursesController::class, 'destroy'])->name('courses.destroy');  // Permanently delete course
Route::resource('courses', CoursesController::class);  // Default CRUD routes for courses
