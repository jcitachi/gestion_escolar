<?php

namespace App\Http\Controllers;

use App\Models\Gestion;
use App\Models\Periodo;
use Illuminate\Http\Request;

class PeriodoController extends Controller
{

    public function index()
    {
        //
        $gestiones = Gestion::with('periodos')
        ->orderBy('nombre', 'asc')
        ->get();
        return view('admin.periodos.index', compact('gestiones'));
    }

    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre_create' => 'required|string|max:50',
            'gestion_create' => 'required|exists:gestions,id',
        ]);

        $periodo = new Periodo();
        $periodo->nombre = $request->nombre_create;
        $periodo->gestion_id = $request->gestion_create;
        $periodo->save();
        return redirect()->route('admin.periodos.index')
            ->with('mensaje', 'Periodo Registrado Exitosamente')
            ->with('icono', 'success');

    }

    public function update(Request $request, Periodo $periodo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Periodo $periodo)
    {
        //
    }
}
