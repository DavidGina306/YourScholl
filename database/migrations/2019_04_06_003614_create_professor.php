<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professor', function (Blueprint $table) {
            $table->increments('id_professor');
            $table->string('nome', 250);
            $table->date('data_nascimento');
            $table->string('logradouro', 250);
            $table->string('numero', 10);
            $table->string('bairro', 100);
            $table->string('cidade', 150);
            $table->string('estado', 150);
            $table->string('cep', 9);
            $table->datetime('data_criacao');
            $table->datetime('data_att')->nullable();
            $table->tinyInteger('status');
            $table->string('celular', 14);
            $table->string('telefone', 14);
            $table->string('email', 250);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('professor');
    }
}
