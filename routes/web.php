<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\TodoController;
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

// Route::get('/todo-tasks', function () {
//     return view('todo.index');
// });

Route::resource('/todo-tasks', TodoController::class);
Route::get('/login',[LoginController::class,'loginForm'])->name('login');
Route::post('/login',[LoginController::class,'Login']);
Route::post('/logout',[LoginController::class,'logout'])->name('logout');


Route::get('/register-form',[LoginController::class,'registerForm'])->name('register');
Route::post('/register-form',[LoginController::class,'Register']);


Route::middleware('auth')->group(function(){
    Route::resource('/todo-tasks', TodoController::class);
});
