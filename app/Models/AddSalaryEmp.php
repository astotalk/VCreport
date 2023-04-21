<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;

class AddSalaryEmp extends Model
{
    use HasFactory;
    protected $table = 'add_salary_emp';
    protected $fillable =[
        'name',
        'desigantion',
        'project_name',
        'adhar_no',
        'pan_no',
        'uan_no',
        'pf_no',
        'Esi_no',
        'father_name',
        'region',
        'joining_date',
        'bank_name',
        'account_number',
        'basic',
        'hra_no',
        'cca',
        'Provident_funt',
        'advance',
        'esi_amount',
        'special_all',
        'monthly_bonus',
        'other_all',
        'Professional_tax',
        'lop_amounts',
        'lwa_amount',
        'total_earninig',
        'total_deductions',
        'salary_area',
        'net_anmouts',
        'Provident_funts',
        'working_day',
        'esi_amounts',
        'days_payable',
        'accident_insurance',
        'leave_token',
        'loass_of_pay',
        'total_contribution',
        'monthly_ctc',
       
    ];
    public function employees(){
        return $this->hasMany(Employee::class, 'emp_code', 'id');
    }
}
