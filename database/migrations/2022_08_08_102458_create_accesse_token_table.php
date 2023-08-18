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
        Schema::connection('mostra_fotografia_2023')->create('accesse_token', function (Blueprint $table) {
            $table->id();
            $table->string('uuidInscricao');
            $table->string('accessToken');
            $table->integer('validade');
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
        Schema::connection('mostra_fotografia_2023')->dropIfExists('accesse_token');
    }
};
