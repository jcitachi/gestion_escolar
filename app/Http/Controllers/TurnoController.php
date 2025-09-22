<?php

namespace App\Http\Controllers;

use App\Models\Turno;
use Illuminate\Http\Request;

class TurnoController extends Controller
{

    public function index()
    {
        //
        $turnos = Turno::all();
        return view('admin.turnos.index', compact('turnos'));
    }


    public function create()
    {
        //
        return view('admin.turnos.create');
    }


    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre' => 'required|string|max:50|unique:turnos,nombre',
        ]);
        $turno = new Turno();
        $turno->nombre = $request->nombre;
        $turno->save();
        return redirect()->route('admin.turnos.index')
            ->with('mensaje', 'Turno Registrado Exitosamente')
            ->with('icono', 'success');

    }


    public function edit($id)
    {
        //
        $turno = Turno::find($id);
        return view('admin.turnos.edit', compact('turno'));

    }


    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nombre' => 'required|string|max:50',
        ]);
        $turno = Turno::find($id);
        $turno->nombre = $request->nombre;
        $turno->save();
        return redirect()->route('admin.turnos.index')
            ->with('mensaje', 'Turno Actualizado Exitosamente')
            ->with('icono', 'success');
    }


    public function destroy($id)
    {
        //
        $turno = Turno::find($id);
        $turno->delete();
        return redirect()->route('admin.turnos.index')
            ->with('mensaje', 'Turno Eliminado exitosamente.')
            ->with('icono', 'success');
    }
}
