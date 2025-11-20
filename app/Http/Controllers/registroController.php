<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class registroController extends Controller
{
    public function registro()
    {
        return view('registro');
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe ser válido.',
            'email.unique' => 'Este correo electrónico ya está registrado.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
        ]);

        // Si la validación falla, redirigir con errores
        if ($validator->fails()) {
            return redirect()->route('registro')
                ->withErrors($validator)
                ->withInput();
        }

        // Crear el nuevo usuario
        $user = User::create([
            'name' => explode('@', $request->email)[0], // Usar parte del email como nombre
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Redirigir a login con mensaje de éxito (sin iniciar sesión automáticamente)
        return redirect()->route('login')->with('success', '¡Registro exitoso! Por favor, inicia sesión.');
    }
}
