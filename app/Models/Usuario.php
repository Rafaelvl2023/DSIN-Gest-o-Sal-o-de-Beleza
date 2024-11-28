<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios';

    protected $fillable = [
        'nome',
        'telefone',
        'email',
        'senha',
        'status',
        'data_nascimento',
        'endereco',
    ];

    /**
     * Relacionamento com agendamentos.
     */
    public function agendamentos()
    {
        return $this->hasMany(Agendamento::class, 'usuario_id');
    }
}
