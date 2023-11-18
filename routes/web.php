<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\IndexController;

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
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('home');
})->middleware('auth')->name('dashboard');

Route::middleware(['auth','role:admin'])->name('admin.')->prefix('admin')->group(function (){
    Route::get('/',[IndexController::class,'index'])->name('index');
    Route::resource('/roles',RoleController::class);
    Route::post('/roles/{role}/permission',[RoleController::class,'givepermission'])->name('roles.permissions');
    Route::delete('/roles/{role}/permission/{permission}',[RoleController::class,'removePermission'])->name('roles.permission.delete');
    Route::resource('/permissions',PermissionController::class);
    Route::post('permissions/{permission}/roles',[PermissionController::class,'assignRole'])->name('permissions.roles');
    Route::delete('/permission/{permission}/roles/{role}',[PermissionController::class,'removeRole'])->name('permission.roles.remove');

    Route::get('users',[\App\Http\Controllers\Admin\UserController::class,'index'])->name('users.index');
    Route::get('users/{user}',[UserController::class,'show'])->name('users.show');
    Route::delete('/users/{user}',[\App\Http\Controllers\Admin\UserController::class,'destroy'])->name('users.destroy');
    Route::post('/users/{user}/roles', [UserController::class, 'assignRole'])->name('users.roles');
    Route::delete('/users/{user}/roles/{role}', [UserController::class, 'removeRole'])->name('users.roles.remove');
    Route::post('users/{user}/permission',[UserController::class,'givePermission'])->name('users.permissions');
    Route::delete('users/{user}/permission/{permission}',[UserController::class,'revokePermission'])->name('users.permission.remove');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
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
Route::get('student/download/{id}',[\App\Http\Controllers\StudentController::class,'download']);
Route::get('/downloads',[\App\Http\Controllers\StudentController::class,'downloads']);
Route::get('re-image/{id}',[\App\Http\Controllers\StudentController::class,'re_img']);

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
