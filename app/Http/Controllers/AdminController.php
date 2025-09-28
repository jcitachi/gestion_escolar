<?php

namespace App\Http\Controllers;

use App\Models\Gestion;
use App\Models\Grado;
use App\Models\Nivel;
use App\Models\Paralelo;
use App\Models\Periodo;
use App\Models\Turno;
use App\Models\Materia;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {
        $total_gestiones = Gestion::count(); // Aquí deberías obtener el total de gestiones desde la base de datos
        $total_periodos = Periodo::count(); // Aquí deberías obtener el total de periodos desde la base de datos
        $total_niveles = Nivel::count(); // Aquí deberías obtener el total de niveles desde la base de datos
        $total_grados = Grado::count(); // Aquí deberías obtener el total de grados desde la base de datos
        $total_turnos = Turno::count(); //
        $total_paralelos = Paralelo::count(); // Aquí deberías obtener el total de turnos desde la base de datos
        $total_materias = Materia::count(); // Aquí deberías obtener el total de materias desde la base de datos
        $total_roles = Role::count(); // Aquí deberías obtener el total de roles desde la base de datos
        return view(
            'admin.index',
            compact(
                'total_gestiones',
                'total_periodos',
                'total_niveles',
                'total_grados',
                'total_turnos',
                'total_turnos',
                'total_paralelos',
                'total_materias',
                'total_roles'
            )
        );
    }
}
