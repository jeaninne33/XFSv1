<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsDatosEstimadosFacturas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('dates_invoices', function (Blueprint $table) {
            $table->integer('categoria_id')->unsigned();
            $table->foreign('categoria_id')->references('id')->on('categorias');
        });
        Schema::table('dates_estimates', function (Blueprint $table) {
            $table->integer('categoria_id')->unsigned();
            $table->foreign('categoria_id')->references('id')->on('categorias');
        });
        Schema::table('invoices', function (Blueprint $table) {
          $table->integer('avion_id')->unsigned();
          $table->foreign('avion_id')->references('id')->on('aviones');
        });

        Schema::table('companys', function (Blueprint $table) {
          $table->integer('pais_id')->unsigned();
          $table->foreign('pais_id')->references('id')->on('paises');
        });
         Schema::drop('offers');

         Schema::create('company_servico', function (Blueprint $table) {
             $table->increments('id');
             $table->double('precio', 10, 2);
             $table->integer('company_id')->unsigned();
             $table->foreign('company_id')->references('id')->on('companys')->onDelete('cascade');
             $table->integer('servicio_id')->unsigned();
             $table->foreign('servicio_id')->references('id')->on('servicios')->onDelete('cascade');
             $table->index(array('company_id','servicio_id'));
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
        //
        Schema::table('dates_invoices', function (Blueprint $table) {
            $table->dropForeign('dates_invoices_categoria_id_foreign');
        });
        Schema::table('dates_estimates', function (Blueprint $table) {
            $table->dropForeign('dates_estimates_categoria_id_foreign');
        });
        Schema::table('invoices', function (Blueprint $table) {
            $table->dropForeign('invoices_avion_id_foreign');
        });
        Schema::table('companys', function (Blueprint $table) {
            $table->dropForeign('companys_pais_id_foreign');
        });
        Schema::create('offers', function (Blueprint $table) {
            $table->increments('id');
            $table->double('precio', 10, 2);
            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companys');
            $table->integer('servicio_id')->unsigned();
            $table->foreign('servicio_id')->references('id')->on('servicios');
            $table->index(array('company_id','servicio_id'));
            $table->timestamps();
        });
        Schema::drop('company_servico');

    }
}
