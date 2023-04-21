<?php

namespace App\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Designation;


class DesignatioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function designation(Request $request)
    {
        $search = $request['search'] ?? "";
        if($search != ""){

            $desigantion = Designation::where('desigantion', 'LIKE', "%$search%")->get();
        }else{

            $desigantion = Designation::all();
        }
        $data =compact('desigantion','search');
      
        return  view('VCREPORT.Department.designation')->with($data);
        }


        
    public function edit(Request $request, $dig_id)
  
        {
            $desigantion = Designation::find($dig_id);

            return response()->json([
                'status'=>200,
                'desigantion' => $desigantion,
            ]);
    
            return view('VCREPORT.Department.designation.edit',compact('desigantion'));
        }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function addstoress(Request $request)
    {
        $request  ->validate([
            'desigantion' => 'required',
        ]);

        $desigantion = new  Designation;

        $desigantion->desigantion = $request['desigantion'];
        $desigantion->save();
        return redirect()->back()->with('status','Designation Has Been Added successfully');

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

    
    public function update(Request $request)
    {
            $dig_id = $request->input('dig_id');
            $desigantion = Designation::find($dig_id); 
            $desigantion->desigantion = $request->input('desigantion');
            $desigantion->update();
        return redirect()->back()->with('status','Designation Has Been updated successfully');
        }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
                        
    {
        $desigantion = Designation::find($request->desigantion)->delete();
     
        return redirect()->back()->with('status','Designation Has Been delete successfully');

        
  }
}
