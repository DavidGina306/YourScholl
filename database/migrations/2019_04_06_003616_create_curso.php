<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curso', function (Blueprint $table) {
            $table->increments('id_curso');
            $table->string('nome', 250);
            $table->datetime('data_criacao');
            $table->datetime('data_att')->nullabel();
            $table->tinyInteger('status');
            $table->integer('carga_horaria');
            $table->string('ementa', 250);
            $table->integer('id_professor')->unsigned();
            $table->timestamps();
        });

        Schema::table('curso', function($table) {
            $table->foreign('id_professor')->references('id_professor')->on('professor');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('curso');
    }
}
