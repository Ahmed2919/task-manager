<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
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

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::resource('/projects', ProjectController::class)->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/projects/{project}/task', [TaskController::class, 'store']);

Route::patch('/projects/{project}/task/{task}', [TaskController::class, 'update']);

Route::delete('/projects/{project}/task/{task}', [TaskController::class, 'destroy']);

Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth');

Route::patch('/profile', [ProfileController::class, 'update']);
