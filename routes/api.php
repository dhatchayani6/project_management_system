<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/homepage',[LoginController::class,'login']);
Route::get('/show_developer_page',[DeveloperController::class,'developer_show_page']);
Route::post('/add_developer', [DeveloperController::class, 'add_developer']);


//admin page
Route::get('/admin/fetch-student', [AdminController::class, 'fetchStudents']);

//nama inga student page la student_register pandrom la naga kudukura datava inga nama show pndrom

//developer page
Route::get('/developers', [DeveloperController::class, 'show']);
Route::post('/add_developer', [DeveloperController::class, 'store']);
Route::get('/fetch-developer',[DeveloperController::class,'fetch']);



//student page
Route::get('/students',[StudentController::class,'show_student']);
Route::get('student',[StudentController::class,'student_register'])->name('student');
// Route::post('/add_student',[StudentController::class,'store_student'])->name('add_student');
Route::get('/student/fetch-students',[StudentController::class,'fetchstudent']);