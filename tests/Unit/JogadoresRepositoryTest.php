<?php

namespace Tests\Unit;

use App\DTOs\JogadoresDTO;
use App\Interfaces\JogadoresInterface;
use App\Models\Jogadores;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class JogadoresRepositoryTest extends TestCase
{
    use RefreshDatabase;

    private JogadoresInterface $jogadores_repository;

    public function setUp(): void
    {
        parent::setUp();
        
        $this->jogadores_repository = $this->app->make(JogadoresInterface::class);
    }

    public function test_insert_jogador()
    {
        $jogadorDto = JogadoresDTO::fromArray([
            'nome' => 'Felipe Ferro',
            'email' => 'fellipe@gmail.com',
            'nivel' => 2,
            'posicao' => 'Zagueiro'
        ]);
        $this->jogadores_repository->create($jogadorDto);

        $this->assertDatabaseHas('jogadores', ['nome'=>'Felipe Ferro']);
    }

    public function test_update_jogador()
    {
        // Criando um jogador
        $jogadorDto = JogadoresDTO::fromArray([
            'nome' => 'Felipe Ferro',
            'email' => 'fellipe@gmail.com',
            'nivel' => 2,
            'posicao' => 'Zagueiro'
        ]);

        $jogador = $this->jogadores_repository->create($jogadorDto)['data'];

        // Verifica se o jogador foi inserido corretamente
        $this->assertDatabaseHas('jogadores', ['nome' => 'Felipe Ferro']);

        // Atualizando o jogador
        $jogadorAtualizadoDto = JogadoresDTO::fromArray([
            'nome' => 'Felipe Ferro 2',
            'email' => 'fellipe@gmail.com',
            'nivel' => 2,
            'posicao' => 'Zagueiro'
        ]);

        $this->jogadores_repository->update($jogador->id, $jogadorAtualizadoDto);

        // Verifica se o nome foi atualizado
        $this->assertDatabaseHas('jogadores', ['id' => $jogador->id, 'nome' => 'Felipe Ferro 2']);
        
        // Opcional: Verificar que o nome antigo não existe mais
        $this->assertDatabaseMissing('jogadores', ['id' => $jogador->id, 'nome' => 'Felipe Ferro']);
    }

    public function teste_delete_jogador(){

        // Criando um jogador
        $jogadorDto = JogadoresDTO::fromArray([
            'nome' => 'Felipe Ferro',
            'email' => 'fellipe@gmail.com',
            'nivel' => 2,
            'posicao' => 'Zagueiro'
        ]);

        $jogador = $this->jogadores_repository->create($jogadorDto)['data'];

        // Verifica se o jogador foi inserido corretamente
        $this->assertDatabaseHas('jogadores', ['nome' => 'Felipe Ferro']);

        $this->jogadores_repository->delete($jogador->id);

        $this->assertDatabaseMissing('jogadores', ['id' => $jogador->id, 'nome' => 'Felipe Ferro']);

    }

    public function test_nao_deve_permitir_emails_repetidos()
    {
        // Criando um jogador
        $jogadorDto = JogadoresDTO::fromArray([
            'nome' => 'Felipe Ferro',
            'email' => 'fellipe@gmail.com',
            'nivel' => 2,
            'posicao' => 'Zagueiro'
        ]);

        $this->jogadores_repository->create($jogadorDto);

        // Criando um jogador
        $jogadorDto2 = JogadoresDTO::fromArray([
            'nome' => 'Felipe Ferro2',
            'email' => 'fellipe@gmail.com',
            'nivel' => 3,
            'posicao' => 'Atacante'
        ]);

        $this->jogadores_repository->create($jogadorDto2);

        $jogadores = Jogadores::where('email', '=', 'fellipe@gmail.com')->count();

        $this->assertEquals(1, $jogadores);

    }

}
