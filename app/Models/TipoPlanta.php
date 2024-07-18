<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPlanta extends Model
{
    use HasFactory;

    protected $primarykey = 'id';
    protected $table = 'tipo_plantas';
    protected $fillable =[
        'tipoPlanta',
        'descricao'
    ];
}
