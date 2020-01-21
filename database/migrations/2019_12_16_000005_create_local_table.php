<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocalTable extends Migration
{

    public function up()
    {
        Schema::create('local', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('faena');
            $table->string('direccion');
            $table->string('area');
            $table->string('actividades');
            $table->unsignedBigInteger('empresa_id')->unsigned();
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
       Schema::dropIfExists('local');
     }
}
