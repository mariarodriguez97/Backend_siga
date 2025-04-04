<?php

namespace App\Http\Controllers;

use App\Models\Acudiente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AcudienteController extends Controller
{
    public function registrar(Request $request)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'correo' => 'required|email|unique:acudientes,correo',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Crear el acudiente
        $acudiente = Acudiente::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'correo' => $request->correo,
        ]);

        return response()->json(['mensaje' => 'Acudiente registrado con éxito', 'acudiente' => $acudiente], 201);
    }

    public function index() {
        $acudientes = Acudiente::all();
        
        $data = [
            'acudientes' => $acudientes,
            'status' => 200
        ];
        
        return response()->json($data,200);
    }

    public function update(Request $request, $id) {
        $acudiente = Acudiente::find($id);

        if (!$acudiente) {
            $data = [
                'mensaje' => 'Acudiente no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'correo' => 'required|email|unique:acudientes,correo,' . $acudiente->id,
        ]);

        if ($validator->fails()) {
            $data = [
                'mensaje' => 'Error al actualizar el acudiente',
                'error' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $acudiente->nombre = $request->nombre;
        $acudiente->apellido = $request->apellido;
        $acudiente->correo = $request->correo;
        $acudiente->save();

        $data = [
            'mensaje' => 'Acudiente actualizado con exito',
            'acudiente' => $acudiente,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function updatePartial(Request $request, $id) {
        $acudiente = Acudiente::find($id);

        if (!$acudiente) {
            $data = [
                'mensaje' => 'Acudiente no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'nombre' => 'string',
            'apellido' => 'string',
            'correo' => 'email',
        ]);

        if ($validator->fails()) {
            $data = [
                'mensaje' => 'Error al actualizar el acudiente',
                'error' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        if ($request->has('nombre')) {
            $acudiente->nombre = $request->nombre;
        }

        if ($request->has('apellido')) {
            $acudiente->apellido = $request->apellido;
        }

        if ($request->has('correo')) {
            $acudiente->correo = $request->correo;
        }

        $acudiente->save();

        $data = [
            'mensaje' => 'Acudiente actualizado con exito',
            'acudiente' => $acudiente,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function destroy($id) {
        $acudiente = Acudiente::find($id);

        if (!$acudiente) {
            $data = [
                'mensaje' => 'Acudiente no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $acudiente->delete();

        $data = [
            'mensaje' => 'Acudiente eliminado con exito',
            'status' => 200
        ];
        return response()->json($data, 200);
    }
}