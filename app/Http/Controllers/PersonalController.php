<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use App\Models\User;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($tipo)
    {
        //

        $personals = Personal::where('tipo', $tipo)->get();
        return view('admin.personal.index', compact('personals', 'tipo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($tipo)
    {
        //
        $roles = Role::all();
        return view('admin.personal.create', compact('tipo', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //$data = request()->all();
        //return response()->json($data);
        $data = $request->validate([
            'rol' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'ci' => 'required|unique:personals',
            'fecha_nacimiento' => 'required',
            'telefono' => 'nullable',
            'profesion' => 'nullable',
            'email' => 'required|email|unique:users',
            'direccion' => 'required',
            'foto' => 'required',
            'tipo' => 'required',
        ]);

        $usuario = new User();
        $usuario->name = $request->apellido . ' ' . $request->nombre;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->ci);
        $usuario->save();

        $usuario->assignRole($request->rol);

        $personal = new Personal();
        $personal->usuario_id = $usuario->id;
        $personal->tipo = $request->tipo;
        $personal->nombre = $request->nombre;
        $personal->apellido = $request->apellido;
        $personal->ci = $request->ci;
        $personal->fecha_nacimiento = $request->fecha_nacimiento;
        $personal->telefono = $request->telefono;
        $personal->profesion = $request->profesion;
        $personal->direccion = $request->direccion;


        $fotoPath = $request->file('foto');
        $nombreArchivo = time() . '_' . $fotoPath->getClientOriginalName();
        $rutaDestino = public_path('uploads/fotos');
        $fotoPath->move($rutaDestino, $nombreArchivo);
        $personal->foto = 'uploads/fotos/' . $nombreArchivo;

        $personal->save();
        return redirect()->route('admin.personal.index', $request->tipo)
            ->with('mensaje', 'El personal ' . $request->tipo . ' se creó con éxito')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $personal = Personal::with('usuario.roles')->findOrFail($id);
        //$personal = Personal::findOrFail($id);
        return view('admin.personal.show', compact('personal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $personal = Personal::findOrFail($id);
        $roles = Role::all();
        return view('admin.personal.edit', compact('personal', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // 1️⃣ Obtenemos primero el personal
        $personal = Personal::findOrFail($id);
        // 2️⃣ Luego su usuario relacionado
        $usuario = User::findOrFail($personal->usuario_id);


        //dd($request->all());
        //$datos = request()->all();
        //return response()->json($datos);
        $data = $request->validate([
            'rol' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'ci' => 'required|unique:personals,ci,' . $id,
            'fecha_nacimiento' => 'required',
            'telefono' => 'required',
            'profesion' => 'required',
            'email' => 'required|email|unique:users,email,' . $usuario->id,
            'direccion' => 'required',
        ]);

        $usuario->name = $request->apellido . ' ' . $request->nombre;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->ci);
        $usuario->save();

        $usuario->syncRoles($request->rol);

        //$personal = Personal::findOrFail($id);
        $personal->nombre = $request->nombre;
        $personal->apellido = $request->apellido;
        $personal->ci = $request->ci;
        $personal->fecha_nacimiento = $request->fecha_nacimiento;
        $personal->direccion = $request->direccion;
        $personal->telefono = $request->telefono;
        $personal->profesion = $request->profesion;

        if ($request->hasFile('foto')) {

            if ($personal->foto && file_exists(public_path($personal->foto))) {
                unlink(public_path($personal->foto));
            }

            $fotoPath = $request->file('foto');
            $nombreArchivo = time() . '_' . $fotoPath->getClientOriginalName();
            $rutaDestino = public_path('uploads/fotos');
            $fotoPath->move($rutaDestino, $nombreArchivo);
            $personal->foto = 'uploads/fotos/' . $nombreArchivo;
        }

        $personal->save();
        return redirect()->route('admin.personal.index', $personal->tipo)
            ->with('mensaje', 'El personal ' . $personal->tipo . ' se actualizó con éxito')
            ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $personal = Personal::findOrFail($id);
        $tipo = $personal->tipo;

        $usuario = User::findOrFail($personal->usuario_id);

        if ($personal->foto && file_exists(public_path($personal->foto))) {
            unlink(public_path($personal->foto));
        }

        $usuario->delete();
        $personal->delete();


        return redirect()->route('admin.personal.index', $tipo)
            ->with('mensaje', 'El personal ' . $tipo . ' se eliminó con éxito')
            ->with('icono', 'success');
    }
}
