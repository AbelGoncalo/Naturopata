<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planta extends Model
{
    use HasFactory;
    protected $primarykey = 'id';
    protected $table = 'plantas';
    protected $fillable = [
        'planta',
        'tipo',
        'descricao',
        'imagem'
    ];

    public function doencas(){
        return $this->belongsTomany(Doenca::class, 'doenca_plantas','planta_id','doenca_id');
    }
}
