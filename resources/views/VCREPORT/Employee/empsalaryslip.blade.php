@extends('VCREPORT.layouts.master')
@section('content-header')


    <div class="midde_cont">
        <div class="container-fluid">
           <div class="row column_title">
              <div class="col-md-12">
                 <div class="page_title">
                    <h2>Salary Department</h2>
                 </div>
              </div>
           </div>
           <div class="row column1">
            <div class="col-md-12">
                  <div class="white_shd full margin_bottom_30">
                      <div class="full graph_head ">
                          <div class="heading1 margin_0">
                          <h2>LTS Salary Department</h2>
                      </div>
                  </div>
                  <div class="container py-5">
                  <div class="row">
                      <div class="col-12">
                      @if(session('status'))
                          <div class="alert alert-success">{{session('status')}}</div>
                          @endif
                      <div id="success_message"></div>
                      <div class="card mt-3">
                          <div class="card-header">
                              <!-- SEARCH BY TASK START -->
                              <nav class="navbar navbar-light bg-light">
                              <form method="get"  class="form-inline">
                                      <a class="btn btn-danger text-white" href="{{ route('dashboard') }}" role="button">Back</a> &nbsp;&nbsp;
                                  <input  type="search"  name="search" id="" class="form-control" placeholder="Search Employee"  >
                                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                              </form>
                              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                                  + Add Salary
                              </button>
                          </div>
                   <!--table start-->
                   
                   <div class="card-body">
                      <table class="table table-bordered">
                      <thead class="thead-pink" >
                        <tr>
                           <th><b>S.No</b></th>
                           <th><b>Emp Name</b></th>
                           <th><b>Desigantion</b></th> 
                           <th><b>Project Name</b></th> 
                           <th><b>Join Date </b></th> 
                           <th><b>Salary</b></th>
                           <th><b>Payslip</b></th>  
                           <th style="text-align: center;"><b> Action</b></th>
                        </tr>
                      </thead>
                      <tbody>
                        @if(!empty($add_salary_emp))
                        @foreach($add_salary_emp as $salaryslip)
                        <tr>
                                <td> {{$salaryslip->id}}</td>
                                <th>{{$salaryslip->name}}</th>
                                <th>{{$salaryslip->desigantion}}</th>
                                <th>{{$salaryslip->project_name}}</th>
                                <th>{{$salaryslip->joining_date}}</th>
                                <th>{{$salaryslip->monthly_ctc}}</th>
                                <th><a  class="btn btn-info" href="{{url('/Employee/add_salary_emp', $salaryslip->id)}}" ><i class="fa fa-file-pdf-o"></i>Generate Payslip PDF</a></th> 
                                 <td>
                                 <button type="button"    data-url="{{ url('/empsalaryslip/salaryslipshow', $salaryslip->id)}}" id="show-user"  class="btn btn-success showbtn btn-sm">View</button>                 
                                 <button type="button"  value="{{$salaryslip->id}}" data-bs-toggle="modal" class="btn  btn-outline-danger editbtn btn-sm">EDIT</button>  
                                </td>
                               </tr>
                            @endforeach
                            @endif
                      </tbody>
                      </table>
                     </div>       
                  </div>   
                  
                
                <!-- Modal -->
          <div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
              <Form    action="{{route('add_salary_store')}}"  method="POST" >
                  @csrf
                      <div class="modal-header">
                      <h5 class="modal-title" id="myModalLabel">Add Salary</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                      <div class="modal-body">
                          <div class="form-group">
                             
    
                                 <div class="row">
                                    <div class="col-4">
                                        <label for="emp_id" class="form-label">Select Employee * </label>
                                          <select name="name" class="name   form-control"  id="name1">
                                            @foreach($EmployeeList as $row)
                                            <option value="{{$row->name}}">{{$row->name }}</option>
                                            @endforeach
                                         </select>
                                    </div>
                                    <div class="col-4">
                                        <label for="emp_id" class="form-label">Select Desigantion </label>
                                          <select name="desigantion" class="desigantion   form-control"  id="desigantion1" >
                                            @foreach($EmployeeList as $row)
                                            <option value="{{$row->desigantion}}">{{$row->desigantion}}</option>
                                            @endforeach
                                         </select>
                                    </div>
                                    <div class="col-4">
                                        <label for="project_name" class="form-label">Project Name <span style="color: red">*</span></label>
                                        <input type="text" class="project_name form-control" name="project_name"    required>
                                    </div>
                                </div>
                                <br>
                                  <div class="row g-3">
                                      <div class="col-6">
                                          <label for="adhar_no" class="form-label">Aadhar No<span style="color: red">*</span></label>
                                          <input type="text" class="adhar_no form-control" name="adhar_no"    required>
                                      </div>
                                      <div class="col-6">
                                          <label for="text" class="form-label">Pan No <span style="color: red">*</span></label>
                                          <input type="text"  class="pan_no form-control"  maxlength="10" name="pan_no"  required>
                                      </div>
                                    </div><br>
                                    <div class="row g-3">
                                      <div class="col-6">
                                          <label for="uan_no" class="form-label">UAN No <span style="color: red">*</span></label>
                                          <input type="text"  class="uan_no form-control"  name="uan_no" required>
                                      </div>
                                      <div class="col-6">
                                        <label for="pf_no" class="form-label">PF No <span style="color: red">*</span></label>
                                        <input type="text"  class="pf_no form-control"   name="pf_no" required>
                                    </div>
                                  </div>
                                  <br>
                                  <div class="row g-3">
                                    <div class="col-6">
                                        <label for="Esi_no" class="form-label">ESI No <span style="color: red">*</span></label>
                                            <input type="text" class="Esi_no form-control" name="Esi_no" maxlength="10" placeholder="Enter ESI No " required>
                                    </div>
                                      <div class="col-6">
                                          <label for="text" class="form-label">Father Name <span style="color: red">*</span></label>
                                          <select name="father_name" class="father_name   form-control"  id="pf_no" >
                                            @foreach($EmployeeList as $row)
                                            <option value="{{$row->father_name}}">{{$row->father_name}}</option>
                                            @endforeach
                                         </select>
                                      </div>
                                  </div>
                                <br>
                                  <div class="row g-3">
                                      <div class="col-6">
                                          <label for="text" class="form-label">Loaction <span style="color: red">*</span></label>
                                          <select name="region" class="region   form-control"  id="region1" >
                                            @foreach($EmployeeList as $row)
                                            <option value="{{$row->region}}">{{$row->region}}</option>
                                            @endforeach
                                         </select>
                                      </div>
                                      <div class="col-6">
                                        <label for="text" class="form-label">Date Of Joining <span style="color: red">*</span></label>
                                        <select name="joining_date" class="joining_date   form-control"  id="joining_date1" >
                                            @foreach($EmployeeList as $row)
                                            <option value="{{$row->joining_date}}">{{$row->joining_date}}</option>
                                            @endforeach
                                         </select>
                                    </div>
                                  </div> 
                                  <br>
                                  <div class="row g-3">
                                    <div class=" col-6">
                                        <label for="text" class="form-label">Account Number <span style="color: red">*</span></label>
                                        <select name="account_number" class="account_number   form-control"  id="account_number1" >
                                            @foreach($EmployeeList as $row)
                                            <option value="{{$row->account_number}}">{{$row->account_number}}</option>
                                            @endforeach
                                         </select>
                                    </div>
                                    <div class=" col-6">
                                        <label for="text" class="form-label">Bank Name <span style="color: red">*</span></label>
                                        <select name="bank_name" class="bank_name   form-control"  id="bank_name1" >
                                            @foreach($EmployeeList as $row)
                                            <option value="{{$row->bank_name}}">{{$row->bank_name}}</option>
                                            @endforeach
                                         </select>
                                    </div>
                                </div> 
                                 <br>              
                              <br>   
                                  
                                                 
          <!--Bank Details Start-->
                              <fieldset class="scheduler-border">
                                  <legend class="scheduler-border mt-2">EARNINGS  // DEDUCTIONS</legend>
                                  <div class="row">
                                      <div class="col mt-3">
                                          <div class="row g-3">
                                              <div class="col-4">
                                                  <label for="text" class="form-label">BASIC<span style="color: red">*</span></label>
                                                  <input type="text" class="basic form-control" name="basic" placeholder="Enter basic" required>
                                              </div>
                                              <div class="col-4">
                                                  <label for="text" class="form-label">HRA <span style="color: red">*</span></label>
                                                  <input type="text" class="hra_no form-control" name="hra_no">
                                              </div>
                                              <div class="col-4">
                                                <label for="text" class="form-label">CCA <span style="color: red">*</span></label>
                                                <input type="text" class="cca form-control" name="cca">
                                            </div>
                                          </div><br>
          
                                          <div class="row g-3">
                                              <div class="col-4">
                                                  <label for="text" class="form-label">Provident Funt<span style="color: red">*</span></label>
                                                  <input type="text" class="Provident_funt form-control" name="Provident_funt" required>
                                              </div>
          
                                              <div class="col-4">
                                                  <label for="text" class="form-label">Advance <span style="color: red">*</span></label>
                                                  <input type="text" class="advance form-control" name="advance">
                                              </div>
          
                                              <div class="col-4">
                                                  <label for="text" class="form-label">ESI <span style="color: red">*</span></label>
                                                  <input type="text" class="esi_amount form-control" name="esi_amount"  required>
                                              </div>
                                          </div><br>
                                          <div class="row g-3">
                                            <div class="col-4">
                                                <label for="text" class="form-label">Special Allowance<span style="color: red">*</span></label>
                                                <input type="text" class="special_all form-control" name="special_all" required>
                                            </div>
                                            <div class="col-4">
                                                <label for="text" class="form-label">Monthly Bonus <span style="color: red">*</span></label>
                                                <input type="text" class="monthly_bonus form-control" name="monthly_bonus">
                                            </div>
                                            <div class="col-4">
                                                <label for="text" class="form-label">Other Allowance <span style="color: red">*</span></label>
                                                <input type="text" class="other_all form-control" name="other_all"  required>
                                            </div>
                                          </div><br>
          
                                          <div class="row g-3">
                                              <div class="col-4">
                                                  <label for="text" class="form-label">Professional Tax<span style="color: red">*</span></label>
                                                  <input type="text" class="Professional_tax form-control" name="Professional_tax" required>
                                              </div>
          
                                              <div class="col-4">
                                                  <label for="text" class="form-label">LWF <span style="color: red">*</span></label>
                                                  <input type="text" class="lwa_amount form-control" name="lwa_amount">
                                              </div>
          
                                              <div class="col-4">
                                                  <label for="text" class="form-label">LOP <span style="color: red">*</span></label>
                                                  <input type="text" class="lop_amounts form-control" name="lop_amounts"  required>
                                              </div>
                                          </div><br>
                                          <div class="row g-3">
                                            <div class="col-3">
                                                <label for="text" class="form-label">TOTAL EARNINGS<span style="color: red">*</span></label>
                                                <input type="text" class="total_earninig form-control" name="total_earninig" required>
                                            </div>
        
                                            <div class="col-3">
                                                <label for="text" class="form-label">TOTAL DEDUCATIONS <span style="color: red">*</span></label>
                                                <input type="text" class="total_deductions form-control" name="total_deductions">
                                            </div>
        
                                            <div class="col-3">
                                                <label for="text" class="form-label">Salary in words<span style="color: red">*</span></label>
                                                <input type="text" class="salary_area form-control" name="salary_area"  required>
                                            </div>
                                            <div class="col-3">
                                                <label for="text" class="form-label">NET PAYABLE <span style="color: red">*</span></label>
                                                <input type="text" class="net_anmouts form-control" name="net_anmouts"  required>
                                            </div>
                                        </div>
                                      </div>
                                  </div>
                              </fieldset>

                              <fieldset class="scheduler-border">
                                <legend class="scheduler-border mt-2">EMPLOYER'S CONTRIBUTION  // LEAVE DETAILS</legend>
                                <div class="row">
                                    <div class="col mt-3">
                                        <div class="row g-3">
                                            <div class="col-6">
                                                <label for="text" class="form-label">Provident Funt<span style="color: red">*</span></label>
                                                <input type="text" class="Provident_funts form-control" name="Provident_funts" required>
                                            </div>
                                            <div class="col-6">
                                              <label for="text" class="form-label">Working Days <span style="color: red">*</span></label>
                                              <input type="text" class="working_day form-control" name="working_day">
                                          </div>
                                        </div>
                                        <br>
                                        <div class="row g-3">
                                            <div class="col-6">
                                                <label for="text" class="form-label">ESI <span style="color: red">*</span></label>
                                                <input type="text" class="esi_amounts form-control" name="esi_amounts"  required>
                                            </div>
                                            <div class="col-6">
                                                <label for="text" class="form-label">Days Payable <span style="color: red">*</span></label>
                                                <input type="text" class="days_payable form-control" name="days_payable"  required>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row g-3">
                                            <div class="col-6">
                                                <label for="text" class="form-label">Accident Insurance<span style="color: red">*</span></label>
                                                <input type="text" class="accident_insurance form-control" name="accident_insurance" required>
                                            </div>
                                            <div class="col-6">
                                                <label for="text" class="form-label">Leave Token <span style="color: red">*</span></label>
                                                <input type="text" class="leave_token form-control" name="leave_token"  required>
                                            </div>
                                        </div><br>
                                        <div class="row g-3">
                                            <div class="col-4">
                                                <label for="text" class="form-label">Loss of Pay <span style="color: red">*</span></label>
                                                <input type="text" class="loass_of_pay form-control" name="loass_of_pay"  required>
                                            </div>
                                            <div class="col-4">
                                                <label for="text" class="form-label">TOTAL CONTRIBUTION <span style="color: red">*</span></label>
                                                <input type="text" class="total_contribution form-control" name="total_contribution" required>
                                            </div>
                                            <div class="col-4">
                                                <label for="text" class="form-label">MONTHLY CTC <span style="color: red">*</span></label>
                                                <input type="text" class="monthly_ctc form-control" name="monthly_ctc"  required>
                                            </div>
                                        </div><br>
                                    </div>
                                </div>
                            </fieldset>
                          </div>
                  <div class="modal-footer">
                      <input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancel">
                      <button type="submit" id="submit"   class="btn btn-primary add_empolyee">Add</button>
                  </div>
              </form>
             </div>
            </div>
          </div>
       </div>
    </div>
    <div class="modal fade" id="EditModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="EditModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
          <Form    action="{{url('/empsalaryslip/update/')}}"  method="POST"  id="editForm"  >
            @method('PUT')  
                        @csrf  
                        <input type="hidden" id="id" name="id"/>
                  <div class="modal-header">
                    <img style="border: 1px solid #ddd;border-radius: 4px;padding: 10px; width: 700px;" src="{{url('lts_assets/images/layout_img/logolts.png')}}" alt="">
                  
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <h5 style="color: royalblue;margin-left: 310px;" class="modal-title" id="myModalLabel">Edit Salaryslip</h5>
                  <div class="modal-body">
                    
                      <div class="form-group">
                         
                       
                             <div class="row">
                                <div class="col-6">
                                    <label for="emp_id" class="form-label">Select Employee * </label>
                                      <select name="name" class="name form-control"  id="name1">
                                        @foreach($EmployeeList as $row)
                                        <option value="{{$row->name}}">{{$row->name}}</option>
                                        @endforeach
                                     </select>
                                </div>
                                <div class="col-6">
                                    <label for="emp_id" class="form-label">Select Desigantion </label>
                                      <select name="desigantion" class="desigantion   form-control"  id="desigantion1" >
                                        @foreach($EmployeeList as $row)
                                        <option value="{{$row->desigantion}}">{{$row->desigantion}}</option>
                                        @endforeach
                                     </select>
                                </div>
                            </div>
                            <br>
                              <div class="row g-3">
                                  <div class="col-6">
                                      <label for="adhar_no" class="form-label">Aadhar No<span style="color: red">*</span></label>
                                      <input type="text" class="adhar_no form-control" name="adhar_no"  id="adhar_no1"  required>
                                  </div>
      
                                  <div class="col-6">
                                      <label for="text" class="form-label">Pan No <span style="color: red">*</span></label>
                                      <input type="text"  class="pan_no form-control"  maxlength="10" name="pan_no"  id="pan_no1" required>
                                  </div>
                                </div><br>
                                <div class="row g-3">
                                  <div class="col-6">
                                      <label for="uan_no" class="form-label">UAN No <span style="color: red">*</span></label>
                                      <input type="text"  class="uan_no form-control"  name="uan_no"  id="uan_no1" required>
                                  </div>
                                  <div class="col-6">
                                    <label for="pf_no" class="form-label">PF No <span style="color: red">*</span></label>
                                    <input type="text"  class="pf_no form-control"   name="pf_no" id="pf_no1" required>
                                </div>
                              </div>
                              <br>
                              <div class="row g-3">
                                <div class="col-6">
                                    <label for="Esi_no" class="form-label">ESI No <span style="color: red">*</span></label>
                                        <input type="text" class="Esi_no form-control" name="Esi_no" id="Esi_no1"  placeholder="Enter ESI No " required>
                                </div>

                                  <div class="col-6">
                                      <label for="text" class="form-label">Father Name <span style="color: red">*</span></label>
                                      <select name="father_name" class="father_name   form-control"  id="father_name1" >
                                        @foreach($EmployeeList as $row)
                                        <option value="{{$row->father_name}}">{{$row->father_name}}</option>
                                        @endforeach
                                     </select>
                                  </div>
                              </div>
                            <br>
                              <div class="row g-3">
                                  <div class="col-6">
                                      <label for="text" class="form-label">Loaction <span style="color: red">*</span></label>
                                      <select name="region" class="region   form-control"  id="region1" >
                                        @foreach($EmployeeList as $row)
                                        <option value="{{$row->region}}">{{$row->region}}</option>
                                        @endforeach
                                     </select>
                                  </div>
                                  <div class="col-6">
                                    <label for="text" class="form-label">Date Of Joining <span style="color: red">*</span></label>
                                    <select name="joining_date" class="joining_date   form-control"  id="joining_date1" >
                                        @foreach($EmployeeList as $row)
                                        <option value="{{$row->joining_date}}">{{$row->joining_date}}</option>
                                        @endforeach
                                     </select>
                                </div>
                              </div> 
                              <br>
                              <div class="row g-3">
                                <div class=" col-6">
                                    <label for="text" class="form-label">Account Number <span style="color: red">*</span></label>
                                    <select name="account_number" class="account_number   form-control"  id="account_number1" >
                                        @foreach($EmployeeList as $row)
                                        <option value="{{$row->account_number}}">{{$row->account_number}}</option>
                                        @endforeach
                                     </select>
                                </div>
                                <div class=" col-6">
                                    <label for="text" class="form-label">Bank Name <span style="color: red">*</span></label>
                                    <select name="bank_name" class="bank_name   form-control"  id="bank_name1" >
                                        @foreach($EmployeeList as $row)
                                        <option value="{{$row->bank_name}}">{{$row->bank_name}}</option>
                                        @endforeach
                                     </select>
                                </div>
                            </div> 
                             <br>              
                          <br>   
                              
                                             
      <!--Bank Details Start-->
                          <fieldset class="scheduler-border">
                              <legend class="scheduler-border mt-2">EARNINGS  // DEDUCTIONS</legend>
                              <div class="row">
                                  <div class="col mt-3">
                                      <div class="row g-3">
                                          <div class="col-4">
                                              <label for="text" class="form-label">BASIC<span style="color: red">*</span></label>
                                              <input type="text" class="basic form-control" name="basic" id="basic1" placeholder="Enter basic" required>
                                          </div>
                                          <div class="col-4">
                                              <label for="text" class="form-label">HRA <span style="color: red">*</span></label>
                                              <input type="text" class="hra_no form-control" name="hra_no" id="hra_no1">
                                          </div>
                                          <div class="col-4">
                                            <label for="text" class="form-label">CCA <span style="color: red">*</span></label>
                                            <input type="text" class="cca form-control" name="cca" id="cca1">
                                        </div>
                                      </div><br>
      
                                      <div class="row g-3">
                                          <div class="col-4">
                                              <label for="text" class="form-label">Provident Funt<span style="color: red">*</span></label>
                                              <input type="text" class="Provident_funt form-control" name="Provident_funt" id="Provident_funt1" required>
                                          </div>
      
                                          <div class="col-4">
                                              <label for="text" class="form-label">Advance <span style="color: red">*</span></label>
                                              <input type="text" class="advance form-control" name="advance" id="advance1">
                                          </div>
      
                                          <div class="col-4">
                                              <label for="text" class="form-label">ESI <span style="color: red">*</span></label>
                                              <input type="text" class="esi_amount form-control" name="esi_amount" id="esi_amount1"  required>
                                          </div>
                                      </div><br>
                                      <div class="row g-3">
                                        <div class="col-4">
                                            <label for="text" class="form-label">Special Allowance<span style="color: red">*</span></label>
                                            <input type="text" class="special_all form-control" name="special_all" id="special_all1" required>
                                        </div>
                                        <div class="col-4">
                                            <label for="text" class="form-label">Monthly Bonus <span style="color: red">*</span></label>
                                            <input type="text" class="monthly_bonus form-control" name="monthly_bonus" id="monthly_bonus1">
                                        </div>
                                        <div class="col-4">
                                            <label for="text" class="form-label">Other Allowance <span style="color: red">*</span></label>
                                            <input type="text" class="other_all form-control" name="other_all" id="other_all1" required>
                                        </div>
                                      </div><br>
      
                                      <div class="row g-3">
                                          <div class="col-4">
                                              <label for="text" class="form-label">Professional Tax<span style="color: red">*</span></label>
                                              <input type="text" class="Professional_tax form-control" name="Professional_tax" id="Professional_tax1" required>
                                          </div>
      
                                          <div class="col-4">
                                              <label for="text" class="form-label">LWF <span style="color: red">*</span></label>
                                              <input type="text" class="lwa_amount form-control" name="lwa_amount" id="lwa_amount1">
                                          </div>
      
                                          <div class="col-4">
                                              <label for="text" class="form-label">LOP <span style="color: red">*</span></label>
                                              <input type="text" class="lop_amounts form-control" name="lop_amounts" id="lop_amounts1" required>
                                          </div>
                                      </div><br>
                                      <div class="row g-3">
                                        <div class="col-3">
                                            <label for="text" class="form-label">TOTAL EARNINGS<span style="color: red">*</span></label>
                                            <input type="text" class="total_earninig form-control" name="total_earninig" id="total_earninig1" required>
                                        </div>
    
                                        <div class="col-3">
                                            <label for="text" class="form-label">TOTAL DEDUCATIONS <span style="color: red">*</span></label>
                                            <input type="text" class="total_deductions form-control" name="total_deductions" id="total_deductions1">
                                        </div>
    
                                        <div class="col-3">
                                            <label for="text" class="form-label">Salary in words<span style="color: red">*</span></label>
                                            <input type="text" class="salary_area form-control" name="salary_area" id="salary_area1"  required>
                                        </div>
                                        <div class="col-3">
                                            <label for="text" class="form-label">NET PAYABLE <span style="color: red">*</span></label>
                                            <input type="text" class="net_anmouts form-control" name="net_anmouts" id="net_anmouts1"  required>
                                        </div>
                                    </div>
                                  </div>
                              </div>
                          </fieldset>

                          <fieldset class="scheduler-border">
                            <legend class="scheduler-border mt-2">EMPLOYER'S CONTRIBUTION  // LEAVE DETAILS</legend>
                            <div class="row">
                                <div class="col mt-3">
                                    <div class="row g-3">
                                        <div class="col-6">
                                            <label for="text" class="form-label">Provident Funt<span style="color: red">*</span></label>
                                            <input type="text" class="Provident_funts form-control" name="Provident_funts" id="Provident_funts1" required>
                                        </div>
                                        <div class="col-6">
                                          <label for="text" class="form-label">Working Days <span style="color: red">*</span></label>
                                          <input type="text" class="working_day form-control" name="working_day" id="working_day1">
                                      </div>
                                    </div>
                                    <br>
                                    <div class="row g-3">
                                        <div class="col-6">
                                            <label for="text" class="form-label">ESI <span style="color: red">*</span></label>
                                            <input type="text" class="esi_amounts form-control" name="esi_amounts"  id="esi_amounts1" required>
                                        </div>
                                        <div class="col-6">
                                            <label for="text" class="form-label">Days Payable <span style="color: red">*</span></label>
                                            <input type="text" class="days_payable form-control" name="days_payable" id="days_payable1"  required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row g-3">
                                        <div class="col-6">
                                            <label for="text" class="form-label">Accident Insurance<span style="color: red">*</span></label>
                                            <input type="text" class="accident_insurance form-control" name="accident_insurance" id="accident_insurance1" required>
                                        </div>
                                        <div class="col-6">
                                            <label for="text" class="form-label">Leave Token <span style="color: red">*</span></label>
                                            <input type="text" class="leave_token form-control" name="leave_token"  id="leave_token1" required>
                                        </div>
                                    </div><br>
                                    <div class="row g-3">
                                        <div class="col-4">
                                            <label for="text" class="form-label">Loss of Pay <span style="color: red">*</span></label>
                                            <input type="text" class="loass_of_pay form-control" name="loass_of_pay"  id="loass_of_pay1" required>
                                        </div>
                                        <div class="col-4">
                                            <label for="text" class="form-label">TOTAL CONTRIBUTION <span style="color: red">*</span></label>
                                            <input type="text" class="total_contribution form-control" name="total_contribution" id="total_contribution1" required>
                                        </div>
                                        <div class="col-4">
                                            <label for="text" class="form-label">MONTHLY CTC <span style="color: red">*</span></label>
                                            <input type="text" class="monthly_ctc form-control" name="monthly_ctc"  id="monthly_ctc1" required>
                                        </div>
                                    </div><br>
                                </div>
                            </div>
                        </fieldset>
                      </div>
              <div class="modal-footer">
                  <input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancel">
                  <button type="submit" id="submit"   class="btn btn-primary add_empolyee">Update</button>
              </div>
          </form>
        </div>
    </div>
  </div>
