<?php

namespace App\Http\Controllers;

use App\Models\Nivel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NivelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $niveles = Nivel::all();
        return view('admin.niveles.index', compact('niveles'));
    }


    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre_create' => 'required|unique:nivels,nombre',
        ]);
        $nivel = new Nivel();
        $nivel->nombre = $request->nombre_create;
        $nivel->save();
        return redirect()->route('admin.niveles.index')
            ->with('mensaje', 'Nivel Registrado exitosamente.')
            ->with('icono', 'success');
    }

    public function update(Request $request, $id)
    {
        //
        $validate = Validator::make($request->all(), [
            'nombre' => 'required|unique:nivels,nombre,' . $id,
        ]);
        if ($validate->fails()) {
            return redirect()->back()
                ->withErrors($validate)
                ->withInput()
                ->with('modal_id', $id); // Pasar el ID del modal para reabrirlo
        }


        $nivel = Nivel::find($id);
        $nivel->nombre = $request->nombre;
        $nivel->save();

        return redirect()->route('admin.niveles.index')
            ->with('mensaje', 'Nivel Actualizado exitosamente.')
            ->with('icono', 'success');
    }

    public function destroy($id)
    {
        //
        $nivel = Nivel::find($id);
        $nivel->delete();
        return redirect()->route('admin.niveles.index')
            ->with('mensaje', 'Nivel Eliminado exitosamente.')
            ->with('icono', 'success');
    }
}
