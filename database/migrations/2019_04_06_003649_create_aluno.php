<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAluno extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aluno', function (Blueprint $table) {
            $table->increments('id_aluno');
            $table->string('nome', 200);
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
            $table->integer('id_curso')->unsigned();

            $table->foreign('id_curso')->
            references('id_curso')->
            on('curso')->
            onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aluno');
    }
}
