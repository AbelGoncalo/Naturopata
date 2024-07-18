<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoricoClinico extends Model
{
    use HasFactory;

    protected $primarykey = 'id';
    protected $table = 'historico_clinicos';
    protected $fillable = [
        'exame_efetuado',
        'diagnostico',
        'resultado',
        'procedimento',
        'terapeuta',
        'medico_id',
        'utente_id'
    ];
}
