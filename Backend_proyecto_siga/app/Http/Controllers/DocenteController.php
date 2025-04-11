<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use App\Models\Usuario;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    // Obtener todos los docentes con su usuario
    public function index()
    {
        $docentes = Docente::with('usuario')->get();
        return response()->json($docentes);
    }

    // Guardar un nuevo docente
    public function store(Request $request)
    {
        $request->validate([
            'usuario_id' => 'required|exists:usuarios,id|unique:docentes,usuario_id',
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
        ]);

        $docente = Docente::create($request->all());
        return response()->json($docente, 201);
    }

    // Mostrar un docente específico
    public function show($id)
    {
        $docente = Docente::with('usuario')->findOrFail($id);
        return response()->json($docente);
    }

    // Actualizar un docente
    public function update(Request $request, $id)
    {
        $docente = Docente::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
        ]);

        $docente->update([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
        ]);

        return response()->json($docente);
    }

    // Eliminar un docente
    public function destroy($id)
    {
        $docente = Docente::findOrFail($id);
        $docente->delete();

        return response()->json(['mensaje' => 'Docente eliminado']);
    }

    // Obtener los usuarios que no tienen docente asignado
    public function usuariosDisponibles()
    {
        $usuariosAsignados = Docente::pluck('usuario_id');
        $usuariosDisponibles = Usuario::whereNotIn('id', $usuariosAsignados)->get();

        return response()->json($usuariosDisponibles);
    }
}
