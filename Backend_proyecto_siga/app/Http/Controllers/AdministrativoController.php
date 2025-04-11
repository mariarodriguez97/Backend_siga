<?php

namespace App\Http\Controllers;

use App\Models\Administrativo;
use App\Models\Usuario;
use Illuminate\Http\Request;

class AdministrativoController extends Controller
{
    public function index()
    {
        $administrativos = Administrativo::with('usuario')->get();
        return response()->json($administrativos);
    }

    public function store(Request $request)
    {
        $request->validate([
            'usuario_id' => 'required|exists:usuarios,id',
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
        ]);

        $usuario = Usuario::find($request->usuario_id);
        if ($usuario->rol_id !== 1) {
            return response()->json(['error' => 'Este usuario no es de tipo administrativo.'], 400);
        }

        $administrativo = Administrativo::create($request->all());

        return response()->json($administrativo, 201);
    }

    public function update(Request $request, $id)
    {
        $administrativo = Administrativo::find($id);
        if (!$administrativo) {
            return response()->json(['error' => 'Administrativo no encontrado'], 404);
        }

        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
        ]);

        $administrativo->update($request->only('nombre', 'apellido'));

        return response()->json($administrativo);
    }

    public function destroy($id)
    {
        $administrativo = Administrativo::find($id);
        if (!$administrativo) {
            return response()->json(['error' => 'Administrativo no encontrado'], 404);
        }

        $administrativo->delete();
        return response()->json(['mensaje' => 'Administrativo eliminado con éxito']);
    }

    public function usuariosDisponibles()
    {
        $usuarios = Usuario::where('rol_id', 1)
            ->whereNotIn('id', Administrativo::pluck('usuario_id'))
            ->get();

        return response()->json($usuarios);
    }
}
