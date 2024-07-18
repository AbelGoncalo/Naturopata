<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;

    protected $primarykey = 'id';
    protected $table = 'medicos';
    protected $filaable =[
        'nome',
        'nascimento',
        'bi',
        'genero',
        'telefone',
        'pais',
        'provincia',
        'morada',
        'imagem'   
    ];
}
