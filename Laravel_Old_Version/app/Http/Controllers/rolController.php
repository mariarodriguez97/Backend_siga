<?php

namespace App\Http\Controllers;

use App\Http\Controllers\baseController as Controller;
use Validator;
use App\Models\Rol;
use Illuminate\Http\Request;

class rolController extends Controller
{
    public function index()
    {
        $roles= Rol::all();
        $data= [
            'roles' => $roles,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre_rol' => 'required|string|max:255',
            'permisos' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return $this->sendError('error de validacion', $validator->errors());
        }

        $rol = Rol::create([
            'nombre_rol' => $request->nombre_rol,
            'permisos' => $request->permisos,
        ]);

        return response()->json($rol, 201);
    }

    public function update(Request $request, $id){
        $rol = Rol::find($id);  

        if (!$rol) {
            $data = [
                'message' => 'Rol no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
    }
        $validator = Validator::make($request->all(), [
        'nombre_rol' => 'required|string|max:255',
        'permisos' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
        $data = [
            'message' => 'error de validacion',
            'status' => 400,
            'errors' => $validator->errors()
        ];
        return response()->json($data, 400);
    }
        $rol->nombre_rol = $request->nombre_rol;
        $rol->permisos = $request->permisos;
        $rol->save();
        $data = [
        'message' => 'Rol actualizado correctamente',
        'rol' => $rol,
        'status' => 200
    ];
    return response()->json($data, 200);
    }

    public function updatePartial (Request $request, $id){
        $rol = Rol::find($id);

        if (!$rol) {
            $data = [
                'message' => 'Rol no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'nombre_rol' => 'string|max:255',
            'permisos' => 'string|max:255',
        ]);
        if ($validator->fails()) {
            $data = [
                'message' => 'error de validacion',
                'status' => 400,
                'errors' => $validator->errors()
            ];
            return response()->json($data, 400);
        }
        if ($request->has('nombre_rol')) {
            $rol->nombre_rol = $request->nombre_rol;
        }
        if ($request->has('permisos')) {
            $rol->permisos = $request->permisos;
        }

        $rol->save();

        $data = [
            'message' => 'Rol actualizado correctamente',
            'rol' => $rol,
            'status' => 200
        ];
        return response()->json($data, 200);
}

    public function destroy($id)
    {
        $rol = Rol::find($id);

        if (!$rol) {
            $data = [
                'message' => 'Rol no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $rol->delete();

        $data = [
            'message' => 'Rol eliminado correctamente',
            'status' => 200
        ];
        return response()->json($data, 200);
    }
}