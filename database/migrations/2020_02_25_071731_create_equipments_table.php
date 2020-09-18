<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEquipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipments', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('Equipmentname')->nullable();
            $table->string('State_of_equipment');
            $table->string('Equipment_location');
            $table->date('Date_servicing')->nullable();
            $table->date('Date_replacing')->nullable();
            $table->integer('number_in_store')->nullable();
            $table->integer('Price')->nullable();
            $table->string('Type');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('equipments');
    }
}
