<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('servicos')->insert([
            [
                'nome' => 'Corte Masculino',
                'descricao' => 'Corte de cabelo masculino com estilo moderno.',
                'duracao' => '00:30:00',
                'preco' => 50.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Corte Feminino',
                'descricao' => 'Corte de cabelo feminino com finalização.',
                'duracao' => '01:00:00',
                'preco' => 80.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Escova Modeladora',
                'descricao' => 'Escova modeladora para um visual sofisticado.',
                'duracao' => '00:45:00',
                'preco' => 60.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Coloração',
                'descricao' => 'Coloração completa para renovação do visual.',
                'duracao' => '02:00:00',
                'preco' => 150.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Hidratação Capilar',
                'descricao' => 'Tratamento de hidratação profunda para os cabelos.',
                'duracao' => '01:00:00',
                'preco' => 100.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
