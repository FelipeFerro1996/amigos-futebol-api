<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jogadores', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 255);
            $table->string('posicao', 20); // Ex: Goleiro, Zagueiro, Meio-campo, Atacante
            $table->integer('nivel'); // Nível do jogador (1 a 5, por exemplo)
            $table->string('email', 255); // Nível do jogador (1 a 5, por exemplo)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jogadores');
    }
};
