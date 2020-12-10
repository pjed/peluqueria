<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class controlador extends Controller
{
    
    /**
     * Cerrar sesion
     * @author Pedro
     * @param Request $req
     * @return type
     */
    public function cerrarSesion(Request $req) {
        session()->invalidate();
        session()->regenerate();
        return view('inicio');
    }
    
    /**
     * Método para comprobar si un usuario existe en la BD para hacer login
     * @param type $correo email del usuario
     * @param type $pwd contraseña del usuario
     * @return type usuario
     */
    static function inicioSesion($correo, $pwd) {
        $correo = $req->get('usuario');
        $pass = $req->get('pwd');
        
        $user = usuario::all();
        
        dd($v);
        $rol = rol::all();
        $tiene = tiene::all();

        $user->where([
            ['EMAIL', '=', $correo],
            ['PASSWORD', '=', $pass]
        ])->get();
        return $v;
    }
}
