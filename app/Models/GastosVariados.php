<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GastoVariado extends Model
{
    use HasFactory;

    protected $table = 'gastos_variados';

    protected $fillable = [
        'nome',
        'valor',
        'categoria',
        'data',
        'descricao',
    ];

    protected $dates = [
        'data',
    ];
}
