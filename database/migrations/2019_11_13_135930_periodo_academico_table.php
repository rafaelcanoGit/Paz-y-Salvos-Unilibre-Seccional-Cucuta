<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PeriodoAcademicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periodo_academico', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->bigIncrements('id_periodoac');
            $table->integer('ano');
            $table->integer('periodo');
           
        });
        


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('periodo_academico'); 
    }
}
