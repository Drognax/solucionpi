<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentoslocalTable extends Migration
{

    public function up()
    {
        Schema::create('documentosLocal', function (Blueprint $table) {
            $table->bigIncrements('id')->unique(); 
            $table->string('nombre');
            $table->string('estado');
            $table->string('actividad');
            $table->date('indicador');
            $table->string('observaciones');
            $table->unsignedBigInteger('local_id')->unsigned();
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
       Schema::dropIfExists('documentosLocal');
     }
}
