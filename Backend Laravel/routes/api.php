<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MiembroController;
use App\Http\Controllers\AsignacionRolController;
use App\Http\Controllers\MinisterioController;
use App\Http\Controllers\MinisterioAsignacionController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::get('lista.asignacion/{id}', [AsignacionRolController::class, 'listaasigancion']);


//Consulta devuelve todas las asignaciones de los usuarios

//nueva consulta trae idasignacion, nombre del ministerio, nombre del usuario y las fechas
Route::get('listado.asignacion', [AsignacionRolController::class, 'consultaAsignacion']);

Route::get('consulta', [AsignacionRolController::class, 'consulta']);//listado de las asignaciones de ministerios

Route::get('miembro.iglesia', [MiembroController::class, 'miembroRegistro']);//Lista a los miembro con bautizo y Igleasia




// Route::middleware(['auth:sanctum'])->group(function () {

Route::get('consulta/{id}', [AsignacionRolController::class, 'consultaministerioasig']);

Route::get('miembro.lista', [MiembroController::class, 'miembros']);

Route::controller(UserController::class)->group(function () {
    Route::get('usuario', [UserController::class, 'index']);
    Route::delete('usuario/{id}', [UserController::class, 'destroy']);
    Route::get('usuario.buscador', [UserController::class, 'show']);
    Route::get('filtrousuarios', [UserController::class, 'filtrousers']);
});

Route::controller(MiembroController::class)->group(function () {
    Route::get('miembro',[MiembroController::class, 'index'])->name('miembros.index');
    Route::post('miembro', [MiembroController::class, 'store'])->name('miembros.store');
    Route::get('miembro/{id}', [MiembroController::class, 'show'])->name('miembros.show');
    Route::put('miembro/{id}', [MiembroController::class, 'update'])->name('miembros.update');
    Route::delete('miembro/{id}', [MiembroController::class, 'destroy'])->name('miembros.destroy');
});
Route::controller(AsignacionRolController::class)->group(function () {
    Route::get('asignacion',[AsignacionRolController::class, 'index'])-> name('asignacion.index');
    Route::post('asignacion', [AsignacionRolController::class, 'store'])-> name('asignacion.store');
    Route::get('asignacion/{id}', [AsignacionRolController::class, 'show'])-> name('asignacion.show');
    Route::put('asignacion/{id}', [AsignacionRolController::class, 'update'])-> name('asignacion.update');
    Route::delete('asignacion/{id}', [AsignacionRolController::class, 'destroy'])-> name('asignacion.destroy');
});

Route::controller(MinisterioController::class)->group(function () {
    Route::get('ministerio',[MinisterioController::class, 'index'])->name('ministerio.index');
    Route::post('ministerio', [MinisterioController::class, 'store'])->name('ministerio.store');
    Route::get('ministerio/{id}', [MinisterioController::class, 'show'])->name('ministerio.show');
    Route::put('ministerio/{id}', [MinisterioController::class, 'update'])->name('ministerio.update');
    Route::delete('ministerio/{id}', [MinisterioController::class, 'destroy'])->name('ministerio.destroy');
});
Route::controller(MinisterioAsignacionController::class)->group(function () {
    Route::get('ministerioasig',[MinisterioAsignacionController::class, 'index'])->name('ministerioasig.index');
    Route::post('ministerioasig', [MinisterioAsignacionController::class, 'store'])->name('ministerioasig.store');
    Route::get('ministerioasig/{id}', [MinisterioAsignacionController::class, 'show'])->name('ministerioasig.show');
    Route::put('ministerioasig/{id}', [MinisterioAsignacionController::class, 'update'])->name('ministerioasig.update');
    Route::delete('ministerioasig/{id}', [MinisterioAsignacionController::class, 'destroy'])->name('ministerioasig.destroy');
});

Route::get('logout', [AuthController::class, 'logout']);
    
// });