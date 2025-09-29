<?php

namespace App\Http\Controllers;

use App\Models\Grado;
use App\Models\Nivel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GradoController extends Controller
{
<<<<<<< HEAD
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $niveles = Nivel::with('grados')->get();
=======

    public function index()
    {
        //
        $niveles = Nivel::with('grados')
            ->orderBy('nombre', 'asc')
            ->get();
>>>>>>> e641f83f14fd56ca9ba5dad13fb76a695f6d364c
        return view('admin.grados.index', compact('niveles'));
    }


<<<<<<< HEAD
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

=======


    public function store(Request $request)
    {
        //
        //$datos = request()->all();
        //return response()->json($datos);
        $request->validate([
            'niveles_id_create' => 'required|exists:nivels,id',
            'nombre_create' => 'required|string|max:255',
        ]);
        $grado = new Grado();
        $grado->nivel_id = $request->input('niveles_id_create');
        $grado->nombre = $request->input('nombre_create');
        $grado->save();
>>>>>>> e641f83f14fd56ca9ba5dad13fb76a695f6d364c
        return redirect()->route('admin.grados.index')
        ->with('mensaje', 'Grado creado exitosamente.')
        ->with('icono', 'success');
    }


<<<<<<< HEAD
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

=======

    public function update(Request $request, $id)
    {
        //
        //$datos = request()->all();
        //return response()->json($datos);
        $validate =Validator::make($request->all(), [
            'nivel_id' => 'required|exists:nivels,id',
            'nombre' => 'required|string|max:255',
        ]);
        if ($validate->fails()) {
            return redirect()
                ->back()
                ->withErrors($validate)
                ->withInput()
                ->with('modal_id', $id);
        }
        $grado = Grado::find($id);
        $grado->nivel_id = $request->input('nivel_id');
        $grado->nombre = $request->input('nombre');
        $grado->save();
        return redirect()->route('admin.grados.index')
        ->with('mensaje', 'Grado actualizado exitosamente.')
        ->with('icono', 'success');
>>>>>>> e641f83f14fd56ca9ba5dad13fb76a695f6d364c
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
