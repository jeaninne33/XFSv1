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

      Schema::create('paises', function (Blueprint $table) {
        $table->increments('id')->unique();
        $table->string('nombre',100);
        $table->timestamps();
      });

      /* ciudades */
      Schema::create('estados', function (Blueprint $table) {
        $table->increments('id');
        $table->string('nombre',200);
        $table->integer('pais_id')->unsigned();
        $table->foreign('pais_id')
          ->references('id')->on('paises')
          ->onDelete('cascade');
        $table->timestamps();

      });

        Schema::create('companys', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nombre',100)->unique();
          $table->string('correo',100)->unique();
          $table->string('representante', 100);
          $table->string('ciudad', 50);
          $table->string('website', 50)->nullable();
          $table->string('codigop', 50)->nullable();
          $table->string('telefono', 50)->nullable();
          $table->enum('tipo_prove',['Fuel/Handling','FBO/Handler', 'Broker','Supplier'])->nullable();
          $table->string('certificacion', 100)->nullable();
          $table->string('celular', 50)->nullable();
          $table->string('contacto_admin', 100)->nullable();
          $table->string('correo_admin', 70)->nullable();
          $table->string('telefono_admin', 50);
          $table->string('banco', 50)->nullable();
          $table->string('cuenta', 50)->nullable();
          $table->string('direccion', 500);
          $table->string('direccion_factura', 500);
          $table->string('direccion_cuenta', 500)->nullable();
          $table->string('aba', 50)->nullable();
          $table->enum('tipo',['client','prove', 'cp']);
          $table->string('cargo', 50)->nullable();
          $table->string('categoria',50)->nullable();
          $table->string('servicio_disp',100)->nullable();
          $table->integer('estado_id')->unsigned();
          $table->foreign('estado_id')->references('id')->on('estados')->onDelete('cascade');
          $table->integer('pais_id')->unsigned();
          $table->foreign('pais_id')->references('id')->on('paises')->onDelete('cascade');
          $table->timestamps();
        });
    //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('paises');
      Schema::dropIfExists('cuidades');
      Schema::dropIfExists('companys');
    }
}
