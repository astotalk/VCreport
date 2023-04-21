<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddSalaryEmpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_salary_emp', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('desigantion');
            $table->string('project_name');
            $table->string('adhar_no');
            $table->string('pan_no');
            $table->string('uan_no');
            $table->string('pf_no');
            $table->string('Esi_no');
            $table->string('father_name');
            $table->string('region');
            $table->string('joining_date');
            $table->string('bank_name');
            $table->string('account_number');
            $table->string('basic');
            $table->string('hra_no');
            $table->string('cca');
            $table->string('Provident_funt');
            $table->string('advance');
            $table->string('esi_amount');
            $table->string('special_all');
            $table->string('monthly_bonus');
            $table->string('other_all');
            $table->string('Professional_tax');
            $table->string('lop_amounts');
            $table->string('lwa_amount');
            $table->string('total_earninig');
            $table->string('total_deductions');
            $table->string('salary_area');
            $table->string('net_anmouts');
            $table->string('Provident_funts');
            $table->string('working_day');
            $table->string('esi_amounts');
            $table->string('days_payable');
            $table->string('accident_insurance');
            $table->string('leave_token');
            $table->string('loass_of_pay');
            $table->string('total_contribution');
            $table->string('monthly_ctc');
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
        Schema::dropIfExists('add_salary_emp');
    }
}
