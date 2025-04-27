<?php

namespace Tests\Unit;

use App\DTOs\CampeonatosDTO;
use App\Interfaces\CampeonatosInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CampeonatosRepositoryTest extends TestCase
{
    use RefreshDatabase;

    private CampeonatosInterface $campeonatos_repository;

    public function setUp(): void
    {
        parent::setUp();

        $this->campeonatos_repository = $this->app->make(CampeonatosInterface::class);
    }

    public function test_insert_campeonato()
    {
        $campeonatoDto = CampeonatosDTO::fromArray([
            'nome'=>'Temporada 1 2025',
            'data_inicio'=>'2025-01-01',
            'data_fim'=>'2025-01-01'
        ]);
        
        $this->campeonatos_repository->create($campeonatoDto);

        $this->assertDatabaseHas('campeonatos', ['nome' => 'Temporada 1 2025']);
    }

    public function test_update_campeonato(){
        $campeonatoDto = CampeonatosDTO::fromArray([
            'nome'=>'Temporada 2025',
            'data_inicio'=>'2025-01-01',
            'data_fim'=>'2025-12-31'
        ]);

        $campeonato = $this->campeonatos_repository->create($campeonatoDto)['data'];


        $this->assertDatabaseHas('campeonatos', ['nome'=>'Temporada 2025']);

        $campeonatoDto2 = CampeonatosDTO::fromArray([
            'nome'=>'Temporada 2026',
            'data_inicio'=>'2026-01-01',
            'data_fim'=>'2026-12-31'
        ]);

            $this->campeonatos_repository->update($campeonato->id, $campeonatoDto2);

        $this->assertDatabaseHas('campeonatos', ['id'=>$campeonato->id, 'nome'=>'Temporada 2026']);

        $this->assertDatabaseMissing('campeonatos', ['id'=>$campeonato->id, 'nome'=>'Temporada 2025']);

    }

    public function test_delete_campeonato(){
        $campeonatoDto = CampeonatosDTO::fromArray([
            'nome'=>'Temporada 1',
            'data_inicio'=>'2025-01-01',
            'data_fim'=>'2025-12-31'
        ]);

        $campeonato = $this->campeonatos_repository->create($campeonatoDto)['data'];

        $this->assertDatabaseHas('campeonatos', ['nome'=>'Temporada 1']);

        $this->campeonatos_repository->delete($campeonato->id);

        $this->assertDatabaseMissing('campeonatos', ['id'=>$campeonato->id, 'nome'=>'Temporada 1']);
    }

}
