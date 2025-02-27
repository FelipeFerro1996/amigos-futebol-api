<?php

namespace App\Repositories;

use App\Interfaces\JogadoresInterface;
use App\Models\Jogadores;

class JogadoresRepository implements JogadoresInterface {

    public function getAllJogadores(){
        $jogadores = Jogadores::get();
        return $jogadores;
    }

}