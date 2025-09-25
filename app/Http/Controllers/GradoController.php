<?php

namespace App\Http\Controllers;

use App\Models\Grado;
use App\Models\Nivel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GradoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $niveles = Nivel::with('grados')->get();
        return view('admin.grados.index', compact('niveles'));
    }


    public function store(Request $request)
    {
        //
        //$datos = $request->all();
        //return response()->json($datos);
        $request->validate([
            'nombre_create' => 'required|string|max:50|',
            'nivel_id_create' => 'required|exists:nivels,id',
        ]);

        $grado = new Grado();
        $grado->nombre = $request->input('nombre_create');
        $grado->nivel_id = $request->input('nivel_id_create');
        $grado->save();

        return redirect()->route('admin.grados.index')
        ->with('mensaje', 'Grado creado exitosamente.')
        ->with('icono', 'success');
    }


    public function update(Request $request, $id)
    {
        //
        //$datos = $request->all();
        //return response()->json($datos);
        $validate = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'nivel_id' => 'required|exists:nivels,id',
        ]);

        if ($validate->fails()){
            return redirect()
            ->back()
            ->withErrors($validate)
            ->withInput()
            ->with('modal_id', $id);
        }

        $grado = Grado::find($id);
        $grado->nombre = $request->input('nombre');
        $grado->nivel_id = $request->input('nivel_id');
        $grado->save();

        return redirect()->route('admin.grados.index')
        ->with('mensaje', 'Grado actualizado exitosamente.')
        ->with('icono', 'success');

    }


    public function destroy($id)
    {
        //
        $grado = Grado::find($id);
        $grado->delete();
        return redirect()->route('admin.grados.index')
        ->with('mensaje', 'Grado eliminado exitosamente.')
        ->with('icono', 'success');
    }
}
