<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seiva extends Model
{
    use HasFactory;

    protected $primarykey ='id';
    protected $table ='seivas';
    protected $fillable =[
        'nome',
        'descricao',
        'imagem',
        'planta_id'
    ];
}
