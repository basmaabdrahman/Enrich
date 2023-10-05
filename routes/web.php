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



