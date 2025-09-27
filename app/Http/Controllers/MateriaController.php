<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;

class MateriaController extends Controller
{

    public function index()
    {
        //
        $materias = Materia::all();
        return view('admin.materias.index', compact('materias'));
    }


    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre_create' => 'required|string|max:255',
        ]);
        $materia = new Materia();
        $materia->nombre = $request->nombre_create;
        $materia->save();
        return redirect()->route('admin.materias.index')
        ->with('mensaje', 'Materia registrada Exitosamente')
        ->with('icono', 'success');
    }


    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);
        $materia = Materia::find($id);
        $materia->nombre = $request->nombre;
        $materia->save();
        return redirect()->route('admin.materias.index')
        ->with('mensaje', 'Materia actualizada Exitosamente')
        ->with('icono', 'success');

    }


    public function destroy($id)
    {
        //
        $materia = Materia::find($id);
        $materia->delete();
        return redirect()->route('admin.materias.index')
        ->with('mensaje', 'Materia eliminada Exitosamente')
        ->with('icono', 'success');

    }
}
