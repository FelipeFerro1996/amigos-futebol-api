<?php

namespace App\Providers;

use App\Interfaces\JogadoresInterface;
use App\Repositories\JogadoresRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesProvider extends ServiceProvider
{
    public array $bindings = [
        JogadoresInterface::class=>JogadoresRepository::class
    ];
}
