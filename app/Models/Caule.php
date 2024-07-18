<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caule extends Model
{
    use HasFactory;
    protected $primarykey = 'id';
    protected $table = 'caules';

    protected $fillable = [
        'nome',
        'descricao',
        'planta_id',
        'imagem',

    ];
}
