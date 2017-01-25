<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaisesCuidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          /* paises */
        Schema::create('paises', function (Blueprint $table) {
        	$table->increments('id')->unique();
        	$table->string('nombre',100);
        	$table->timestamps();
        });

        /* ciudades */
        Schema::create('cuidades', function (Blueprint $table) {
        	$table->increments('id');
        	$table->string('nombre',200);
        	$table->integer('pais_id')->unsigned();
        	$table->foreign('pais_id')
        	  ->references('id')->on('paises')
        	  ->onDelete('cascade');
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
        Schema::drop('paises');
        Schema::drop('cuidades');
    }
}
