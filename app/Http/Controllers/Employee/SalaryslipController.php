<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AddSalaryEmp;
use App\Models\Employee;
use DB;
use PDF;

class SalaryslipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{

return view('VCREPORT.employee.index');
}
    public function add_salary_emp(Request $request, $id)


    {
        
        //  $add_salary_emp = DB::table('add_salary_emp')->limit(1)->get();


         $add_salary_emp = DB::table('add_salary_emp')
            ->join('employee', 'add_salary_emp.id', '=', 'employee.id')// joining the employee table , where user_id and contact_user_id are same
            ->select('add_salary_emp.*', 'employee.emp_code')->limit(1)->get();


        // $add_salary_emp = AddSalaryEmp::find($id);
        // return response()->json($add_salary_emp);
    
         // $add_salary_emp = DB::table('add_salary_emp')
        // ->join('add_salary_emp', 'employee.id', '=', 'add_salary_emp.id')
        // ->select('add_salary_emp.*', 'employee.emp_code')->get();
      
        return view('VCREPORT.employee.payslip_pdf',compact('add_salary_emp'));
     
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

      public function dowanloadPDF(Request $request)
    {
        
        $add_salary_emp = DB::table('add_salary_emp')
            ->join('employee', 'add_salary_emp.id', '=', 'employee.id')// joining the employee table , where user_id and contact_user_id are same
            ->select('add_salary_emp.*', 'employee.emp_code')
            ->limit(1)->get();
        view()->share('add_salary_emp',$add_salary_emp);
        if($request->has('download')){
            $pdf = PDF::loadView('payslip_pdf');
            return $pdf->download('filename.pdf');
        }
        return view('VCREPORT.employee.payslip_pdf');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
