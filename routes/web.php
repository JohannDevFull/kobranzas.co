<?php

use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');

Route::middleware(['auth'])->group(function () {
   
    Route::post('user/store', [UserController::class,'store'])->name('user.store')
                                                        ->middleware('permission:user.create');
    Route::get('user', [UserController::class,'index'])->name('user.index')
                                                        ->middleware('permission:user.index');
    Route::get('user/create', [UserController::class,'create'])->name('user.create')
                                                        ->middleware('permission:user.create');
    Route::put('user/{id}', [UserController::class,'update'])->name('user.update')
                                                        ->middleware('permission:user.edit');
    Route::get('user/{id}', [UserController::class,'show'])->name('user.show')
                                                        ->middleware('permission:user.show');
    Route::delete('user/{id}', [UserController::class,'destroy'])->name('user.destroy')
                                                        ->middleware('permission:user.destroy');
    Route::get('user/{id}/edit', [UserController::class,'edit'])->name('user.edit')
                                                        ->middleware('permission:user.edit');
});