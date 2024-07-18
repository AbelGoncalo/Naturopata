<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exame extends Model
{
    use HasFactory;

    protected $primarykey = 'id';
    protected $tables = 'exames';
    protected $fillable = [
        'exame',
        'especialidade_id'
    ];
}
