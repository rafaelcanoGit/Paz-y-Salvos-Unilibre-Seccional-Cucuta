<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EstadocajaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estadocaja', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->bigIncrements('id_estadocaja');
            $table->bigInteger('id_doc')->unsigned();         
            $table->foreign('id_doc')->references('id_docente')->on('docente')->onDelete('cascade');
            $table->integer('documento_doc');      
            $table->String('estado');
            $table->String('observacion')->nullable();
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
        Schema::drop('estadocaja');
    }
}
