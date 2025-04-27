<?php

namespace App\DTOs;

class CampeonatosDTO
{
    public function __construct(
        public readonly string $nome,
        public readonly string $data_inicio,
        public readonly string $data_fim
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(... $data);
    }

    public function toArray(): Array
    {
        return get_object_vars($this);
    }
}