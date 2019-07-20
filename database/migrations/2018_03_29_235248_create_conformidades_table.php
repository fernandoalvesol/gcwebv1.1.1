<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConformidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conformidades', function (Blueprint $table) {
            $table->increments('id');            
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('tomador_id')->unsigned();
            $table->foreign('tomador_id')->references('id')->on('tomadores')->onDelete('cascade');
            $table->string('protocolo', 50);
            $table->string('tipo', 50);
            $table->string('setor', 50);
            $table->string('destinatario', 100);
            $table->date('data');
            $table->time('hora');
            $table->enum('status',['A', 'R', 'N'])->default('A')->comment('A->Aguardar, R->Resolvido, N->Não Resolvido');      
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
        Schema::dropIfExists('conformidades');
    }
}
