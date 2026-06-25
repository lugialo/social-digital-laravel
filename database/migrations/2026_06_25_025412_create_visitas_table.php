<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('visitas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('membro', 100);
            $table->date('data');
            $table->time('hora');
            $table->string('logradouro', 100);
            $table->string('numero', 20)->nullable();
            $table->string('bairro', 80)->nullable();
            $table->string('cidade', 80);
            $table->string('estado', 2)->default('SC');
            $table->text('descricao')->nullable();
            $table->text('observacao')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('visitas');
    }
};
