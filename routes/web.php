<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers;
use App\Auxiliar\Conexion;
use App\Http\Controllers\controladoradm;
use App\Http\Controllers\controladorusu;

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
    return view('index');
});

Route::get('index', function () {
    return view('index');
});

Route::get('indexAdm', function () {
    return view('adm.index');
});

Route::get('indexCliente', function () {
    return view('cliente.index');
});

Route::get('noticias', function () {
    return view('noticias');
});

Route::get('noticiasAdm', function () {
    return view('adm.noticias');
});

Route::get('noticiasCliente', function () {
    return view('cliente.noticias');
});

Route::get('citas', function () {
    return view('citas');
});

Route::get('citasAdm', function () {
    return view('adm.citas');
});

Route::get('citasCliente', function () {
    return view('cliente.citas');
});

Route::get('localizacion', function () {
    return view('localizacion');
});

Route::get('localizacionAdm', function () {
    return view('adm.localizacion');
});

Route::get('localizacionCliente', function () {
    return view('cliente.localizacion');
});
Route::get('servicios', function () {
    return view('servicios');
});

Route::get('serviciosAdm', function () {
    return view('adm.servicios');
});

Route::get('serviciosCliente', function () {
    return view('cliente.servicios');
});

Route::get('somos', function () {
    return view('somos');
});

Route::get('somosAdm', function () {
    return view('adm.somos');
});

Route::get('somosCliente', function () {
    return view('cliente.somos');
});

Route::get('inicio', function () {
    return view('inicio');
});

Route::get('inicioAdm', function () {
    return view('adm.inicio');
});

Route::get('olvidar', function () {
    return view('olvidar');
});

Route::get('olvidarAdm', function () {
    return view('adm.olvidar');
});

Route::get('crear', function () {
    return view('crear');
});
Route::get('crearAdm', function () {
    return view('adm.crear');
});

Route::get('privacidad', function () {
    return view('privacidad');
});

Route::get('privacidadAdm', function () {
    return view('adm.privacidad');
});

Route::get('adminUsuarios', function () {
    return view('adm.usuarios');
});

Route::get('perfilUsuAdm', function () {
    return view('adm.perfilUsu');
});

Route::get('perfilUsu', function () {
    return view('cliente.perfilUsu');
});

Route::get('usuarios', function () {
    return view('adm.usuarios');
});


Route::post('inicioSesion', 'App\Http\Controllers\controlador@inicioSesion');
Route::post('actualizarPerfil', 'App\Http\Controllers\controlador@actualizarPerfil');
Route::post('olvidarContrasena', 'App\Http\Controllers\controlador@olvidarContrasena');
Route::post('crearCuenta', 'App\Http\Controllers\controlador@crearCuenta');
Route::post('reservarCita', 'App\Http\Controllers\controlador@reservarCita');
Route::post('borrarCita', 'App\Http\Controllers\controlador@borrarCita');
Route::post('desconectar', 'App\Http\Controllers\controlador@cerrarSesion');


