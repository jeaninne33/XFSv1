<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuelreleasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fuelreleases', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->string('flight_purpose',70);
            $table->string('operator',70)->nullable();
            $table->string('ref',70);
            $table->string('flight_number',70);
            $table->dateTime('eta');
            $table->dateTime('etd');
            $table->string('handling',70)->nullable();
            $table->string('cf_card',70);
            $table->string('into_plane',70);
            $table->string('into_plane_phone',70)->nullable();
            $table->integer('qty');
            $table->integer('estimate_id')->unsigned();
            $table->foreign('estimate_id')->references('id')->on('estimates')->onDelete('cascade');
            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companys')->onDelete('cascade');
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
        Schema::dropIfExists('fuelreleases');
    }
}
