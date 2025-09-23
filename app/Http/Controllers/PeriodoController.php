<?php

namespace App\Http\Controllers;

use App\Models\Gestion;
use App\Models\Periodo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    public function update(Request $request,$id)
    {
        //
        //$datos = request()->all();
        //return response()->json($datos);
        $validate = Validator::make($request->all(), [
            'gestion_id' => 'required|exists:gestions,id',
            'nombre' => 'required|string|max:255',
        ]);
        if ($validate->fails()) {
            return redirect()
                ->back()
                ->withErrors($validate)
                ->withInput()
                ->with('modal_id', $id); // Pasar el ID del modal para reabrirlo
        }
        $periodo = Periodo::find($id);
        $periodo->gestion_id = $request->gestion_id;
        $periodo->nombre = $request->nombre;
        $periodo->save();
        return redirect()->route('admin.periodos.index')
            ->with('mensaje', 'Periodo Actualizado Exitosamente')
            ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $periodo = Periodo::find($id);
        $periodo->delete();

        return redirect()->route('admin.periodos.index')
            ->with('mensaje', 'Periodo Eliminado exitosamente.')
            ->with('icono', 'success');
    }
}
