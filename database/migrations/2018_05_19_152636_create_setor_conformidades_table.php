<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSetorConformidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setor_conformidades', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('setores_id')->unsigned();
            $table->foreign('setores_id')->references('id')->on('setores')->onDelete('cascade');
            $table->integer('conformidades_id')->unsigned();
            $table->foreign('conformidades_id')->references('id')->on('conformidades')->onDelete('cascade');
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
        Schema::dropIfExists('setor_conformidades');
    }
}
