<?php

use App\Http\Controllers\BuildController;
use App\Http\Controllers\BuildingsController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ConjuntosController;
use App\Http\Controllers\LlamadasController;
use App\Http\Controllers\PermisosController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\StatementsController;
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



Route::post('chat/joinChat', [ChatController::class, 'joinChat']);


Route::post('messages/getGuestMessages', [MessageController::class, 'getGuestMessages']);
Route::post('messages/guestMessages', [MessageController::class, 'getMessageForGuest']);

Route::post('messages/sendMessageToGuest', [MessageController::class, 'sendMessageToGuest']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');
Route::post('chat/getUser', [ChatController::class, 'getAuthUser']);
Route::post('messages/getMessages', [MessageController::class, 'getMessagesFrom']);
Route::post('messages/sendMessage', [MessageController::class, 'sendMessage']);
Route::delete('chat/endChat/{id}', [ChatController::class, 'endChat']);

// PAGINA EN CONSTRUCCION
Route::get('construir', BuildController::class)->name('construir');

// PERMISOS USUARIO 
Route::middleware(['auth'])->group(function () {
    Route::post('chat/getContacts', [ChatController::class, 'getContacts']);
    Route::post('chat/getRequests', [ChatController::class, 'getRequestsChats'])
        ->middleware('permission:chat.index');
    Route::get('chat', [ChatController::class, 'index'])->name('chat.index')
        ->middleware('permission:chat.index');
    Route::get('user/paginate', [UserController::class, 'paginate'])->name('user.paginate')
        ->middleware('permission:user.index');
    Route::post('user/store', [UserController::class, 'store'])->name('user.store')
        ->middleware('permission:user.create');
    Route::get('user', [UserController::class, 'index'])->name('user.index')
        ->middleware('permission:user.index');
    Route::get('user/create', [UserController::class, 'create'])->name('user.create')
        ->middleware('permission:user.create');
    Route::put('user/{id}', [UserController::class, 'update'])->name('user.update')
        ->middleware('permission:user.edit');
    Route::get('user/{id}', [UserController::class, 'show'])->name('user.show')
        ->middleware('permission:user.show');
    Route::delete('user/{id}', [UserController::class, 'destroy'])->name('user.destroy')
        ->middleware('permission:user.destroy');
    Route::get('historial', [HistoryController::class, 'index'])->name('historial.index')
        ->middleware('permission:user.edit');
    Route::get('historial/getAudits', [HistoryController::class, 'getAudits'])->name('historial.get')
        ->middleware('permission:historial.index');
    Route::get('historial/{id}', [HistoryController::class, 'getDetails'])->name('historial.detalles')
        ->middleware('permission:historial.show');
    //rutas para  ver clientes, detalles de clientes y extractos
    Route::get('clientes', [ClientsController::class, 'index'])->name('clientes.index')
        ->middleware('permission:clients.index');
    Route::get('clientes/{id}', [ClientsController::class, 'getDetails'])->name('clientes.detalles')
        ->middleware('permission:clients.show');
    Route::get('clientes/extractos/{id}', [StatementsController::class, 'getStatements'])->name('clientes/extractos')
        ->middleware('permission:statement.details');
        //ruta para obtener los extractos del cliente
    Route::get('extractos/cliente', [StatementsController::class, 'getOwnStatements'])->name('extractos.cliente')
        ->middleware('permission:statement.client');
});

// RUTAS LLAMADAS 
Route::middleware(['auth'])->group(function () {

    Route::get('/buscar', [LlamadasController::class, 'cargarClientes']);

    Route::get('/llamadas/buscar', [LlamadasController::class, 'searchCall']);

    Route::get('llamadas', [LlamadasController::class, 'index'])
        ->name('llamadas');

    Route::get('/llamadas/show/{id}', [BuildingsController::class, 'show'])
        ->name('conjuntos.show');

    Route::get('/llamadas/client/{id}', [LlamadasController::class, 'client'])
        ->name('llamadas.client');

    Route::get('/llamadas/agreement/{id}', [LlamadasController::class, 'agreement'])
        ->name('llamadas.agreement');

    Route::get('llamadas/create/{id}', [LlamadasController::class, 'create'])
        ->name('llamadas.create');

    Route::get('/llamadas/account/{id}', [LlamadasController::class, 'account'])
        ->name('state.account');

    Route::post('/llamadas/store', [LlamadasController::class, 'store'])
        ->name('llamadas.store');

    Route::post('/llamadas/store_acuerdo', [LlamadasController::class, 'storeAgreement'])
        ->name('llamadas.store');

    Route::post('/account/store', [LlamadasController::class, 'storeAccount'])
        ->name('account.store');

    Route::get('llamadas/{user}/edit', [LlamadasController::class, 'edit'])
        ->name('llamadas.edit');

    Route::put('llamadas/{user}', [LlamadasController::class, 'update'])
        ->name('llamadas.update');

    Route::delete('llamadas/{user}', [LlamadasController::class, 'destroy'])
        ->name('llamadas.destroy');

    Route::put('llamadas/{user}/restore', [LlamadasController::class, 'restore'])
        ->name('llamadas.restore');
});



// RUTAS CONJUNTOS  
Route::middleware(['auth'])->group(function () {

    Route::get('/buscar/conjunto', [BuildingsController::class, 'cargarConjunto']);
    Route::get('/buscar/conjuntos', [BuildingsController::class, 'cargarConjuntos']);
    Route::get('/buscar/conjuntos/short', [BuildingsController::class, 'cargarConjuntosShort']);
    Route::get('/buscar/administradores', [BuildingsController::class, 'cargarAdministradores']);


    Route::get('/conjuntos', [BuildingsController::class, 'index'])
        ->name('conjuntos');

    Route::get('conjuntos/show/{id}', [BuildingsController::class, 'show'])
        ->name('conjuntos.show');

    Route::get('/conjuntos/create', [BuildingsController::class, 'create'])
        ->name('conjuntos.create');

    Route::post('/conjuntos/store', [BuildingsController::class, 'store'])
        ->name('conjuntos.store');

    Route::get('conjuntos/{id}/edit', [BuildingsController::class, 'edit'])
        ->name('conjuntos.edit');

    Route::put('conjuntos/update/{id}', [BuildingsController::class, 'update'])
        ->name('conjuntos.update');

    // Route::delete('conjuntos/{user}', [ConjuntosController::class, 'destroy'])
    //     ->name('conjuntos.destroy'); 

    Route::put('conjuntos/{user}/restore', [ConjuntosController::class, 'restore'])
        ->name('conjuntos.restore');
    Route::get('conjuntos/template', [BuildingsController::class, 'exportTemplate'])
        ->middleware('permission:conjuntos.export');
});


// RUTAS controladorr cliente
Route::middleware(['auth'])->group(function () {

    Route::get('/buscar/estados/', [ClientsController::class, 'estados']);
    Route::get('/buscar/clientes', [ClientsController::class, 'cargarClientes']);
    Route::post('/importar/clientes', [ClientsController::class, 'importClients'])->middleware('permission:clients.import');
});



// GISTION DE ROLES Y PERMISSOS
Route::middleware(['auth'])->group(function () {

    // GET INDEX :Vista permisos
    Route::get('/permisos', [PermisosController::class, 'index'])->name('permisos');
    // POST STORE ROL :Crear rol
    Route::post('/rol', [PermisosController::class, 'storeRol'])->name('rol');
    // POST SOTORE PERMISO :Crear permiso
    Route::post('/permiso', [PermisosController::class, 'storePermiso'])->name('permiso');
    // *** POST SOTORE : Asiganar rol a un usuario por id
    Route::post('/asignar', [PermisosController::class, 'test'])->name('asignar');


    // TEST=  STORE ROL
    Route::post('/create/rol', [PermisosController::class, 'storeRol'])->name('create.rol');

    Route::post('/permisos/crear', [PermisosController::class, 'test'])->name('rol.permisos');

    // Testing  
    // Route::post('/permisos',[PermisosController::class,'testIP'])->name('permisos.dos');
    // // 
    // Route::get('/asigna', [PermisosController::class,'asignaT'])->name('asigna');
    // // 
    // Route::get('asigna/permisos', [PermisosController::class, 'asignaTP'])->name('asigna.permisos');

    // Route::get('/permisos/show', [PermisosController::class, 'index'])->name('permisos.show');

    Route::get('iframe', [PermisosController::class, 'iframe'])->name('iframe');
    Route::get('/ventana', [LlamadasController::class, 'indexVentana'])->name('ventana');
    Route::get('/ventana/create', [LlamadasController::class, 'ventanaIndes'])->name('ventana.create');
});
Route::get('prueba/{id}', [PermisosController::class, 'test'])->name('prueba');
