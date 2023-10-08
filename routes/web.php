<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('home');
});
//courses crud
Route::resource('/courses','\App\Http\Controllers\CourseController');
Route::post('/courses',[\App\Http\Controllers\CourseController::class,'store'])->name('courses.store');
Route::post('/courses/{id}',[\App\Http\Controllers\CourseController::class,'update'])->name('courses.update');
Route::get('course/{id}',[\App\Http\Controllers\CourseController::class,'destroy']);

//Prof crud
Route::resource('/instructors','\App\Http\Controllers\InstructorController');
Route::post('/instructors',[\App\Http\Controllers\InstructorController::class,'store'])->name('instructors.store');
Route::get('instructor/{id}',[\App\Http\Controllers\InstructorController::class,'destroy']);
Route::post('/instructor/{id}',[\App\Http\Controllers\InstructorController::class,'update']);

//student crud
Route::resource('/students','\App\Http\Controllers\StudentController');
Route::post('/students',[\App\Http\Controllers\StudentController::class,'store']);
Route::post('student/{id}',[\App\Http\Controllers\StudentController::class,'update']);
Route::get('student/{id}',[\App\Http\Controllers\StudentController::class,'destroy']);

//video crud

Route::resource('/videos','\App\Http\Controllers\VideoController');
Route::post('videos',[\App\Http\Controllers\VideoController::class,'store']);
Route::get('/video/{id}',[\App\Http\Controllers\VideoController::class,'destroy']);
Route::post('videos/{id}',[\App\Http\Controllers\VideoController::class,'update']);
//review
Route::resource('/reviews','\App\Http\Controllers\ReviewController');
Route::post('reviews',[\App\Http\Controllers\ReviewController::class,'store'])->name('reviews.store');
Route::get('/review/{id}',[\App\Http\Controllers\ReviewController::class,'destroy']);
Route::post('reviews/{id}',[\App\Http\Controllers\ReviewController::class,'update']);
