<?php

namespace App\Providers;

use App\Interfaces\CampeonatosInterface;
use App\Interfaces\JogadoresInterface;
use App\Repositories\CampeonatosRepository;
use App\Repositories\JogadoresRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesProvider extends ServiceProvider
{
    public array $bindings = [
        JogadoresInterface::class=>JogadoresRepository::class,
        CampeonatosInterface::class => CampeonatosRepository::class
    ];
}
