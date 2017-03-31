<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaOfreceFactura extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
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

        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->integer('plazo');
            $table->date('fecha_vencimiento');
            $table->string('localidad',150);
            $table->string('fbo',150);
            $table->double('categoria', 2, 2);
            $table->double('descuento', 2, 2);
            $table->double('total_descuento', 10, 2)->default(0);
            $table->double('ganancia', 10, 2);
            $table->double('subtotal', 10, 2);
            $table->double('total', 10, 2);
            $table->integer('prove_id');
            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companys')->onDelete('cascade');
            $table->integer('estimate_id')->unsigned();
            $table->foreign('estimate_id')->references('id')->on('estimates')->onDelete('cascade');
            $table->integer('avion_id')->unsigned();
            $table->foreign('avion_id')->references('id')->on('aviones');
            $table->string('informacion',300)->nullable();
            $table->string('resumen',500)->nullable();
            $table->date('fecha_pago')->nullable();
            $table->string('metodo_pago')->nullable();
            $table->date('fecha_anulacion')->nullable();
            $table->enum('estado',[1, 2, 3, 4]);
            $table->timestamps();

        });

        Schema::create('dates_invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_servicio');
            $table->integer('cantidad');
            $table->double('descuento', 2, 2);
            $table->double('precio', 10, 2);
            $table->double('recarga', 10, 2);
            $table->double('subtotal', 10, 2);
            $table->double('subtotal_recarga', 10, 2);
            $table->double('total', 10, 2);
            $table->integer('date_estimate_id')->nullable();
            $table->integer('invoice_id')->unsigned();
            $table->foreign('invoice_id')->references('id')->on('invoices')->onDelete('cascade');
            $table->integer('servicio_id')->unsigned();
            $table->foreign('servicio_id')->references('id')->on('servicios');
            $table->string('descripcion',300)->nullable();
            $table->timestamps();
        });

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
        Schema::dropIfExists('offers');
        Schema::dropIfExists('invoices');
        Schema::dropIfExists('dates_invoices');
    }
}
