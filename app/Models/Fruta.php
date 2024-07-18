<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fruta extends Model
{
    use HasFactory;

    protected $primarykey ='id';
    protected $table = 'frutas';
    protected $fillable =[
        'nome',
        'tipo',
        'descricao',
        'planta_id',
        'imagem'
    ];
}
