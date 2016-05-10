<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->bigint('user_id');
            $table->string('path');
            $table->string('emp_id');
            $table->string('lastname');
            $table->string('firstname');
            $table->string('middlename');
            $table->string('email');
            $table->date('birthday');
            $table->string('civilstatus');
            $table->string('phone');
            $table->string('religion');
            $table->string('zipcode');
            $table->string('address');
            $table->string('gender');
            $table->double('basicsalary');
            $table->double('deminis');
            $table->string('taxcon');
            $table->string('ssscon');
            $table->string('philcon');
            $table->string('pagibigcon');
            $table->string('position');
            $table->string('branch');
            $table->string('department');
            $table->date('startdate');
            $table->string('status');
            $table->double('hourlyrate');
            $table->string('tinnum');
            $table->string('philnum');
            $table->string('sssnum');
            $table->string('pagibignum');
            $table->double('sickleave');
            $table->double('vacaleave');
            $table->string('dependent1');
            $table->date('depbday1');
            $table->string('dependent2');
            $table->date('depbday2');
            $table->string('dependent3');
            $table->date('depbday3');
            $table->string('dependent4');
            $table->date('depbday4');
            $table->string('banktype');
            $table->string('banknum');
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
        Schema::drop('employee');
    }
}
