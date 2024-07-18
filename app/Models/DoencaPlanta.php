<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoencaPlanta extends Model
{
    use HasFactory;

    protected $primarykey = 'id';
    protected $table = 'doenca_plantas';
    protected $fillable = [
       
        'planta_id',
        'doenca_id'
    ];
}
