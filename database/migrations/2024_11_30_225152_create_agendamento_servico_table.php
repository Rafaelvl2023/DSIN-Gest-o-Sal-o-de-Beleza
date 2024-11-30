<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('agendamento_servico', function (Blueprint $table) {
            // Definindo as colunas para os IDs
            $table->unsignedBigInteger('agendamento_id');
            $table->unsignedBigInteger('servico_id');
            $table->timestamps();

            // Definindo as chaves estrangeiras
            $table->foreign('agendamento_id')->references('id')->on('agendamentos')->onDelete('cascade');
            $table->foreign('servico_id')->references('id')->on('servicos')->onDelete('cascade');

            // Definindo a chave primária composta pelas colunas agendamento_id e servico_id
            $table->primary(['agendamento_id', 'servico_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Removendo a tabela
        Schema::dropIfExists('agendamento_servico');
    }
};
