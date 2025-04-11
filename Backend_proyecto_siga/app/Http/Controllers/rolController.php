<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RolController extends Controller
{
    public function registrar(Request $request)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|unique:roles,nombre',
            'permisos' => 'nullable|array', // Permisos opcionales que debemos investigar como carajo se llenan.
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Crear el rol
        $rol = Rol::create([
            'nombre' => $request->nombre,
            'permisos' => $request->permisos, // Para almacenar los permisos
        ]);

        return response()->json(['mensaje' => 'Rol registrado con éxito', 'rol' => $rol], 201);
    }
    
    public function index() {
        $roles = Rol::all();

        $data = [
            'roles' => $roles,
            'status' => 200
        ];

        return response()->json($data,200);
}
    public function update(Request $request, $id) {
        $rol = Rol::find($id);

        if (!$rol) {
            $data = [
                'mensaje' => 'Rol no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|unique:roles,nombre,' . $rol->id,
            'permisos' => 'nullable|array',
        ]);

        if ($validator->fails()) {
            
            $data = [
                'mensaje' => 'Error al actualizar el rol',
                'error' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $rol->nombre = $request->nombre;
        $rol->permisos = $request->permisos;
        $rol->save();

        $data = [
            'mensaje' => 'Rol actualizado con exito',
            'rol' => $rol,
            'status' => 200
        ];
        return response()->json($data, 200);
}
    public function updatePartial(Request $request, $id) {
        $rol = Rol::find($id);

        if (!$rol) {
            $data = [
                'mensaje' => 'Rol no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'nombre' => 'string',
            'permisos' => 'array',
        ]);

        if ($validator->fails()) {
            $data = [
                'mensaje' => 'Error al actualizar el rol',
                'error' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        if ($request->has('nombre')) {
            $rol->nombre = $request->nombre;
        }

        if ($request->has('permisos')) {
            $rol->permisos = $request->permisos;    
        }

        $rol->save();

        $data = [
            'mensaje' => 'Rol actualizado con exito',
            'rol' => $rol,
            'status' => 200
        ];
        return response()->json($data, 200);
    }
    public function destroy($id) {
        $rol = Rol::find($id);

        if (!$rol) {
            $data = [
                'mensaje' => 'Rol no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $rol->delete();

        $data = [
            'mensaje' => 'Rol eliminado con exito',
            'status' => 200
        ];
        return response()->json($data, 200);
    }
}