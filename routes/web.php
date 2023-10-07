<?php

use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});
//courses crud
Route::get('/courses',[CourseController::class,'index'])->name('courses.index');
Route::get('add-course',[CourseController::class,'create'])->name('courses.create');
Route::post('/courses',[CourseController::class,'store'])->name('courses.store');
Route::get('/courses/edit/{id}',[CourseController::class,'edit'])->name('courses.edit');
Route::post('/courses/{id}',[CourseController::class,'update'])->name('courses.update');
Route::get('/courses/{id}',[CourseController::class,'destroy'])->name('courses.destroy');

//Prof crud
Route::get('instructors',[\App\Http\Controllers\InstructorController::class,'index'])->name('instructors.index');
Route::get('add-instructor',[\App\Http\Controllers\InstructorController::class,'create'])->name('instructors.create');
Route::post('/instructors',[\App\Http\Controllers\InstructorController::class,'store'])->name('instructors.store');
Route::get('/instructors/{id}',[\App\Http\Controllers\InstructorController::class,'destroy']);
Route::get('/instructor/edit/{id}',[\App\Http\Controllers\InstructorController::class,'edit']);
Route::post('/instructor/{id}',[\App\Http\Controllers\InstructorController::class,'update']);
