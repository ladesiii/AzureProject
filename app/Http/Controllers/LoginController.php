<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        $usuario = Usuario::where('email', $request->email)->first();

        if (!$usuario || !Hash::check($request->password, $usuario->password)) {
            $response  = redirect('/');
            session()->flash('Success', 'Bienvenido ' . $usuario->nombre);
        }
        else{
           session()->flash('error', 'Credenciales incorrectas.');
           $response = redirect()->back()->withInput();
        }

        return $response;
    }
}
