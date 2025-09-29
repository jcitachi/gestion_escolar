<?php

namespace App\Http\Controllers;

use App\Models\Grado;
use App\Models\Paralelo;
use Illuminate\Http\Request;

class ParaleloController extends Controller
{

    public function index()
    {
        //
        $grados = Grado::with('paralelos')
            ->orderBy('nombre', 'asc')
            ->get();
        return view('admin.paralelos.index', compact('grados'));
    }


    public function store(Request $request)
    {
        //
        //$data = request()->all();
        //return response()->json($data);
        $request->validate([
            'nombre_create' => 'required|string|max:255',
            'grado_id_create' => 'required|exists:grados,id',
        ]);

        $paralelo = new Paralelo();
        $paralelo->nombre = $request->nombre_create;
        $paralelo->grado_id = $request->grado_id_create;
        $paralelo->save();
        return redirect()->route('admin.paralelos.index')
        ->with('mensaje', 'Paralelo creado exitosamente')
        ->with('icono', 'success');

    }


    public function update(Request $request, $id)
    {
        //
        $validate = Validator($request->all(), [
            'nombre' => 'required|string|max:255',
            'grado_id' => 'required|exists:grados,id',
        ]);
        if ($validate->fails()) {
            return redirect()->back()
                ->withErrors($validate)
                ->withInput()
                ->with('modal_id', $id);
        }

        $paralelo = Paralelo::find($id);
        $paralelo->nombre = $request->nombre;
        $paralelo->grado_id = $request->grado_id;
        $paralelo->save();
        return redirect()->route('admin.paralelos.index')
        ->with('mensaje', 'Paralelo actualizado exitosamente')
        ->with('icono', 'success');
    }


    public function destroy($id)
    {
        //
        $paralelo = Paralelo::find($id);
        $paralelo->delete();
        return redirect()->route('admin.paralelos.index')
        ->with('mensaje', 'Paralelo eliminado exitosamente')
        ->with('icono', 'success');
    }
}
