<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeveloperController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/',[LoginController::class,'index']);
Route::get('/homepage',[LoginController::class,'login']);


//admin page
// Route::get('/admin/fetch-students', [AdminController::class, 'fetchStudents']);
// Route::get('/student/fetch-students',[AdminController::class,'fetchstudent']);
// Route::post('/add_student',[AdminController::class,'store_student'])->name('add_student');

Route::post('/add_student', [AdminController::class, 'storeStudent'])->name('add_student');
Route::get('/admin/students', [AdminController::class, 'showStudents']);
Route::get('/get_students', [AdminController::class, 'getStudents']);

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

Route::post('/accept_student', [StudentController::class,'accept']);
Route::post('/reject_student', [StudentController::class,'reject']);
