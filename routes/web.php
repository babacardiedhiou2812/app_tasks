<?php

use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\ProfileController;
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
    return view('home');
})->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')
    ->controller(UserController::class)
    ->name('admin.users.')
    ->middleware('can:admin')
    ->group(function () {

    Route::get('users','index')->name('index');
    Route::get('/users/edit/{user}','edit')->name('edit');
    Route::post('/users/edit/{user}','update')->name('update');
});


Route::prefix('task')
    ->controller(TaskController::class)
    ->name('task.')
    ->group(function () {

    Route::get('/','index')->name('index');
    Route::get('/assigned','MyTask')->name('MyTask');
});


// Route::controller(TaskController::class)
//     ->name('task.')
//     ->group(function(){

//     Route::get('/task','index')->name('index');
//     Route::get('/task/{task}','show')->name('show');
//     Route::get('/task/create','create')->name('create');
//     Route::post('/task/create','store')->name('store');
//     Route::get('/task/edit/{task}','edit')->name('edit');
//     Route::post('/task/edit/{task}','update')->name('update');

// })->middleware('auth');

require __DIR__.'/auth.php';