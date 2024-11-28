<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    use HasFactory;

    protected $table = 'agendamentos';

    protected $fillable = [
        'usuario_id',
        'servico_id',
        'data_agendamento',
        'status',
        'observacoes',
    ];

    /**
     * Relacionamento com o modelo Usuario.
     */
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    /**
     * Relacionamento com o modelo Servico.
     */
    public function servico()
    {
        return $this->belongsTo(Servico::class, 'servico_id');
    }
}
