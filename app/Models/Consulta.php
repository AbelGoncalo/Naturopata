<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    protected $primarykey ='id';
    protected $tables = 'consultas';

    protected $fillables = [
        'tipo_exame',
        'data_marcacao',
        'data_realizacao',
        'status',
        'medico_id',
        'utente_id'
    ];
}
