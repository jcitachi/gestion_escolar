<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $table = 'personals';

    protected $fillable = [
        'usuario_id',
        'tipo',
        'nombre',
        'apellido',
        'ci',
        'fecha_nacimiento',
        'direccion',
        'telefono',
        'profesion',
        'foto'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}
