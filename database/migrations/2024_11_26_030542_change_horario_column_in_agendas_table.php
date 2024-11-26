<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('agendas', function (Blueprint $table) {
            // Modificar a coluna 'horario' para o tipo 'TIME'
            $table->time('horario')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('agendas', function (Blueprint $table) {
            // Reverter para o tipo anterior, por exemplo 'DATETIME' ou outro tipo
            $table->dateTime('horario')->change();
        });
    }
};
