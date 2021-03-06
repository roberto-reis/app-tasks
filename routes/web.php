<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Task\CreateTask;
use App\Http\Livewire\Task\EditTask;
use App\Http\Livewire\Task\ShowTasks;
use Illuminate\Support\Facades\Auth;
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


// Routes Auth
Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');
Route::get('logout', LogoutController::class)->name('logout');


// Routes Tasks
Route::group(['middleware' => 'auth'], function() {
    Route::get('/', ShowTasks::class)->name('tasks.show');
    Route::get('/task/create', CreateTask::class)->name('task.create');
    Route::get('/task/edit/{id}', EditTask::class)->name('task.edit');
});

