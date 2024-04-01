<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Registro de usuarios
    public function register(Request $request)
    {
        try {
            // Validar la solicitud
            $validatedData = $request->validate([
                'name' => 'required|max:255',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8|confirmed',
            ]);

            // Crear el usuario
            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
            ]);

            // Crear token para el usuario
            $token = $user->createToken('auth_token')->plainTextToken;

            // Devolver respuesta exitosa
            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
                'user' => $user
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Devolver respuesta con errores de validación
            return response()->json([
                'errors' => $e->validator->getMessageBag()
            ], 422);
        } catch (\Exception $e) {
            // Devolver respuesta genérica de error
            return response()->json([
                'message' => 'Error al registrar al usuario.',
                'exception' => $e->getMessage()
            ], 500);
        }
    }


    // Ingreso de usuario
    public function login(Request $request)
    {
        // Validar la solicitud
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Intentar autenticar al usuario
        if (!Auth::attempt($validatedData)) {
            return response()->json([
                'message' => 'Las credenciales son incorrectas.'
            ], 401);
        }

        // Buscar usuario
        $user = User::where('email', $request['email'])->firstOrFail();

        // Crear token para login
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user
        ]);
    }

    // Logout usuario
    public function logout(Request $request)
    {
        // Revocar el token del usuario autenticado
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Cierre de sesión exitoso.']);
    }

    // Ver perfil del usuario
    public function show()
    {
        return response()->json(auth()->user());
    }

    // Borrar cuenta de usuario
    public function destroy(Request $request)
    {
        // El usuario solo pueda borrar su propia cuenta
        $user = $request->user();

        if ($request->user()->cannot('delete', $user)) {
            return response()->json(['message' => 'This action is unauthorized.'], 403);
        }

        $user->tokens()->delete();
        $user->enabled = false;
        $user->deleted = true;
        $user->save();

        return response()->json(['message' => 'Cuenta eliminada con éxito.'], 200);
    }

    // verificar si el usuario autenticado tiene el permiso
    public function checkSuperAdminPermission(Request $request)
    {
        $hasRole = $request->user()->hasRole('superAdmin');
        return response()->json(['hasSuperAdminRole' => $hasRole]);
    }
}
