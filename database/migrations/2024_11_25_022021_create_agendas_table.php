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
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('resident_id');
            $table->unsignedBigInteger('medicine_id');
            $table->string('unidade_medida', 255);
            $table->integer('quantidade');
            $table->integer('frequencia');
            $table->bigInteger('repeticoes');
            $table->dateTime('horario');

            $table->timestamps();

            // Chaves estrangeiras
            $table->foreign('resident_id')->references('id')->on('residents')->onDelete('cascade');
            $table->foreign('medicine_id')->references('id')->on('medicines')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendas');
    }
};
