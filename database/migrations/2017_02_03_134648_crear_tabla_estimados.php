<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaEstimados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estimates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fbo',150);
            $table->date('fecha_soli');
            $table->string('localidad',150);
            $table->string('resumen',500);
            $table->string('metodo_segui',150);
            $table->string('info_segui',150);
            $table->enum('estado',['Pendiente','Aceptado', 'Rechazado','Cancelado']);
            $table->date('proximo_seguimiento');
            $table->integer('cantidad_fuel')->nullable();
            $table->smallInteger('num_habitacion')->nullable();
            $table->string('tipo_hab')->nullable();
            $table->string('tipo_cama')->nullable();
            $table->string('tipo_estrellas')->nullable();
            $table->string('imagen');
            $table->double('categoria', 2, 2);
            $table->double('descuento', 2, 2);
            $table->double('ganancia', 10, 2);
            $table->double('subtotal', 10, 2);
            $table->double('total', 10, 2);
            $table->integer('prove_id');
            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companys');
            $table->integer('avion_id')->unsigned();
            $table->foreign('avion_id')->references('id')->on('aviones');
            $table->timestamps();
        });

        Schema::create('dates_estimates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cantidad');
            $table->double('descuento', 2, 2);
            $table->double('precio', 10, 2);
            $table->double('recarga', 10, 2);
            $table->double('subtotal', 10, 2);
            $table->double('subtotal_recarga', 10, 2);
            $table->double('total_recarga', 10, 2);
            $table->double('total', 10, 2);
            $table->integer('estimate_id')->unsigned();
            $table->foreign('estimate_id')->references('id')->on('estimates');
            $table->integer('servicio_id')->unsigned();
            $table->foreign('servicio_id')->references('id')->on('servicios');
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
        Schema::drop('estimates');
        Schema::drop('dates_estimates');
    }
}
