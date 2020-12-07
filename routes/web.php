<?php
use App\Http\Controllers\BuildController;
use App\Http\Controllers\LlamadasController;
use App\Http\Controllers\PermisosController;
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
 
// PAGINA EN CONSTRUCCION
Route::get('construir', BuildController::class)->name('construir');




// PERMISOS USUARIO 
Route::middleware(['auth'])->group(function () {
   
    Route::post('user/store', [UserController::class,'store'])->name('user.store')

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


Route::middleware(['auth'])->group(function () {
   
    Route::get('llamadas', [LlamadasController::class, 'index'])
    ->name('llamadas');

    Route::get('llamadas/create', [LlamadasController::class, 'create'])
        ->name('llamadas.create');

    Route::post('llamadas', [LlamadasController::class, 'store'])
        ->name('llamadas.store');

    Route::get('llamadas/{user}/edit', [LlamadasController::class, 'edit'])
        ->name('llamadas.edit');

    Route::put('llamadas/{user}', [LlamadasController::class, 'update'])
        ->name('llamadas.update'); 

    Route::delete('llamadas/{user}', [LlamadasController::class, 'destroy'])
        ->name('llamadas.destroy'); 

    Route::put('llamadas/{user}/restore', [LlamadasController::class, 'restore'])
        ->name('llamadas.restore'); 
});


// GISTION DE ROLES Y PERMISSOS
Route::middleware(['auth'])->group(function () {
    
    Route::get('/crear/{nom}', [PermisosController::class, 'crearPermiso'])->name('crear');

    Route::get('rol/{nom}', [PermisosController::class, 'crearRol'])->name('rol');

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