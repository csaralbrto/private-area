<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignacionPlanUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignacion_plan_usuarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_usuario');
            //1-> usado 0-> sin usar
            $table->integer('state')->default(0);
            $table->integer('plan_elegido');
            $table->integer('tipo');//1 = plan 2 = paquete 3 = membresia
            $table->integer('inmuebles_publicados')->default(0);
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
        Schema::dropIfExists('asignacion_plan_usuarios');
    }
}
