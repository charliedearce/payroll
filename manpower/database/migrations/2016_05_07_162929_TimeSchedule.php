<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TimeSchedule extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('scheduletime', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('sched_id');
            $table->bigInteger('emp_id');
            $table->Integer('day');
            $table->time('in');
            $table->time('out');
            $table->time('breakin');
            $table->time('breakout');
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
        Schema::drop('scheduletime');
    }
}
