<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->id();
            $table->text('emp_code');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('desigantion');
            $table->string('alernate_number');
            $table->string('father_name');
            $table->string('father_mobile');
            $table->string('permanent_address');
            $table->string('country_id');
            $table->string('region_id');
            $table->string('city_id');
            $table->string('current_address');
            $table->string('joining_date');
            $table->string('pin_code');
            $table->string('gender');
            $table->string('country');
            $table->string('region');
            $table->string('city');
            $table->string('status');
            $table->string('bank_name');
            $table->string('beneficiary_name');
            $table->string('account_number');
            $table->string('branch_name');
            $table->string('ifsc_code');
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
        Schema::dropIfExists('employee');
    }
}
