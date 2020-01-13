<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DocenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docente', function (Blueprint $table) {
           $table->engine='InnoDB';
           $table->bigIncrements('id_docente');
           $table->String('nombre');
           $table->String('apellido');
           $table->integer('documento');
           $table->bigInteger('id_fac')->unsigned(); 
           $table->foreign('id_fac')->references('id_facultad')->on('facultad')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('docente'); 
      
    }
}
