<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Helpers\Helpers;
use App\Models\Department;
use App\Models\Designation;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function employee(Request $request)
    {
        $DesignationList = Designation::all();
        $search = $request['search'] ?? "";
        if($search != ""){
           
            $employee = Employee::where('name', 'LIKE', "%$search%")->get();
        }else{
           
      
            $employee = Employee::all();
        }
            
        $data =compact('employee','search','DesignationList');

        return view('VCREPORT.Employee.employee')->with($data);


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
    public function employestrore(Request $request)
    {
       
        //   echo "<pre>"; print_r($request->all()); 
        //     die('');
      

            $emp_code =  Helpers::IDGenerators(new Employee, 'emp_code', 5, 'LTS-EMP');
          
            $employee  = new Employee;
            $employee->emp_code = $emp_code;
            $employee->name = $request->input('name');
            $employee->email = $request->input('email');
            $employee->phone = $request->input('phone');
            $employee->alernate_number = $request->input('alernate_number');
            $employee->desigantion = $request->input('desigantion');
            $employee->father_name = $request->input('father_name');
            $employee->father_mobile = $request->input('father_mobile');
            $employee->gender = $request->input('gender');
            $employee->joining_date = $request->input('joining_date');
            $employee->current_address = $request->input('current_address');
            $employee->country = $request->input('country');
            $employee->region = $request->input('region');
            $employee->city = $request->input('city');
            $employee->permanent_address = $request->input('permanent_address');
            $employee->status = $request->input('status');
            $employee->pin_code = $request->input('pin_code');
            $employee->bank_name = $request->input('bank_name');
            $employee->account_number = $request->input('account_number');
            $employee->beneficiary_name = $request->input('beneficiary_name');
            $employee->branch_name = $request->input('branch_name');
            $employee->ifsc_code = $request->input('ifsc_code');
            $employee->save();


            return redirect()->back()->with('status','Employee Has Been Create successfully');

        
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $employee = Employee::find($id );
        return response()->json([
            'status'=>200,
            'employee' => $employee,
        ]);

        return view('VCREPORT.Employee.edit',compact('employee'));
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
            $employee = Employee::find($id);  
            $employee->name = $request->input('name');
            $employee->email = $request->input('email');
            $employee->phone = $request->input('phone');
            $employee->alernate_number = $request->input('alernate_number');
            $employee->father_name = $request->input('father_name');
            $employee->father_mobile = $request->input('father_mobile');
            $employee->joining_date = $request->input('joining_date');
            $employee->gender = $request->input('gender');
            $employee->pin_code = $request->input('pin_code');
            $employee->permanent_address = $request->input('permanent_address');
            $employee->country_id = $request->input('country_id');
            $employee->region_id = $request->input('region_id');
            $employee->city_id = $request->input('city_id');
            $employee->current_address = $request->input('current_address');
            $employee->status = $request->input('status');
            $employee->bank_name = $request->input('bank_name');
            $employee->beneficiary_name = $request->input('beneficiary_name');
            $employee->account_number = $request->input('account_number');
            $employee->branch_name = $request->input('branch_name');
            $employee->ifsc_code = $request->input('ifsc_code');
            $employee->update(); 
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
