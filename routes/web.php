<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassroomsController;

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

/*Route::view('/', 'welcome')->name('home');
Route::get('classrooms/create', [ClassroomsController::class, 'create'])->name('classrooms.create');
Route::post('/classrooms', [ClassroomsController::class, 'store'])->name('classrooms.store');
Route::get('/classrooms', [ClassroomsController::class, 'index'])->name('classrooms.index');
Route::get('/classrooms/{classroom}/edit', [ClassroomsController::class, 'edit'])->name('classrooms.edit');
Route::put('/classrooms/{classroom}', [ClassroomsController::class, 'update'])->name('classrooms.update')->where(['id' => '\d+']);
Route::get('/classrooms/{classroom}', [ClassroomsController::class, 'show'])->name('classrooms.show');
Route::delete('/classrooms/{classroom}', [ClassroomsController::class, 'destroy'])->name('classrooms.destroy');*/
Route::view('/', 'welcome')->name('home');

// route model binding

Route::resource('classrooms',ClassroomsController::class);

