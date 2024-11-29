<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGastosVariadosTable extends Migration
{
    /**
     * Execute as transformações da migração.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gastos_variados', function (Blueprint $table) {
            $table->id(); 
            $table->string('nome'); 
            $table->decimal('valor', 10, 2); 
            $table->enum('categoria', [
                'compras', 
                'despesas_imprevistas', 
                'alimentacao', 
                'transporte', 
                'manutencao', 
                'saude', 
                'educacao', 
                'diversao', 
                'cultura', 
                'viagem', 
                'presentes', 
                'comunicacao', 
                'impostos', 
                'outros'
            ]);
            $table->date('data'); 
            $table->text('descricao')->nullable(); 
            $table->timestamps(); 
        });
    }

    /**
     * Reverte as transformações da migração.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gastos_variados');
    }
}
