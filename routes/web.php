<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ActiveTasksController;
use App\Http\Controllers\taskDetailsController;
use App\Http\Controllers\ComplitedTaskController;

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

Auth::routes();


Route::middleware('auth')->group(function (){
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/activeTasks', [ActiveTasksController::class, 'index']);
    Route::get('/completedTasks', [ComplitedTaskController::class, 'index']);
    Route::get('/addTask',[ActiveTasksController::class, 'create'])->name('addTask');
    Route::post('/storeTask',[ActiveTasksController::class, 'store'])->name('storeTask');
    Route::get('/taskDetail/{id}',[taskDetailsController::class, 'show'])->name('taskDetail');
    Route::post('/updateTask/{id}', [taskDetailsController::class, 'update'])->name('updateTask');
});