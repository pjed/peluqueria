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

Route::get('noticias', function () {
    return view('noticias');
});

Route::get('citas', function () {
    return view('citas');
});

Route::get('localizacion', function () {
    return view('localizacion');
});

Route::get('servicios', function () {
    return view('servicios');
});

Route::get('somos', function () {
    return view('somos');
});

Route::get('inicio', function () {
    return view('inicio');
});

Route::get('olvidar', function () {
    return view('olvidar');
});

Route::get('crear', function () {
    return view('crear');
});

Route::get('privacidad', function () {
    return view('privacidad');
});

Route::post('inicioSesion', 'App\Http\Controllers\controlador@inicioSesion');
