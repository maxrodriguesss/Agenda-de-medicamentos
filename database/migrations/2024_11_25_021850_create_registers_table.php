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
        Schema::create('registers', function (Blueprint $table) {
            $table->id();

            $table->string('nome_usuario', 512);
            $table->string('cpf', 14);
            $table->string('email', 128)->unique();
            $table->string('telefone', 17)->nullable();
            $table->string('senha', 60);

            $table->string('usuario', 60)->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registers');
    }
};
