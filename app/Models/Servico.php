<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    use HasFactory;

    protected $table = 'servicos';

    protected $fillable = [
        'nome',
        'descricao',
        'duracao',
        'preco',
    ];

    /**
     * Relacionamento com agendamentos.
     */
    public function agendamentos()
    {
        return $this->hasMany(Agendamento::class, 'servico_id');
    }
}
