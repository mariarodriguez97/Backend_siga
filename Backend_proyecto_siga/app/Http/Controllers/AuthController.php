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
    $validator = Validator::make($request->all(), [
        'correo' => 'required|email|unique:usuarios,correo',
        'password' => 'required|string|min:6',
        'rol_id' => 'required|exists:roles,id',
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()], 400);
    }

    $usuario = Usuario::create([
        'correo' => $request->correo,
        'password' => Hash::make($request->password),
        'estado' => 1,
        'rol_id' => $request->rol_id, // ahora sí lo pedimos y guardamos
    ]);

    return response()->json(['mensaje' => 'Usuario registrado con éxito', 'usuario' => $usuario], 201);
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

    public function usuariosDisponiblesDocentes() {
            $usuarios = Usuario::where('rol_id', 2)
                                ->whereNotIn('id', Docente::pluck('usuario_id'))
                                ->get();
        
            return response()->json($usuarios);
        }

        public function usuariosDisponiblesAdministrativos()
        {
            $usuarios = Usuario::where('rol_id', 1)
                                ->whereNotIn('id', Administrativo::pluck('usuario_id'))
                                ->get();
        
            return response()->json($usuarios);
        }
}