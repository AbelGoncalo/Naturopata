<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doenca extends Model
{
    use HasFactory;

    protected $primarkey = 'id';
    protected $table ='doencas';
    protected $fillable = [
        'doenca',
        'descricao',
        'imagem',

    ];

    public function plantas(){
        return $this->belongsTomany(Planta::class, 'doenca_plantas','doenca_id','planta_id');
    }
}
