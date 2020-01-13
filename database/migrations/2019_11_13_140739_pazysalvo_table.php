<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PazysalvoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pazysalvo', function (Blueprint $table) {
            $table->engine='InnoDB';
           $table->bigIncrements('id_pazysalvo');
           $table->bigInteger('id_dep')->unsigned();        
           $table->foreign('id_dep')->references('id_dependencia')->on('dependencia')->onDelete('cascade');
           $table->bigInteger('id_fac')->unsigned();         
           $table->foreign('id_fac')->references('id_facultad')->on('facultad')->onDelete('cascade');
           $table->bigInteger('id_per')->unsigned();         
           $table->foreign('id_per')->references('id_periodoac')->on('periodo_academico')->onDelete('cascade');
      
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pazysalvo');
    }
}
