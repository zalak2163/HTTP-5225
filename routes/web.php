<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\FacultyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//deleted student by id
Route::get(
    'students/trash/{id}', 
    [StudentController::class, 'trash']
)->name('students.trash');

//list of temporarily deleted students
Route::get(
    'students/trashed', 
    [StudentController::class, 'trashed']
)->name('students.trashed');

//restore a student
Route::get(
    'students/restore/{id}', 
    [StudentController::class, 'restore']
)->name('students.restore');

//delete permanently


// Trash a course by ID
Route::get(
    'courses/trash/{id}', 
    [CoursesController::class, 'trash']
)->name('courses.trash');

// List of temporarily deleted (soft-deleted) courses
Route::get(
    'courses/trashed', 
    [CoursesController::class, 'trashed']
)->name('courses.trashed');

// Restore a trashed course
Route::get(
    'courses/restore/{id}', 
    [CoursesController::class, 'restore']
)->name('courses.restore');


Route::resource('students', StudentController::class)-> middleware('auth');

//delete permanently
Route::get(
    'students/destroy/{id}', 
    [StudentController::class, 'destroy']
)->name('students.destroy');




//courses CRUD
Route::resource('courses', CoursesController::class);
Route::resource('faculties', FacultyController::class);

// Permanently delete a course
Route::get(
    'courses/destroy/{id}', 
    [CoursesController::class, 'destroy']
)->name('courses.destroy');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';