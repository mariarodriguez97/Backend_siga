<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CursoController extends Controller
{
    public function registrar(Request $request)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|unique:cursos,nombre',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Crear el curso
        $curso = Curso::create([
            'nombre' => $request->nombre,
        ]);

        return response()->json(['mensaje' => 'Curso registrado con éxito', 'curso' => $curso], 201);
    }

    public function index() {
        $cursos = Curso::all();
        
        $data = [
            'cursos' => $cursos,
            'status' => 200
        ];
        
        return response()->json($data,200);
    }
    public function update(Request $request, $id) {
        $curso = Curso::find($id);
    
        if (!$curso) {
            $data = [
                'mensaje' => 'Curso no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
    
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|unique:cursos,nombre,' . $curso->id,
        ]);
    
        if ($validator->fails()) {
            $data = [
                'mensaje' => 'Error al actualizar el curso',
                'error' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }
    
        $curso->nombre = $request->nombre;
        $curso->save();
    
        $data = [
            'mensaje' => 'Curso actualizado con exito',
            'curso' => $curso,
            'status' => 200
        ];
        return response()->json($data, 200);
    }
    
    public function updatePartial(Request $request, $id) {
        $curso = Curso::find($id);
    
        if (!$curso) {
            $data = [
                'mensaje' => 'Curso no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
    
        $validator = Validator::make($request->all(), [
            'nombre' => 'string',
        ]);
    
        if ($validator->fails()) {
            $data = [
                'mensaje' => 'Error al actualizar el curso',
                'error' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }
    
        if ($request->has('nombre')) {
            $curso->nombre = $request->nombre;
        }
    
        $curso->save();
    
        $data = [
            'mensaje' => 'Curso actualizado con exito',
            'curso' => $curso,
            'status' => 200
        ];
        return response()->json($data, 200);
    }
    
    public function destroy($id) {
        $curso = Curso::find($id);
    
        if (!$curso) {
            $data = [
                'mensaje' => 'Curso no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
    
        $curso->delete();
    
        $data = [
            'mensaje' => 'Curso eliminado con exito',
            'status' => 200
        ];
        return response()->json($data, 200);
    }   
}