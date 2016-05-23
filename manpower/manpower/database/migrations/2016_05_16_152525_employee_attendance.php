<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EmployeeAttendance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('attendance', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('payroll_id');
            $table->bigInteger('emp_id');
            $table->bigInteger('user_id');
            $table->Integer('shift');
            $table->date('date');
            $table->time('in');
            $table->time('out');
            $table->time('breakin');
            $table->time('breakout');
            $table->time('overtime');
            $table->Integer('daytype');
            $table->Integer('leave');
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
        Schema::drop('attendance');
    }
}
