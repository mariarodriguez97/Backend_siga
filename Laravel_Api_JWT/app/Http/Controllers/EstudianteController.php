<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EstudianteController extends Controller
{
    public function registrar(Request $request)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'acudiente_id' => 'required|exists:acudientes,id',
            'curso_id' => 'required|exists:cursos,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Crear el estudiante
        $estudiante = Estudiante::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'acudiente_id' => $request->acudiente_id,
            'curso_id' => $request->curso_id,
        ]);

        return response()->json(['mensaje' => 'Estudiante registrado con éxito', 'estudiante' => $estudiante], 201);
    }

    public function index()
    {
        $estudiantes = Estudiante::all();
        $data = [
            'estudiantes' => $estudiantes,
            'status' => 200 
        ];
        return response()->json($data, 200);
    }

    public function updatePartial(Request $request, $id) {
        $estudiante = Estudiante::find($id);

        if (!$estudiante) {
            $data = [
                'mensaje' => 'Estudiante no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'nombre',
            'apellido',
            'acudiente_id',
            'curso_id',
        ]);

        if ($validator->fails()) {
            $data = [
                'mensaje' => 'Error al actualizar el estudiante',
                'error' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        if ($request->has('nombre')) {
            $estudiante->nombre = $request->nombre;
        }
        if ($request->has('apellido')) {
            $estudiante->apellido = $request->apellido;
        }
        if ($request->has('acudiente_id')) {
            $estudiante->acudiente_id = $request->acudiente_id;
        }
        if ($request->has('curso_id')) {
            $estudiante->curso_id = $request->curso_id;
        }

        $estudiante->save();

        $data = [
            'mensaje' => 'Estudiante actualizado con éxito',
            'estudiante' => $estudiante,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function update(Request $request, $id) {
        $estudiante = Estudiante::find($id);

        if (!$estudiante) {
            $data = [
                'mensaje' => 'Estudiante no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);

        }

        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'acudiente_id' => 'required|exists:acudientes,id',
            'curso_id' => 'required|exists:cursos,id',
        ]);

        if ($validator->fails()) {
            $data = [
                'mensaje' => 'Error al actualizar el estudiante',
                'error' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $estudiante->nombre = $request->nombre;
        $estudiante->apellido = $request->apellido;
        $estudiante->acudiente_id = $request->acudiente_id;
        $estudiante->curso_id = $request->curso_id;

        $estudiante->save();

        $data = [
            'mensaje' => 'Estudiante actualizado con éxito',
            'estudiante' => $estudiante,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function destroy($id) {
        $estudiante = Estudiante::find($id);

        if (!$estudiante) {
            $data = [
                'mensaje' => 'Estudiante no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $estudiante->delete();

        $data = [
            'mensaje' => 'Estudiante eliminado con exito',
            'status' => 200
        ];
        return response()->json($data, 200);
    }
}