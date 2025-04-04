<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Usuario;
use App\Http\Controllers\baseController as Controller;
use Illuminate\Support\Facades\Hash;


class usuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();

        $data = [
            'usuarios' => $usuarios,
            'status' => 200
        ];

        return response()->json($data, 200);
    }    

    // public function store(Request $request)
    // {
    //     // Definir reglas base
    //     $rules = [
    //         'id_rol' => 'required|integer|exists:roles,id',
    //         'estado' => 'required|integer',
    //     ];

    //     // Si id_rol es 1 o 2, correo y contraseña son obligatorios
    //     if (in_array($request->id_rol, [1, 2])) {
    //         $rules['correo'] = 'required|email|unique:usuarios,correo';
    //         $rules['contraseña'] = 'required|min:6';
    //     }

    //     // Validar la petición
    //     $validatedData = $request->validate($rules, [
    //         'correo.required' => 'El correo es obligatorio cuando el rol es 1 o 2.',
    //         'correo.email' => 'Debe ingresar un correo válido.',
    //         'correo.unique' => 'El correo ya está registrado.',
    //         'contraseña.required' => 'La contraseña es obligatoria cuando el rol es 1 o 2.',
    //         'contraseña.min' => 'La contraseña debe tener al menos 6 caracteres.',
    //     ]);

    //     // Crear el usuario
    //     $usuario = Usuario::create([
    //         'id_rol' => $validatedData['id_rol'],
    //         'estado' => $validatedData['estado'],
    //         'correo' => $validatedData['correo'] ?? null,  // Puede ser nulo si no es rol 1 o 2
    //         'contraseña' => isset($validatedData['contraseña']) ? Hash::make($validatedData['contraseña']) : null,
    //     ]);

    //     return response()->json($usuario, 201);
    // }

    // public function almacenar(Request $request){
    //     $validator= Validator::make($request->all(),[
    //         'id_rol' => 'required',
    //     ]);

    //     if ($validator->fails()) {
    //         return $this->sendError('Error de validacion', $validator->errors());
    //     }

    //     if('id_rol' == 1 || 'id_rol' == 2){
    //         $validator= Validator::make($request->all(),[
    //             'correo' => 'required',
    //             'contraseña' => 'required',
    //         ]);
    //         $usuario= Usuario::create([
    //             'id_rol' => $request->id_rol,
    //             'estado' => '1',
    //             'correo' => $request->correo,
    //             'contraseña' => Hash::make($request->contraseña),
    //         ]);
    //     }else{
    //         $usuario= Usuario::create([
    //             'id_rol' => $request->id_rol,
    //             'estado' => '1',
    //             'correo' => null,
    //             'contraseña' => null,
    //         ]);
    //     }

    //     if(!usuario){
    //         $data=[
    //             'message' => 'Error al crear el usuario',
    //             'status' => 500,
    //         ];
    //         return response()->json($data, 500);
    //     }
    // }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_rol' => 'required|integer|exists:roles,id',
            'estado' => 'required|integer',
            'correo' => 'nullable|email|unique:usuarios,correo',
            'contraseña' => 'nullable|min:6',
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error de validación',
                'status' => 400,
                'errors' => $validator->errors()
            ];
            return response()->json($data, 400);
        }

        $usuario = Usuario::create([
            'id_rol' => $request->id_rol,
            'estado' => $request->estado,
            'correo' => $request->correo,
            'contraseña' => Hash::make($request->contraseña),
        ]);

        if (!$usuario) {
            $data = [
                'message' => 'Error al crear el usuario',
                'status' => 500,
            ];
            return response()->json($data, 500);
        }
        $data = [
            'message' => 'Usuario creado correctamente',
            'usuario' => $usuario,
            'status' => 201
        ];
        return response()->json($usuario, 201);
    }

}