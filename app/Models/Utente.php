<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utente extends Model
{
    use HasFactory;
    protected $primarykey = 'id';
    protected $table = 'utentes';
    protected $fillable = [
        'nome',
        'nascimento',
        'bi',
        'genero',
        'telefone',
        'provincia',
        'endereco',
        'imagem'
    ];

}
