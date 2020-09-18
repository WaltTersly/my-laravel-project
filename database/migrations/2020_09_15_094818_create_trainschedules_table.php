<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainschedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainschedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('First_name')->nullable();
            $table->string('surname')->nullable();
            $table->integer('Daysactive')->nullable();
            $table->time('Time_in')->nullable();
            $table->time('Time_out')->nullable();
            $table->date('Day1')->nullable();
            $table->date('Day2')->nullable();
            $table->date('Day3')->nullable();
            $table->date('Day4')->nullable();
            $table->integer('Daysoffweekly')->nullable();
            $table->date('Day_off_1')->nullable();
            $table->date('Day_off_2')->nullable();
            $table->date('Day_off_3')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trainschedules');
    }
}
