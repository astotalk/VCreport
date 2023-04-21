<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\AddSalaryEmp;
use PDF;
use DB;
use App\PDFGenerate;

class EmployeeSalaryslipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function empsalaryslip(Request $request)
    {

        $EmployeeList = Employee::all();
        $search = $request['search'] ?? "";
        if($search != ""){
           
            $add_salary_emp = AddSalaryEmp::where('name', 'LIKE', "%$search%")->get();
        }else{
           
      
            $add_salary_emp = AddSalaryEmp::all();


            // $add_salary_emp = DB::table('add_salary_emp')
            // ->join('employee', 'add_salary_emp.id', '=', 'employee.id')// joining the employee table , where user_id and add_salary_emp are same
            // ->select('add_salary_emp.*', 'employee.emp_code')->get();
        }
        $data =compact('add_salary_emp','EmployeeList','search');
    
        return view('VCREPORT.employee.empsalaryslip')->with($data);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add_salary_store(Request $request)

    {
        
      
    //   echo "<pre>"; print_r($request->all()); 
        //     die('');
          
        $salary_slip  = new AddSalaryEmp;
        $salary_slip->name = $request->input('name');
        $salary_slip->desigantion = $request->input('desigantion');
        $salary_slip->project_name = $request->input('project_name');
        $salary_slip->adhar_no = $request->input('adhar_no');
        $salary_slip->pan_no = $request->input('pan_no');
        $salary_slip->uan_no = $request->input('uan_no');
        $salary_slip->pf_no = $request->input('pf_no');
        $salary_slip->Esi_no = $request->input('Esi_no');
        $salary_slip->father_name = $request->input('father_name');
        $salary_slip->region = $request->input('region');
        $salary_slip->joining_date = $request->input('joining_date');
        $salary_slip->bank_name = $request->input('bank_name');
        $salary_slip->account_number = $request->input('account_number');
        $salary_slip->basic = $request->input('basic');
        $salary_slip->hra_no = $request->input('hra_no');
        $salary_slip->cca = $request->input('cca');
        $salary_slip->Provident_funt = $request->input('Provident_funt');
        $salary_slip->advance = $request->input('advance');
        $salary_slip->esi_amount = $request->input('esi_amount');
        $salary_slip->special_all = $request->input('special_all');
        $salary_slip->monthly_bonus = $request->input('monthly_bonus');
        $salary_slip->other_all = $request->input('other_all');
        $salary_slip->Professional_tax = $request->input('Professional_tax');
        $salary_slip->lop_amounts = $request->input('lop_amounts');
        $salary_slip->lwa_amount = $request->input('lwa_amount');
        $salary_slip->total_earninig = $request->input('total_earninig');
        $salary_slip->total_deductions = $request->input('total_deductions');
        $salary_slip->salary_area = $request->input('salary_area');
        $salary_slip->net_anmouts = $request->input('net_anmouts');
        $salary_slip->Provident_funts = $request->input('Provident_funts');
        $salary_slip->working_day = $request->input('working_day');
        $salary_slip->esi_amounts = $request->input('esi_amounts');
        $salary_slip->days_payable = $request->input('days_payable');
        $salary_slip->accident_insurance = $request->input('accident_insurance');
        $salary_slip->leave_token = $request->input('leave_token');
        $salary_slip->loass_of_pay = $request->input('loass_of_pay');
        $salary_slip->total_contribution = $request->input('total_contribution');
        $salary_slip->monthly_ctc = $request->input('monthly_ctc');
        $salary_slip->save();


        return redirect()->back()->with('status','Employee Has Been Create successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


     public function salaryslipshow(Request $request,$id)
     {

         $add_salary_emp  = AddSalaryEmp::find($id);
 
         return response()->json($add_salary_emp);
         
         
     }

public function payslip_pdf(Request $request ,$id)
	{
		$items = DB::table("add_salary_emp")->where('id', $request->tblid)->get();
		view()->share('add_salary_emp',$items);
	
	
		if($request->has('download')){
			$pdf = PDF::loadView('payslip_pdf');
			return $pdf->download('payslip-pdf.pdf');
		}
	
	
		return view('VCREPORT.employee.payslip_pdf');
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $add_salary_emp = AddSalaryEmp::find($id );
        return response()->json([
            'status'=>200,
            'add_salary_emp' => $add_salary_emp,
        ]);

        return view('VCREPORT.empsalaryslip.edit',compact('add_salary_emp'));
    }

   


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
            //    echo "<pre>"; print_r($request->all()); 
            // die('');
      
        $id  = $request->input('id');
        $salary_slip = AddSalaryEmp::find($id);  
        $salary_slip->name = $request->input('name');
        $salary_slip->desigantion = $request->input('desigantion');
        $salary_slip->adhar_no = $request->input('adhar_no');
        $salary_slip->pan_no = $request->input('pan_no');
        $salary_slip->uan_no = $request->input('uan_no');
        $salary_slip->pf_no = $request->input('pf_no');
        $salary_slip->Esi_no = $request->input('Esi_no');
        $salary_slip->father_name = $request->input('father_name');
        $salary_slip->region = $request->input('region');
        $salary_slip->joining_date = $request->input('joining_date');
        $salary_slip->bank_name = $request->input('bank_name');
        $salary_slip->account_number = $request->input('account_number');
        $salary_slip->basic = $request->input('basic');
        $salary_slip->hra_no = $request->input('hra_no');
        $salary_slip->cca = $request->input('cca');
        $salary_slip->Provident_funt = $request->input('Provident_funt');
        $salary_slip->advance = $request->input('advance');
        $salary_slip->esi_amount = $request->input('esi_amount');
        $salary_slip->special_all = $request->input('special_all');
        $salary_slip->monthly_bonus = $request->input('monthly_bonus');
        $salary_slip->other_all = $request->input('other_all');
        $salary_slip->Professional_tax = $request->input('Professional_tax');
        $salary_slip->lop_amounts = $request->input('lop_amounts');
        $salary_slip->lwa_amount = $request->input('lwa_amount');
        $salary_slip->total_earninig = $request->input('total_earninig');
        $salary_slip->total_deductions = $request->input('total_deductions');
        $salary_slip->salary_area = $request->input('salary_area');
        $salary_slip->net_anmouts = $request->input('net_anmouts');
        $salary_slip->Provident_funts = $request->input('Provident_funts');
        $salary_slip->working_day = $request->input('working_day');
        $salary_slip->esi_amounts = $request->input('esi_amounts');
        $salary_slip->days_payable = $request->input('days_payable');
        $salary_slip->accident_insurance = $request->input('accident_insurance');
        $salary_slip->leave_token = $request->input('leave_token');
        $salary_slip->loass_of_pay = $request->input('loass_of_pay');
        $salary_slip->total_contribution = $request->input('total_contribution');
        $salary_slip->monthly_ctc = $request->input('monthly_ctc');
        $salary_slip->update();
     return redirect()->back()->with('status','Employee Has Been Update successfully');
    
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
