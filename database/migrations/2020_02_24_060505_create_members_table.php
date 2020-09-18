<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('first_name')->nullable();
            $table->string('surname')->nullable();
            $table->integer('idnumber')->unsigned();
            $table->string('gender');
            $table->string('address')->nullable();
            $table->integer('telephone')->nullable()-> unsigned();
            $table->date('registration_day')->nullable();
            $table->string('modeofpayment');
            $table->string('membership_type');
            $table->integer('user_id')->unique()->nullable();    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('members');
    }
}
