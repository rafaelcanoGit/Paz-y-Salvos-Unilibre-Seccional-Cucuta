<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EstadoDocenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estado_docente', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->bigIncrements('id_estado_doc');
            $table->bigInteger('id_pazys')->unsigned();         
            $table->foreign('id_pazys')->references('id_pazysalvo')->on('pazysalvo')->onDelete('cascade');
            $table->bigInteger('id_doc')->unsigned();         
            $table->foreign('id_doc')->references('id_docente')->on('docente')->onDelete('cascade');
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
        Schema::drop('estado_docente');
    }
}
