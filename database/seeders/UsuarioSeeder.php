<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioSeeder extends Seeder
{
    public function run()
    {
        DB::table('usuarios')->insert([
            'nome' => 'Leila Regina Carvalho',
            'telefone' => '14982225813',
            'email' => 'leila@gmail.com',
            'senha' => bcrypt('gestao@2024'),
            'status' => 'admin',
            'data_nascimento' => '1984-07-07',
            'endereco' => 'Rua das Flores, 123 - Centro, São Paulo, SP',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
