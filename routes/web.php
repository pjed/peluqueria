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
    return view('adm.indexAdm');
});

Route::get('indexCliente', function () {
    return view('cliente.indexCliente');
});

Route::get('noticias', function () {
    return view('noticias');
});

Route::get('noticiasAdm', function () {
    return view('adm.noticiasAdm');
});

Route::get('noticiasCliente', function () {
    return view('cliente.noticiasCliente');
});

Route::get('citas', function () {
    return view('citas');
});

Route::get('citasAdm', function () {
    return view('adm.citasAdm');
});

Route::get('citasCliente', function () {
    return view('cliente.citasCliente');
});

Route::get('localizacion', function () {
    return view('localizacion');
});

Route::get('localizacionAdm', function () {
    return view('adm.localizacionAdm');
});

Route::get('localizacionCliente', function () {
    return view('cliente.localizacionCliente');
});
Route::get('servicios', function () {
    return view('servicios');
});

Route::get('serviciosAdm', function () {
    return view('adm.serviciosAdm');
});

Route::get('serviciosCliente', function () {
    return view('cliente.serviciosCliente');
});

Route::get('somos', function () {
    return view('somos');
});

Route::get('somosAdm', function () {
    return view('adm.somosAdm');
});

Route::get('somosCliente', function () {
    return view('cliente.somosCliente');
});

Route::get('inicio', function () {
    return view('inicio');
});

Route::get('inicioAdm', function () {
    return view('adm.inicioAdm');
});

Route::get('olvidar', function () {
    return view('olvidar');
});

Route::get('olvidarAdm', function () {
    return view('adm.olvidarAdm');
});

Route::get('crear', function () {
    return view('crear');
});
Route::get('crearAdm', function () {
    return view('adm.crearAdm');
});

Route::get('privacidad', function () {
    return view('privacidad');
});

Route::get('privacidadAdm', function () {
    return view('adm.privacidadAdm');
});

Route::get('adminUsuarios', function () {
    return view('adm.usuarios');
});

Route::get('perfilUsu', function () {
    return view('adm.perfilUsu');
});

Route::get('perfilUsuCliente', function () {
    return view('cliente.perfilUsuCliente');
});

Route::get('usuarios', function () {
    return view('adm.usuarios');
});

Route::post('inicioSesion', 'App\Http\Controllers\controlador@inicioSesion');
Route::post('crearCuenta', 'App\Http\Controllers\controlador@crearCuenta');
