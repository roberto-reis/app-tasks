<?php

use App\Http\Livewire\Task\CreateTask;
use App\Http\Livewire\Task\EditTask;
use App\Http\Livewire\Task\ShowTasks;
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

// Route::get('/', function () {
//     return view('task.edit');
// });

Route::get('/tasks', ShowTasks::class)->name('tasks.show');
Route::get('/task/create', CreateTask::class)->name('task.create');
Route::get('/task/edit/{id}', EditTask::class)->name('task.edit');

