<?php

namespace App\Http\Controllers;

use App\Models\Configuracion;
use Illuminate\Http\Request;

class ConfiguracionController extends Controller
{
    //
    public function index()
    {

        $jsonData = file_get_contents('http://divisas.test');
        $divisas = json_decode($jsonData, true);
        $configuracion = Configuracion::first();
        return view('admin.configuracion.index', compact('configuracion', 'divisas'));
    }

    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre'            => 'required',
            'descripcion'       => 'required',
            'direccion'         => 'required',
            'telefono'          => 'required|numeric',
            'divisa'            => 'required',
            'correo_electronico' => 'required|email',
            'logo'              => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);
         //buscar si existe la configuración
        $configuracion = Configuracion::first();
        if ($configuracion) {
            $configuracion->nombre = $request->nombre;
            $configuracion->descripcion = $request->descripcion;
            $configuracion->direccion = $request->direccion;
            $configuracion->telefono = $request->telefono;
            $configuracion->divisa = $request->divisa;
            $configuracion->correo_electronico = $request->correo_electronico;
            $configuracion->web = $request->web;

            if ($request->hasFile('logo')) {
                //eliminar logo anterior
                if ($configuracion->logo) {
                    unlink(public_path($configuracion->logo));
                }
                //nuevo logo
                $logoPath = $request->file('logo');
                $nombreArchivo = time().'_'.$logoPath->getClientOriginalName();
                $rutaDestino = public_path('uploads/logos');
                $logoPath->move($rutaDestino, $nombreArchivo);
                $configuracion->logo = 'uploads/logos/'.$nombreArchivo;

            }

            $configuracion->save();
            return redirect()->route('admin.configuracion.index')
                ->with('mensaje', 'Configuración actualizada correctamente')
                ->with('icono', 'success');
        }else{
            //crear nueva configuración
            $configuracion = new Configuracion();
            $configuracion->nombre = $request->nombre;
            $configuracion->descripcion = $request->descripcion;
            $configuracion->direccion = $request->direccion;
            $configuracion->telefono = $request->telefono;
            $configuracion->divisa = $request->divisa;
            $configuracion->correo_electronico = $request->correo_electronico;
            $configuracion->web = $request->web;

            if ($request->hasFile('logo')) {
                //nuevo logo
                $logoPath = $request->file('logo');
                $nombreArchivo = time().'_'.$logoPath->getClientOriginalName();
                $rutaDestino = public_path('uploads/logos');
                $logoPath->move($rutaDestino, $nombreArchivo);
                $configuracion->logo = 'uploads/logos/'.$nombreArchivo;
            }
            $configuracion->save();
            return redirect()->route('admin.configuracion.index')
                ->with('mensaje', 'Configuración creada correctamente')
                ->with('icono', 'success');
        }
    }
}
