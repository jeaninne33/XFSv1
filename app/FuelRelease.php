<?php

namespace XFS;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Migrations\Migration;
class FuelRelease extends Migration
{
    public function up()
    {
        Schema::create('fuelrelease',function (Blueprint $table)
        {
                $table->increments('id');
                $table->string('estimate_id')->unsigned();
                $table->foreign('estimate_id')
                    ->references('id')->on('estimates')
                    ->onDelete('cascade');
                $table->string('flight_purpose',70);
                $table->string('operator',30);
                $table->string('ref',30);
                $table->string('phone',30);
                $table->string('flight_number',30);
                $table->date('eta',70);
                $table->date('etd',70);
                $table->string('handling',70);
                $table->string('into_plane',70);
                $table->string('cf_card',50);
                
                $table->timestamps();
        });
    }
    public function down()
    {
        Schema::drop('fuelrelease');
    }
}
