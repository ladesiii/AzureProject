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
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $usuario = Usuario::where('email', $request->email)->first();

        if (!$usuario || !Hash::check($request->password, $usuario->password)) {
            session()->flash('error', 'Credenciales incorrectas.');
            return redirect()->back()->withInput();
        }

        // Log the user in and redirect to intended page
        auth()->login($usuario);
        session()->flash('success', 'Bienvenido ' . $usuario->email);
        return redirect()->intended('/');
    }
}
