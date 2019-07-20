<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTomadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tomadores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('razaosocial', 150);
            $table->string('cnpj', 50);
            $table->string('endereco', 150);
            $table->string('email')->unique();
            $table->string('fone');
            $table->string('contato', 100);
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
        Schema::dropIfExists('tomadores');
    }
}
