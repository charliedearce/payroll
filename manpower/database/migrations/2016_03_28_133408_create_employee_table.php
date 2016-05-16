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
            $table->string('path', 999);
            $table->string('emp_id', 999);
            $table->string('lastname', 999);
            $table->string('firstname', 999);
            $table->string('middlename', 999);
            $table->string('email', 999);
            $table->date('birthday');
            $table->string('civilstatus', 999);
            $table->string('phone', 999);
            $table->string('religion', 999);
            $table->string('zipcode', 999);
            $table->string('address', 999);
            $table->string('gender', 999);
            $table->double('basicsalary');
            $table->double('deminis');
            $table->string('taxcon', 999);
            $table->string('ssscon', 999);
            $table->string('philcon', 999);
            $table->string('pagibigcon', 999);
            $table->string('position', 999);
            $table->string('branch', 999);
            $table->string('department', 999);
            $table->date('startdate');
            $table->string('status', 999);
            $table->double('hourlyrate');
            $table->string('tinnum', 999);
            $table->string('philnum', 999);
            $table->string('sssnum', 999);
            $table->string('pagibignum', 999);
            $table->double('sickleave');
            $table->double('vacaleave');
            $table->string('dependent1', 999);
            $table->date('depbday1');
            $table->string('dependent2', 999);
            $table->date('depbday2');
            $table->string('dependent3', 999);
            $table->date('depbday3');
            $table->string('dependent4', 999);
            $table->date('depbday4');
            $table->string('banktype', 999);
            $table->string('banknum', 999);
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
