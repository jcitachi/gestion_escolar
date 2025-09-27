<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    public function index()
    {
        //
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }


    public function create()
    {
        //
        return view('admin.roles.create');
    }


    public function store(Request $request)
    {
        //
        //$datos = request()->all();
        //return response()->json($datos);
        $request->validate([
            'name' => 'required|unique:roles,name',
        ]);
        $rol = new Role();
        $rol->name = $request->name;
        $rol->guard_name = 'web';
        $rol->save();
        return redirect()->route('admin.roles.index')
        ->with('mensaje', 'El rol se creó con éxito')
        ->with('icono', 'success');
    }


        public function edit($id)
    {
        //
        $rol = Role::findOrFail($id);
        return view('admin.roles.edit', compact('rol'));
    }


    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'name' => "required|max:255|unique:roles,name,".$id,
        ]);
        $rol = Role::findOrFail($id);
        $rol->name = $request->name;
        $rol->guard_name = 'web';
        $rol->save();
        return redirect()->route('admin.roles.index')
        ->with('mensaje', 'El rol se actualizó con éxito')
        ->with('icono', 'success');
    }


    public function destroy(string $id)
    {
        //
        $rol = Role::findOrFail($id);
        $rol->delete();
        return redirect()->route('admin.roles.index')
        ->with('mensaje', 'El rol se eliminó con éxito')
        ->with('icono', 'success');
    }
}
