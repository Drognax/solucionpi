<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresaTable extends Migration
{

    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('rut')->unique();
            $table->string('giro');
            $table->string('representante');
            $table->string('contacto');
            $table->string('direccion');
            $table->string('certificado');
            $table->string('cotizacion');
            $table->string('trabajadores');
            $table->string('contrato');
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
       Schema::dropIfExists('empresas');
     }
}
