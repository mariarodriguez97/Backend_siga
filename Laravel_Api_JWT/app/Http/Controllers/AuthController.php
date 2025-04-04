<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Docente;
use App\Models\Administrativo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function registrar(Request $request)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'rol_id' => 'required|exists:roles,id',
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'correo' => 'required_if:rol_id,1,2|email|unique:usuarios,correo',
            'password' => 'required_if:rol_id,1,2|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Crear el usuario (si aplica)
        $usuario = null;
        if ($request->rol_id == 1 || $request->rol_id == 2) { // Administrativos y docentes
            $usuario = Usuario::create([
                'rol_id' => $request->rol_id,
                'estado' => 1,
                'correo' => $request->correo,
                'password' => Hash::make($request->password),
            ]);
        }

        // Crear el registro específico del rol
        if ($request->rol_id == 1) { // Administrativo
            Administrativo::create([
                'usuario_id' => $usuario->id,
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
            ]);
        } elseif ($request->rol_id == 2) { // Docente
            Docente::create([
                'usuario_id' => $usuario->id,
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
            ]);
        }

        return response()->json(['mensaje' => 'Usuario registrado con éxito'], 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('correo', 'password');
    
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'Credenciales inválidas'], 401);
            }
        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['error' => 'Error al generar el token: ' . $e->getMessage()], 500);
        }
    
        return response()->json(['token' => $token]);
    }

    public function index() {
        $usuarios = Usuario::all();

        $data = [
            'usuarios' => $usuarios,
            'status' => 200
        ];

        return response()->json($data,200);
    }

    public function refresh() {
        return response()->json(['token' => JWTAuth::refresh()]);           
    }

    public function profile() {
        
        $usuarios = JWTAuth::user();

        if(!$usuarios) {
            return response()->json([
                'mensaje' => 'El usuario no existe',
                'error' => 'not found',
            ],404);
        }

        $data = [
            'usuarios' => [
                'id'=> $usuarios->id,
                'rol_id' => $usuarios->rol_id,
                'correo' => $usuarios->correo,
                'password' => $usuarios->password,
            ],
        ];

        return response()->json ([
            'success' => $data,
            'message' => 'Perfil del usuario'
        ]);
    }

    public function logout() {
        JWTAuth::invalidate();
        return response()->json(['mensaje' => 'Sesion cerrada con exito']);
    }

    public function update(Request $request, $id) {
        $usuario = Usuario::find($id);

        if (!$usuario) {
            $data = [
                'mensaje' => 'Usuario no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'rol_id' => 'required|exists:roles,id',
            'correo' => 'required_if:rol_id,1,2|email|unique:usuarios,correo,' . $usuario->id,
            'password' => 'required_if:rol_id,1,2|string|min:6',
        ]);

        if ($validator->fails()) {
            $data = [
                'mensaje' => 'Error al actualizar el usuario',
                'error' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $usuario->rol_id = $request->rol_id;
        $usuario->correo = $request->correo;
        $usuario->password = Hash::make($request->password);
        $usuario->save();

        $data = [
            'usuario' => $usuario,
            'mensaje' => 'Usuario actualizado con exito',
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function updatePartial(Request $request, $id) {
        $usuario = Usuario::find($id);

        if (!$usuario) {
            $data = [
                'mensaje' => 'Usuario no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'rol_id', 
            'correo',
            'password',
        ]);

        if ($validator->fails()) {
            $data = [
                'mensaje' => 'Error al actualizar el usuario',
                'error' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        if ($request->has('rol_id')) {
            $usuario->rol_id = $request->rol_id;
        }

        if ($request->has('correo')) {
            $usuario->correo = $request->correo;
        }

        if ($request->has('password')) {
            $usuario->password = Hash::make($request->password);
        }

        $usuario->save();

        $data = [
            'usuario' => $usuario,
            'mensaje' => 'Usuario actualizado con exito',
            'status' => 200
        ];
        return response()->json($data, 200);
        
        } 

        public function destroy($id) {
            $usuario = Usuario::find($id);

            if (!$usuario) {
                $data = [
                    'mensaje' => 'Usuario no encontrado',
                    'status' => 404
                ];
                return response()->json($data, 404);
            }

            $usuario->delete();

            $data = [
                'mensaje' => 'Usuario eliminado con exito',
                'status' => 200
            ];
            return response()->json($data, 200);
        }



}