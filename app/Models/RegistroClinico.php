<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroClinico extends Model
{
    use HasFactory;

    protected $primarykey = 'id';
    protected $table = 'registro_clinicos';

    protected $fillable = [
        'grupo_sanguino',
        'alergias',
        'historico_saude',
        'utente_id'
    ];
}
