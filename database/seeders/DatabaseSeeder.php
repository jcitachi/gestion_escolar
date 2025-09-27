<?php

namespace Database\Seeders;

use App\Models\Configuracion;
use App\Models\Nivel;
use App\Models\Grado;
use App\Models\Paralelo;
use App\Models\Gestion;
use App\Models\Periodo;
use App\Models\Turno;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Juan Carlos',
            'email' => 'admin@admin.com',
        ]);

        Configuracion::create([
            'nombre' => 'I.E N°-0773-Barranquita',
            'descripcion' => 'Colegio Público Secundariaria',
            'direccion' => 'Psj. Jesús Salazar Urra',
            'telefono' => '985463254',
            'divisa' => 'S/.',
            'correo_electronico' => 'vitu@mailinator.com',
            'web' => 'https://solucionestecnologicas.com',
            'logo' => 'uploads/logos/1759007130_insignia-0773.jpg',
        ]);

        Gestion::create(['nombre' => '2022']);
        Gestion::create(['nombre' => '2023']);
        Gestion::create(['nombre' => '2024']);
        Gestion::create(['nombre' => '2025']);

        Periodo::create(['nombre' => 'I Trimestre', 'gestion_id' => 1]);
        Periodo::create(['nombre' => 'II Trimestre', 'gestion_id' => 1]);
        Periodo::create(['nombre' => 'III Trimestre', 'gestion_id' => 1]);

        Periodo::create(['nombre' => 'I Trimestre', 'gestion_id' => 2]);
        Periodo::create(['nombre' => 'II Trimestre', 'gestion_id' => 2]);
        Periodo::create(['nombre' => 'III Trimestre', 'gestion_id' => 2]);

        Periodo::create(['nombre' => 'I Trimestre', 'gestion_id' => 3]);
        Periodo::create(['nombre' => 'II Trimestre', 'gestion_id' => 3]);
        Periodo::create(['nombre' => 'III Trimestre', 'gestion_id' => 3]);

        Nivel::create(['nombre' => 'Inicial']);
        Nivel::create(['nombre' => 'Primaria']);
        Nivel::create(['nombre' => 'Secundaria']);

        Grado::create(['nombre' => '3-años', 'nivel_id' => 1]);
        Grado::create(['nombre' => '4-años', 'nivel_id' => 1]);
        Grado::create(['nombre' => '5-años', 'nivel_id' => 1]);

        Grado::create(['nombre' => '1er Grado - Primaria', 'nivel_id' => 2]);
        Grado::create(['nombre' => '2do Grado - Primaria', 'nivel_id' => 2]);
        Grado::create(['nombre' => '3er Grado - Primaria', 'nivel_id' => 2]);

        Grado::create(['nombre' => '1er Grado - Secundaria', 'nivel_id' => 3]);
        Grado::create(['nombre' => '2do Grado - Secundaria', 'nivel_id' => 3]);
        Grado::create(['nombre' => '3er Grado - Secundaria', 'nivel_id' => 3]);

        Paralelo::create(['nombre' => 'Los Triunfadores', 'grado_id' => 1]);
        Paralelo::create(['nombre' => 'Los Campeones', 'grado_id' => 2]);
        Paralelo::create(['nombre' => 'Los Genios', 'grado_id' => 3]);

        Paralelo::create(['nombre' => 'A', 'grado_id' => 4]);
        Paralelo::create(['nombre' => 'B', 'grado_id' => 5]);
        Paralelo::create(['nombre' => 'C', 'grado_id' => 6]);

        Paralelo::create(['nombre' => 'A', 'grado_id' => 7]);
        Paralelo::create(['nombre' => 'B', 'grado_id' => 8]);
        Paralelo::create(['nombre' => 'C', 'grado_id' => 9]);

        Turno::create(['nombre' => 'Mañana']);
        Turno::create(['nombre' => 'Tarde']);
        Turno::create(['nombre' => 'Noche']);
    }
}
