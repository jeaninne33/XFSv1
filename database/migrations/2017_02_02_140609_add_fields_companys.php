<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsCompanys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('companys', function (Blueprint $table) {
        //
            $table->dropColumn('relacion');
            $table->enum('tipo',['client','prove', 'cp']);
            $table->string('cargo', 50)->nullable();
            $table->string('categoria',50)->nullable();
            $table->string('servicio_disp',100)->nullable();
            $table->dropColumn('estado');
            $table->dropColumn('pais');
            $table->integer('estado_id')->unsigned();
            $table->foreign('estado_id')->references('id')->on('estados')
            ->onDelete('cascade');
        });
    }

    /**$table->dropColumn('estado', 500);
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('companys', function (Blueprint $table) {
            //$table->enum('relacion',['Cliente','Proveedor', 'Cliente/Proveedor']);
            $table->enum('relacion',['Cliente','Proveedor', 'Cliente/Proveedor']);
            $table->dropColumn('tipo');
            $table->dropColumn('cargo');
            $table->dropColumn('categoria');
            $table->dropColumn('servicio_disp');
            $table->string('estado', 500)->nullable();
            $table->string('pais', 50)->nullable();
            $table->dropForeign('companys_estado_id_foreign');
        });
    }
}
