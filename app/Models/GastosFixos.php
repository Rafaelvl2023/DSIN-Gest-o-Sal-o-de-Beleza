<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GastosFixos extends Model
{
    use HasFactory;

    protected $table = 'gastos_fixos';

    protected $fillable = [
        'nome',
        'valor',
        'categoria',
        'data_vencimento',
        'recorrencia',
        'descricao',
    ];

    protected $dates = [
        'data_vencimento',
    ];
}
