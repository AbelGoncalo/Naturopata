<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Raiz extends Model
{
    use HasFactory;

    protected $primarykey = 'id';
    protected $table ='raizes';
    protected $fillable =[
        'nome',
        'descricao',
        'planta_id',
        'imagem'
    ];
}
