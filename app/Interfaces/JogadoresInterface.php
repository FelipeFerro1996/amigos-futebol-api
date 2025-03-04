<?php

namespace App\Interfaces;

use App\DTOs\JogadoresDTO;

interface JogadoresInterface
{
    public function getAllJogadores();

    public function create(JogadoresDTO $dto) : array;

    public function getJogadorByid($id): array;

    public function update($id, JogadoresDTO $dto);

    public function delete($id) : array;
}
