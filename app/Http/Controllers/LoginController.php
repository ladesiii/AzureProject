<?php
/**
 * Controlador de Autenticación (Login/Logout)
 *
 * Gestiona el formulario de inicio de sesión, la validación de credenciales,
 * el inicio de sesión con `Auth::login` y el cierre de sesión con invalidación
 * de sesión y regeneración de token CSRF.
 */

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLogin()
    {
        // Renderiza la vista de login
        return view('login');
    }
    public function login(Request $request)
    {
        // Validación de campos requeridos
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

        // Busca el usuario por email
        $usuario = Usuario::where('email', $request->email)->first();

        if (!$usuario) {
            // Correo no registrado
            return redirect()->back()->withInput()->with('error_type', 'email_not_found');
        }

        if (!Hash::check($request->password, $usuario->password)) {
            // Contraseña inválida
            return redirect()->back()->withInput()->with('error_type', 'password_incorrect');
        }

        // Inicia sesión y redirige a la página pretendida
        Auth::login( $usuario);
        session()->flash('success', 'Bienvenido ' . $usuario->email);
        return redirect()->intended('/');
    }

    public function logout(Request $request)
    {
        // Cierre de sesión e invalidación de la sesión actual
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('landing');
    }
}
