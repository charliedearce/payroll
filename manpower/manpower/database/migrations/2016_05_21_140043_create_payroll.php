<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayroll extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payroll', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('user_id');
            $table->bigInteger('payroll_num');
            $table->date('from');
            $table->date('to');
            $table->date('trans_date');
            $table->string('type');
            $table->string('description');
            $table->string('employee_position');
            $table->integer('opt_phil');
            $table->integer('opt_sss');
            $table->integer('opt_pagibig');
            $table->integer('opt_tax');
            $table->integer('status');
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
        Schema::drop('payroll');
    }
}
