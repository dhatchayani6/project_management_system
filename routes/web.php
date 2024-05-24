<?php

use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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


Route::get('/show',[DeveloperController::class,'show']);
Route::post('/add_developer',[DeveloperController::class,'developer_add']);
Route::get('/get_developer/{id}',[DeveloperController::Class,'edit_developer']);
Route::post('/edit_developer/{id}',[DeveloperController::class,'update_Developer']);
Route::get('/fetch-developers',[DeveloperController::class,'fetchDevelopers']);
