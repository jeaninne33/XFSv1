<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companys', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nombre',100)->unique();
          $table->string('correo',100)->unique();
          $table->string('direccion', 500);
          $table->string('website', 50);
          $table->string('representante', 100);
          $table->string('ciudad', 50);
          $table->string('pais', 50);
          $table->string('codigop', 50);
          $table->string('telefono', 50);
          $table->timestamps();
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companys', function (Blueprint $table) {
            //
        });
    }
}
