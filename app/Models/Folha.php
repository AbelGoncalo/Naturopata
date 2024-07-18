<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folha extends Model
{
    use HasFactory;
    protected $primarykey ='id';
    protected $table = 'folhas';
    protected $fillable =[
        'nome',
        'tipo',
        'descricao',
        'planta_id',
        'imagem'
    ];
}
