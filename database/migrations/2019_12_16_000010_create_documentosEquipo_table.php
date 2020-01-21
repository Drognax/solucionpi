<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentosequipoTable extends Migration
{

    public function up()
    {
        Schema::create('documentosEquipo', function (Blueprint $table) {

            $table->increments('id')->unique();
            $table->string('nombre');
            $table->string('estado');
            $table->string('actividad');
            $table->date('indicador');
            $table->string('observaciones');
            $table->unsignedBigInteger('equipo_id')->unsigned();
            $table->rememberToken();
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
       Schema::dropIfExists('documentosEquipo');
     }
}
