<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campeonatos extends Model
{
    protected $table = 'campeonatos';

    protected $fillable = [
        'nome',
        'data_inicio',
        'data_fim'
    ];
}
