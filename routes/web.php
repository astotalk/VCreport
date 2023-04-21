<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Employee;
use App\Http\Controllers\Login;

use App\Http\Controllers\Department;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers\Dashboard\{
    DashboardController,
};
use App\Http\Controllers\Employee\{
    EmployeeController,
    EmployeeSalaryslipController,
    SalaryslipController
};  
use App\Http\Controllers\Login\{
    LoginController,
    LogoutController,
}; 
use App\Http\Controllers\Department\{
    DepartmentController,
    DesignatioController
};

Route::get('/', function () {
    return view('welcome');
});

    Route ::group(['meddleware'=>'/VCREPORT/login'], function(){  
    Route::get('/', [LoginController::class,'getlogin'])->name('getlogin');
    Route::get('/VCREPORT/login', [LoginController::class,'getlogin'])->name('getlogin');
    Route::post('/VCREPORT/login', [DashboardController::class,'postlogin'])->name('postlogin');
    Route::get('/VCREPORT/dashboard', [DashboardController::class,'dashboard'])->name('dashboard');
    Route::get('/VCREPORT/logout', [DashboardController::class,'logout'])->name('logout');
    Route::get('/VCREPORT/dashboard', [DashboardController::class,'dashboard'])->name('dashboard');
    Route::get ('/Employee/employee', [EmployeeController::class,'employee'])->name('employee');
    Route::post('/Employee/employestrore', [EmployeeController::class, 'employestrore'])->name('employestrore'); 
    Route::get('/employee/edit/{id}', [EmployeeController::class,'edit'])->name('edit');
    Route::put('/employee/update/', [EmployeeController::class,'update'])->name('update');
    Route::get('/employee/destroy/{id}', [EmployeeController::class,'destroy'])->name('destroy');
    Route::get ('/Employee/empsalaryslip', [EmployeeSalaryslipController::class,'empsalaryslip'])->name('empsalaryslip');
    Route::post('/Employee/add_salary_store', [EmployeeSalaryslipController::class, 'add_salary_store'])->name('add_salary_store'); 
    Route::get('/empsalaryslip/edit/{id}', [EmployeeSalaryslipController::class,'edit'])->name('edit');
    Route::put('/empsalaryslip/update/', [EmployeeSalaryslipController::class,'update'])->name('update');
    Route::get('/empsalaryslip/salaryslipshow/{id}', [EmployeeSalaryslipController::class,'salaryslipshow'])->name('salaryslipshow');

    Route::get('/Employee/add_salary_emp/{id}', [SalaryslipController::class,'add_salary_emp'])->name('add_salary_emp');
    Route::get('/Employee/payslip_pdf', [SalaryslipController::class,'dowanloadPDF'])->name('payslip_pdf');
 
    Route::get('/Department/department', [DepartmentController::class,'department'])->name('department');
    Route::POST('/department/store', [DepartmentController::class,'store'])->name('store');
    Route::get('/department/edit/{id}', [DepartmentController::class,'edit'])->name('edit');
    Route::put('/department/update/', [DepartmentController::class,'update'])->name('update');
    Route::POST('/department/destroy/', [DepartmentController::class,'destroy'])->name('destroy');

///////////////////////////////Designation///////////////////////////////

    Route::get('/Department/designation', [DesignatioController::class,'designation'])->name('designation');
    Route::POST('/designation/addstoress', [DesignatioController::class,'addstoress'])->name('addstoress');
    Route::get('/designation/edit/{id}', [DesignatioController::class,'edit']);
    Route::put('/designation/update/', [DesignatioController::class,'update'])->name('update');
    Route::POST('/designation/destroy/', [DesignatioController::class,'destroy'])->name('destroy');
    });