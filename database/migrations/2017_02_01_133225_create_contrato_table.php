<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create ('contrato',function(Blueprint $table)
        {
          $table->increments('id')->unique();
          $table->integer('company_id')->unsigned();
          $table->foreign('company_id')->references('id')
          ->on('companys')->onDelete('cascade');
          $table->integer('aviones_id')->unsigned();
          $table->foreign('aviones_id')->references('id')
          ->on('aviones')->onDelete('cascade');
          $table->dateTime('fecha');
          $table->integer('nroOficina');
          $table->string('oficina',100);
          $table->dateTime('fechaDuracion');
          $table->string('porcentaje',15);
          $table->integer('dias');
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
       Schema::drop('contrato');
    }
}
