<?php

namespace App\Http\Controllers;

use App\Models\Gestion;
use Illuminate\Http\Request;

class GestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $gestiones = Gestion::all();
        return view('admin.gestiones.index', compact('gestiones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.gestiones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre' => 'required|unique:gestions,nombre',
        ]);
        $gestion = new Gestion();
        $gestion->nombre = $request->nombre;
        $gestion->save();
        return redirect()->route('admin.gestiones.index')
            ->with('mensaje', 'Gestión Registrada exitosamente.')
            ->with('icono', 'success');
    }


    public function edit($id)
    {
        //
        $gestion = Gestion::find($id);
        return view('admin.gestiones.edit', compact('gestion'));
    }


    public function update(Request $request, $id)
    {


        $request->validate([
            'nombre' => 'required|unique:gestions,nombre,' . $id,
        ]);
        $gestion = Gestion::find($id);
        $gestion->nombre = $request->nombre;
        $gestion->save();
        return redirect()->route('admin.gestiones.index')
            ->with('mensaje', 'Gestión Actualizada exitosamente.')
            ->with('icono', 'success');

    }

    public function destroy($id)
    {
        //
        $gestion = Gestion::find($id);
        $gestion->delete();
        return redirect()->route('admin.gestiones.index')
            ->with('mensaje', 'Gestión Eliminada exitosamente.')
            ->with('icono', 'success');
    }
}
