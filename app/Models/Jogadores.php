<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jogadores extends Model
{
    protected $table = "jogadores";

    protected $fillable = [
        'nome',
        'email',
        'posicao',
        'nivel'
    ];
}
