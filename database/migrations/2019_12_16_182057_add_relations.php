<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('planpreventivo', function (Blueprint $table) {
            $table->foreign('empresa_id')
                 ->references('id')->on('empresas');
        }); 
        Schema::table('local', function (Blueprint $table) {
            $table->foreign('empresa_id')->references('id')->on('empresas');
        });
        Schema::table('trabajador', function (Blueprint $table) {
            $table->foreign('empresa_id')->references('id')->on('empresas');
        });
          Schema::table('equipo', function (Blueprint $table) {
            $table->foreign('empresa_id')->references('id')->on('empresas');
        });
          Schema::table('usuarios', function (Blueprint $table) {
            $table->foreign('empresa_id')->references('id')->on('empresas');
        });
          Schema::table('documentosLocal', function (Blueprint $table) {
            $table->foreign('local_id')->references('id')->on('local');
        });
          Schema::table('documentosEquipo', function (Blueprint $table) {
            $table->foreign('equipo_id')->references('id')->on('equipo');
        });
          Schema::table('documentos', function (Blueprint $table) {
            $table->foreign('trabajador_id')->references('id')->on('trabajador');
        });
          Schema::table('aspectos', function (Blueprint $table) {
            $table->foreign('planPreventivo_id')->references('id')->on('planPreventivo');
        });
          Schema::table('especifica', function (Blueprint $table) {
            $table->foreign('empresa_id')->references('id')->on('empresas');
        });
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('planpreventivo', function (Blueprint $table) {
            $table->dropForeign(['empresa_id']);
        });
        Schema::table('local', function (Blueprint $table) {
            $table->dropForeign(['empresa_id']);
        });
        Schema::table('trabajador', function (Blueprint $table) {
            $table->dropForeign(['empresa_id']);
        });
          Schema::table('equipo', function (Blueprint $table) {
            $table->dropForeign(['empresa_id']);
        });
          Schema::table('usuario', function (Blueprint $table) {
            $table->dropForeign(['empresa_id']);
        });
          Schema::table('documentosLocal', function (Blueprint $table) {
            $table->dropForeign(['local_id']);
        });
          Schema::table('documentosEquipo', function (Blueprint $table) {
            $table->dropForeign(['equipo_id']);
        });
          Schema::table('documentos', function (Blueprint $table) {
            $table->dropForeign(['trabajador_id']);
        });
          Schema::table('aspectos', function (Blueprint $table) {          
            $table->dropForeign(['planPreventivo_id']);
        });
          Schema::table('especifica', function (Blueprint $table) {
            $table->dropForeign('empresa_id')->references('id')->on('empresas');
        });
    }
}
