<?php

namespace App\Interfaces;

use App\DTOs\CampeonatosDTO;

interface CampeonatosInterface
{

    public function getAllCampeonatos($request = NULL);

    public function create(CampeonatosDTO $dto) : array;

    public function getCampeonatoByid($id): array;

    public function update($id, CampeonatosDTO $dto);

    public function delete($id) : array;
}