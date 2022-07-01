<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembresiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membresias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titulo');
            $table->string('precio');
            $table->integer('n_meses');
            $table->integer('visualizacion');
            $table->integer('n_fotos');
            $table->integer('n_videos');
            $table->integer('p_organicas');
            $table->integer('p_segmentadas');
            $table->integer('donacion')->default(0);//opcional
            $table->integer('portaman')->default(0);//opcional
            $table->integer('flayer')->nullable();//opcional

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
        Schema::dropIfExists('membresias');
    }
}
