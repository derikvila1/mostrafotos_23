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
        Schema::connection('mostra_fotografia_2023')->create('inscricao', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->string('chave');
            $table->string('tipo');
            $table->string('pfNome')->nullable();
            $table->string('pfNomeArtistico')->nullable();
            $table->string('pfNomeSocial')->nullable();
            $table->string('pfEstadoCivil')->nullable();
            $table->string('pfNacionalidade')->nullable();
            $table->string('pfNascimento')->nullable();
            $table->string('pfCpf')->nullable();
            $table->string('pfRg')->nullable();
            $table->string('pjNome')->nullable();
            $table->string('pjCpf')->nullable();
            $table->string('pjRg')->nullable();
            $table->string('cep');
            $table->string('endereco');
            $table->string('bairro');
            $table->string('municipio');
            $table->string('uf');
            $table->string('fone1');
            $table->string('fone2')->nullable();
            $table->string('email');
            // $table->string('banco');
            // $table->string('agencia');
            // $table->string('conta');
            $table->string('log');
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
        Schema::connection('mostra_fotografia_2023')->dropIfExists('inscricao');
    }
};
