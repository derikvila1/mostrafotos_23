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
        Schema::connection('mostra_fotografia_2023')->create('recurso_habilitacao', function (Blueprint $table) {
            $table->id();
            $table->string('uuidInscricao');
            $table->string('motivo');
            $table->text('justificativa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mostra_fotografia_2023')->dropIfExists('recurso_habilitacao');
    }
};
