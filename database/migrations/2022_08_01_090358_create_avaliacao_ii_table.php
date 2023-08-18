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
        Schema::connection('mostra_fotografia_2023')->create('avaliacao_ii', function (Blueprint $table) {
            $table->id();
            $table->string('uuidInscricao');
            $table->string('a');
            $table->text('a_observacao');
            $table->text('a_nota');
            $table->string('b');
            $table->text('b_observacao');
            $table->text('b_nota');
            $table->string('c');
            $table->text('c_observacao');
            $table->text('c_nota');
            $table->string('d');
            $table->text('d_observacao');
            $table->text('d_nota');
            $table->string('e');
            $table->text('e_observacao');
            $table->text('e_nota');
            $table->string('uuidAvalidaro');
            $table->string('nomeAvaliador');
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
        Schema::connection('mostra_fotografia_2023')->dropIfExists('avaliacao_ii');
    }
};
