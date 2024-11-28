<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Executa a criação da tabela de usuários.
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('telefone', 15);
            $table->string('email')->unique();
            $table->string('senha');
            $table->enum('status', ['admin', 'cliente'])->default('cliente');
            $table->date('data_nascimento')->nullable();
            $table->text('endereco')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverte a criação da tabela de usuários.
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
