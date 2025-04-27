<?php

namespace App\DTOs;

class JogadoresDTO{

    public function __construct(
        public readonly string $nome,
        public readonly string $email,
        public readonly string $posicao,
        public readonly int $nivel
    ){}

    public static function fromArray(array $data): self
    {

        return new self(...$data);

    }

    public function toArray(): Array{
        return get_object_vars($this);
    }

}