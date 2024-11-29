<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuarios extends Authenticatable
{
    use HasFactory, Notifiable;

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

    protected $hidden = [
        'senha',
    ];

    /**
     * Relacionamento com agendamentos.
     */
    public function agendamentos()
    {
        return $this->hasMany(Agendamento::class, 'usuario_id');
    }
}
