<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTrainersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainers', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('First_name')->nullable();
            $table->string('surname')->nullable();
            $table->string('Gender');
            $table->string('Address')->nullable();
            $table->integer('Telephone')->nullable();
            $table->integer('user_id')->unique();   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('trainers');
    }
}