</div>
<div class="modal fade" id="userShowModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="userShowModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
       <div class="modal-content">
        <input type="hidden" id="id" name="id"/>
        <h5 class="modal-title" id="userShowModal"></h5>
        <div class="modal-header">
            <img style="border: 1px solid #dddddd;border-radius: 4px;padding: 10px; width: 650px;" src="{{url('lts_assets/images/layout_img/logolts.png')}}" alt="">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
<div class="card-body">
       
            <div class="col mt-3">
                <div class="row g-3">
                    <table border="1"  style="width:100%">  
        
                        <tr height="100px" style="background-color:#f7f0f0;color:#070707;text-align:center;font-size:24px; font-weight:600;">
              
                          <td><img style="border-radius: 100% 100%;" src="{{asset('lts_assets/images/layout_img/latech.jfif')}}" width="50" alt="" colspan='4'>Latech-solutions Pvt.Ltd.</td><br>
                          </tr><br>
                           </table><br><br>
                          
                    <table style="padding: 11px;" colspan="10">
             
                        <tr>
                        <th colspan="10" style="text-align:center;">Payslip for the month of March 2023 </th>
                        </tr>
                        <tr>
                            <td style="text-align:left;border:none;font-weight:30">Name :</td>
                            <td id="name1" style="text-align:left;border:none">  {{$salaryslip->name}} </td>
                            <td style="text-align:left;border:none;font-weight:20">Aadhar Number :</td>
                            <td  style="text-align:left;border:none">{{$salaryslip->adhar_no}}</td>
                        </tr>
                        <tr>
                            <td  style="text-align:left;border:none;font-weight:30">EMP ID :</td>
                            <td  style="text-align:left;border:none">{{$salaryslip->emp_code}}</td>
                            <td  style="text-align:left;border:none;font-weight:20">Pan Number :</td>
                            <td  style="text-align:left;border:none">{{$salaryslip->pan_no}}</td>
                          </tr>
            <!------3 row---->
                          <tr>
                            <td  style="text-align:left;border:none;font-weight:30">DOB :</td>
                            <td  style="text-align:left;border:none">{{$salaryslip->joining_date}}</td>
                            <td  style="text-align:left;border:none;font-weight:20">UAN Number :</td>
                            <td  style="text-align:left;border:none">{{$salaryslip->uan_no}}</td>
                          </tr>
            <!------4 row---->
                            <tr>
          
                              <td  style="text-align:left;border:none;font-weight:30">Designation :</td>
                              <td  style="text-align:left;border:none">{{$salaryslip->desigantion}}</td>
                              <td  style="text-align:left;border:none;font-weight:20">PF No:</td>
                              <td  style="text-align:left;border:none">{{$salaryslip->pf_no}}</td>
                            </tr>
            <!------5 row---->
                          <tr>
                            <td  style="text-align:left;border:none;font-weight:30">Project :</td>
                            <td  style="text-align:left;border:none">{{$salaryslip->project_name}}</td>
                            <td  style="text-align:left;border:none;font-weight:20">ESI Number:</td>
                            <td  style="text-align:left;border:none">{{$salaryslip->Esi_no}}</td>
                          </tr>
            <!------6 row---->
                        <tr>
                          <td  style="text-align:left;border:none;font-weight:30">Location :</td>
                          <td  style="text-align:left;border:none">{{$salaryslip->desigantion}}</td>
                          <td  style="text-align:left;border:none;font-weight:20">Account Number:</td>
                          <td  style="text-align:left;border:none">{{$salaryslip->account_number}}</td>
          
                        </tr>
                        <tr>
                          <td  style="text-align:left;border:none;font-weight:30">Father's name :</td>
                          <td  style="text-align:left;border:none">{{$salaryslip->father_name}}</td>
                          <td  style="text-align:left;border:none;font-weight:20">Bank Name:</td>
                          <td  style="text-align:left;border:none">{{$salaryslip->bank_name}}</td>
                        </tr>
                    </table>
                    <tr></tr>
                    <br/>
                    <table border="1" >

                        <tr class="myBackground">
                          <th style="text-align:center;">EARNINGS</th>
                          <th style="text-align:center;">Amount (Rs.)</th>
                          <th style="text-align:center;">DEDUCTIONS</th>
                          <th style="text-align:center;">Amount (Rs.</th>
                        </tr>
                      <tr>
                        <td  scope="row">Basic</td>
                        <th  style="text-align:center;">{{$salaryslip->basic}}</th>
                        <td>Provident Fund</td>
                        <th style="text-align:center;">{{$salaryslip->Provident_funt}}</th>
                      </tr>
                      <tr>
                        <td>HRA</td>
                        <th style="text-align:center;">{{$salaryslip->hra_no}}</th>
                        <td>ESI</td>
                        <th style="text-align:center;">{{$salaryslip->esi_amount}}</th>
                      </tr>
                      <tr>
                        <td>CCA</td>
                        <th style="text-align:center;">{{$salaryslip->cca}}</th>
                        <td>Adavance</td>
                        <th style="text-align:center;">{{$salaryslip->advance}}</th>
                        </tr>
                      <tr>
                        <td>Special Allowance</td>
                        <th style="text-align:center;"> {{$salaryslip->special_all}}</th>
                        <td>Professional Tax</td>
                        <th style="text-align:center;">{{$salaryslip->Professional_tax}}</th>
                      </tr>
                      <tr>
                        <td>Monthly Bonus</td>
                        <th style="text-align:center;">{{$salaryslip->monthly_bonus}}</th>
                        <td>LWA</td>
                        <th style="text-align:center;">{{$salaryslip->lwa_amount}}</th>
                      </tr>
                      <tr>
                            <td>Other allowance</td>
                            <th style="text-align:center;">{{$salaryslip->other_all}}</th>
                            <td>LOP</td>
                            <th style="text-align:center;">{{$salaryslip->lop_amounts}}</th>
                        </tr>
                        <tr>
                            <td>Total EARNINGS</td>
                            <th style="text-align:center;">{{$salaryslip->total_earninig}}</th>
                            <td>Total DEDUCTIONS </td>
                            <th style="text-align:center;">{{$salaryslip->total_deductions}}</th>
                          </tr>
                          <tr>
                                <td>(salary in words)</td>
                                <th style="text-align:center;">{{$salaryslip->salary_area}}</th>
                                <td>Net Payable </td>
                                <th style="text-align:center;">{{$salaryslip->net_anmouts}}</th>
                            </tr><br>
                            </table>
                            <table border="1"><br>
                              <tr class="myBackground">
                                <th style="text-align:center;">EMPLOYER'S CONTRIBUTION</th>
                                <th class="table-border-right"></th>
                                <th  style="text-align:center;">LEAVE PAYABLE</th>
                                <th></th>
                              </tr>
                                    <td scope="row">Provident Fund</td>
                                    <th  style="text-align:center;">{{$salaryslip->Provident_funts}}</th>
                                    <td>Working Days</td>
                                    <th style="text-align:center;">{{$salaryslip->working_day}}</th>
                                </tr>
                                 <tr>
                                    <td>ESI</td>
                                    <th style="text-align:center;">{{$salaryslip->esi_amounts}}</th>
                                    <td>Days Payaple</td>
                                    <th style="text-align:center;">{{$salaryslip->days_payable}}</th>
                                </tr>
                                 <tr>
                                    <td>Accident Insurance</td>
                                    <th style="text-align:center;"> {{$salaryslip->accident_insurance}}</th>
                                    <td>Leave Taken</td>
                                    <th style="text-align:center;">{{$salaryslip->leave_token}}</th>
                                </tr>
                                 <tr>
                                    <td></td>
                                    <th></th>
                                    <td>Loss of Pay</td>
                                    <th style="text-align:center;">{{$salaryslip->loass_of_pay}}</th>
                                </tr>
                                 <tr>
                                    <td>Total CONTRIBUTION</td>
                                    <th style="text-align:center;"> {{$salaryslip->total_contribution}}</th>
                                    <td>MONTHLY CTC</td>
                                    <th style="text-align:center;">{{$salaryslip->monthly_ctc}}</th>
                                </tr>
                            </table> 
                          
                 </div>
             </div><br>
             </div>
           <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>   
</div>
        
@endsection
@section('scripts')
 <script> 
 $(document).ready(function(){
  
    $('body').on('click', '#show-user', function () {
          var userURL = $(this).data('url');
          $.get(userURL, function (data) {
              $('#userShowModal').modal('show');
              $('#id').text(data.id);
              $('#name').text(data.name);
              $('#emp_code').text(data.emp_code);
              $('#desigantion').text(data.desigantion);
              $('#project_name').text(data.project_name);
              $('#monthly_ctc').text(data.monthly_ctc);
              $('#joining_date').text(data.joining_date);
          })
       });
       $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
          $('.deleteemployeeBtn').click(function (e) {
                e.preventDefault();
               var id = $(this).val();
                $('#id').val(id);
                $('#deleteModal').modal('show');

              });
              $(document).on('click', '.editbtn', function(){
              var cmp_id = $(this).val();
               $('#EditModal').modal('show');
                        var id = $(this).val();
                        $('#EditModal').modal('show');
                        $.ajaxSetup({
                                  headers: {
                                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                  }
                              });

            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                type: "GET",
                url: "/empsalaryslip/edit/"+id,
                    success: function (response){
               
                    $('#id ').val(response.add_salary_emp.id );
                    $('#name1').val(response.add_salary_emp.name);
                    $('#desigantion1').val(response.add_salary_emp.desigantion);
                    $('#adhar_no1').val(response.add_salary_emp.adhar_no);
                    $('#pan_no1').val(response.add_salary_emp.pan_no);
                    $('#uan_no1').val(response.add_salary_emp.uan_no);
                    $('#pf_no1').val(response.add_salary_emp.pf_no);
                    $('#Esi_no1').val(response.add_salary_emp.Esi_no);
                    $('#father_name1').val(response.add_salary_emp.father_name);  
                    $('#region1').val(response.add_salary_emp.region);  
                    $('#joining_date1').val(response.add_salary_emp.joining_date);  
                    $('#bank_name1').val(response.add_salary_emp.bank_name);
                    $('#account_number1').val(response.add_salary_emp.account_number);
                    $('#basic1').val(response.add_salary_emp.basic);
                    $('#hra_no1').val(response.add_salary_emp.hra_no);
                    $('#cca1').val(response.add_salary_emp.cca)    
                    $('#Provident_funt1').val(response.add_salary_emp.Provident_funt);
                    $('#advance1').val(response.add_salary_emp.advance);
                    $('#esi_amount1').val(response.add_salary_emp.esi_amount);
                    $('#special_all1').val(response.add_salary_emp.special_all); 
                    $('#monthly_bonus1').val(response.add_salary_emp.monthly_bonus);  
                    $('#other_all1').val(response.add_salary_emp.other_all);   
                    $('#Professional_tax1').val(response.add_salary_emp.Professional_tax);
                    $('#lop_amounts1').val(response.add_salary_emp.lop_amounts);   
                    $('#lwa_amount1').val(response.add_salary_emp.lwa_amount);  
                    $('#total_earninig1').val(response.add_salary_emp.total_earninig);    
                    $('#total_deductions1').val(response.add_salary_emp.total_deductions);
                    $('#salary_area1').val(response.add_salary_emp.salary_area);
                    $('#net_anmouts1').val(response.add_salary_emp.net_anmouts);
                    $('#Provident_funts1').val(response.add_salary_emp.Provident_funts);
                    $('#working_day1').val(response.add_salary_emp.working_day)    
                    $('#esi_amounts1').val(response.add_salary_emp.esi_amounts);
                    $('#days_payable1').val(response.add_salary_emp.days_payable);
                    $('#accident_insurance1').val(response.add_salary_emp.accident_insurance);  
                    $('#leave_token1').val(response.add_salary_emp.leave_token);   
                    $('#loass_of_pay1').val(response.add_salary_emp.loass_of_pay);
                    $('#total_contribution1').val(response.add_salary_emp.total_contribution);   
                    $('#monthly_ctc1').val(response.add_salary_emp.monthly_ctc); 
                    console.log(response);
            }
        });
     });
   });   
</script>
@endsection