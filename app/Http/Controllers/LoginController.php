<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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


        // $usuario = new Usuario();

        // $usuario->nombre = "Pepe";
        // $usuario->email = "pepe@example.com";
        // $usuario->password = bcrypt("12345");
        // $usuario->id_rol = 2;

        // $usuario->save();

        $usuario = Usuario::where('email', $request->email)->first();

        if (!$usuario) {
            return redirect()->back()->withInput()->with('error_type', 'email_not_found');
        }

        if (!Hash::check($request->password, $usuario->password)) {
            return redirect()->back()->withInput()->with('error_type', 'password_incorrect');
        }

        // Log the user in and redirect to intended page
        Auth::login( $usuario);
        session()->flash('success', 'Bienvenido ' . $usuario->email);
        return redirect()->intended('/');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('landing');
    }
}
