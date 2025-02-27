<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jogadores;
use Illuminate\Support\Facades\DB;

class JogadoresSeeder extends Seeder
{
    public function run()
    {
        DB::table('jogadores')->truncate(); // Opcional: Limpa a tabela antes de inserir novos dados

        Jogadores::insert([
            [
                'nome' => 'João Silva',
                'email' => 'joao.silva@email.com',
                'posicao' => 'Atacante',
                'nivel' => rand(1, 10),
            ],
            [
                'nome' => 'Carlos Santos',
                'email' => 'carlos.santos@email.com',
                'posicao' => 'Goleiro',
                'nivel' => rand(1, 10),
            ],
            [
                'nome' => 'Lucas Oliveira',
                'email' => 'lucas.oliveira@email.com',
                'posicao' => 'Meio-campo',
                'nivel' => rand(1, 10),
            ],
            [
                'nome' => 'Ricardo Mendes',
                'email' => 'ricardo.mendes@email.com',
                'posicao' => 'Zagueiro',
                'nivel' => rand(1, 10),
            ]
        ]);
    }
}
