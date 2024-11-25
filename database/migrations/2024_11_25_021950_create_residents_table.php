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
        Schema::create('residents', function (Blueprint $table) {
            $table->id();

            $table->string('nome_residente', 512);
            $table->date('data_nascimento');
            $table->string('nome_responsavel', 512);
            $table->string('endereco_responsavel', 512);
            $table->string('telefone_responsavel', 17);
            $table->string('observacao', 255)->nullable();
            $table->string('foto');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('residents');
    }
};
