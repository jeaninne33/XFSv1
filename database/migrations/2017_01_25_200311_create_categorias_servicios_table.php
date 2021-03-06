<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriasServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('categorias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',100)->unique();
            $table->timestamps();
        });
          Schema::create('servicios', function (Blueprint $table) {
              $table->increments('id');
              $table->string('nombre',100)->unique();
              $table->string('descripcion',500);
              $table->integer('categoria_id')->unsigned();
              $table->foreign('categoria_id')
                  ->references('id')->on('categorias')
                  ->onDelete('cascade');
              $table->double('precio', 10, 2);
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
        Schema::dropIfExists('categorias');
        Schema::dropIfExists('servicios');
    }
}
