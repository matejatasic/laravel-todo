<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

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

Route::group(['middleware' => 'web'], function() {
    Route::get('/todo/index', [TodoController::class, 'index'])->name('todos.index');
    Route::get('/todo/create', [TodoController::class, 'create'])->name('todos.create');
    Route::post('/todo/store', [TodoController::class, 'store'])->name('todos.store');
    Route::get('/todo/{id}/edit', [TodoController::class, 'edit'])->name('todos.edit');
    Route::put('/todo/{id}/update', [TodoController::class, 'update'])->name('todos.update');
    Route::delete('/todo/{id}/delete', [TodoController::class, 'destroy'])->name('todos.destroy');
});

Auth::routes();
