<?php

namespace App\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function department(Request $request)
    {   
        $search = $request['search'] ?? "";
        if($search != ""){

            $department = Department::where('department', 'LIKE', "%$search%")->get();
        }else{

            $department = Department::all();
        }
            
        $data =compact('department','search');
            
    
        return  view('VCREPORT.Department.department')->with($data);

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
    public function store(Request $request)
    {
        $request  ->validate([
            'department' => 'required',
        ]);

       
        $department = new  Department;

        $department->department = $request['department'];
        $department->save();
        return redirect()->back()->with('status','Department Has Been Added successfully');

  
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
    public function edit(Request $request, $dpt_id)
    {
        $department = Department::find($dpt_id);
        return response()->json([
            'status'=>200,
            'department' => $department,
        ]);
      return view('VCREPORT.Department.department.edit',compact('department'));
    
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
        
            //  echo "<pre>"; print_r($request->all()); 
            //         die('');
        $dpt_id = $request->input('dpt_id');
        $department = Department::find($dpt_id); 
        $department->department = $request->input('department');
        $department->update();
        return redirect()->back()->with('status','Department Has Been Update successfully');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function destroy(Request $request)
 {
    //  echo "<pre>"; print_r($request->all()); 
    //         die('');
   $department = Department::find($request->department)->delete();
    return redirect()->back()->with('status','Department Has Been Delete successfully');
 }
}
