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
        'servico_ids',
        'data_agendamento',
        'status',
        'observacoes',
    ];

    /**
     * Relacionamento com o modelo Usuario.
     */
    public function usuario()
    {
        return $this->belongsTo(Usuarios::class, 'usuario_id');
    }

    /**
     * Relacionamento muitos-para-muitos com o modelo Servico.
     */
    public function servicos()
    {
        return $this->belongsToMany(Servico::class, 'agendamento_servico', 'agendamento_id', 'servico_id');
    }
}
