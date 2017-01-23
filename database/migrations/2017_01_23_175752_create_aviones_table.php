<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aviones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo',100);
          	$table->string('matricula',20)->unique();
          	$table->string('licencia1', 20)->unique();
          	$table->string('licencia2', 20)->nullable();
          	$table->string('registro', 100)->nullable();
          	$table->string('piloto1', 200);
          	$table->string('piloto2', 200)->nullable();
          	$table->string('certificado', 50)->unique()->nullable();
          	$table->string('seguro', 200)->nullable();
          	$table->integer('company_id')->unsigned();
          	$table->foreign('company_id')
                ->references('id')->on('companys')
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
        Schema::drop('aviones');
    }
}
