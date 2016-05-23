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
            $table->bigInteger('user_id');
            $table->text('path', 999);
            $table->text('emp_id', 999);
            $table->text('lastname', 999);
            $table->text('firstname', 999);
            $table->text('middlename', 999);
            $table->text('email', 999);
            $table->date('birthday');
            $table->text('civilstatus', 999);
            $table->text('phone', 999);
            $table->text('religion', 999);
            $table->text('zipcode', 999);
            $table->text('address', 999);
            $table->text('gender', 999);
            $table->double('basicsalary');
            $table->double('deminis');
            $table->text('taxcon', 999);
            $table->text('ssscon', 999);
            $table->text('philcon', 999);
            $table->text('pagibigcon', 999);
            $table->text('position', 999);
            $table->text('type', 999);
            $table->text('branch', 999);
            $table->text('department', 999);
            $table->date('startdate');
            $table->text('status', 999);
            $table->double('hourlyrate');
            $table->text('tinnum', 999);
            $table->text('philnum', 999);
            $table->text('sssnum', 999);
            $table->text('pagibignum', 999);
            $table->double('sickleave');
            $table->double('vacaleave');
            $table->text('dependent1', 999);
            $table->date('depbday1');
            $table->text('dependent2', 999);
            $table->date('depbday2');
            $table->text('dependent3', 999);
            $table->date('depbday3');
            $table->text('dependent4', 999);
            $table->date('depbday4');
            $table->text('banktype', 999);
            $table->text('banknum', 999);
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
        Schema::drop('employees');
    }
}
