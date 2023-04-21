<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AddSalaryEmp;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employee';
    protected $fillable =[
        'name',
        'emp_code',
        'email',
        'phone',
        'alernate_number',
        'father_name',
        'father_mobile',
        'gender', 
        'desigantion',
        'current_address',
        'country',
        'region',
        'city',
        'permanent_address',
        'country_id',
        'region_id',
        'city_id',
        'pin_code',
        'joining_date',
        'status',
        'bank_name',
        'beneficiary_name',
        'account_number',
        'branch_name',
        'ifsc_code',



    ];

    public function add_salary_emp(){

        return $this->belongsTo(AddSalaryEmp::class);
    }
}
