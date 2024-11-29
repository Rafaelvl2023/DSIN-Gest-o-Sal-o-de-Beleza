<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarTabelaGastosFixos extends Migration
{
    /**
     * Execute a migração.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gastos_fixos', function (Blueprint $table) {
            $table->id(); 
            $table->string('nome');
            $table->decimal('valor', 10, 2); 
            $table->enum('categoria', [
                'aluguel', 
                'salarios', 
                'energia', 
                'agua', 
                'internet', 
                'telefone', 
                'manutencao', 
                'seguros', 
                'publicidade'
            ]); 
            $table->date('data_vencimento'); 
            $table->enum('recorrencia', ['mensal', 'anual', 'semanal', 'diaria']); 
            $table->text('descricao')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverter a migração.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gastos_fixos');
    }
}
