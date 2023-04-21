
@extends('VCREPORT.layouts.master')
@section('content-header')
<style>
	
    fieldset.scheduler-border {
    border: 1px groove #ddd !important;
    padding: 0 1.4em 1.4em 1.4em !important;
    margin: 0 0 1.5em 0 !important;
    -webkit-box-shadow:  0px 0px 0px 0px #000;
            box-shadow:  0px 0px 0px 0px #000;
}

legend.scheduler-border {
    font-size: 1.2em !important;
    font-weight: bold !important;
    text-align: left !important;
}
</style>

         <!-- Start dashboard inner -->
<div class="midde_cont">
  <div class="container-fluid">
    <div class="row column_title">
     <div class="col-md-12">
        <div class="page_title">
            <h2>Add Employee</h2>
        </div>
     </div>
    </div>
    <!-- row -->
<div class="row column1">
  <div class="col-md-12">
        <div class="white_shd full margin_bottom_30">
            <div class="full graph_head ">
                <div class="heading1 margin_0">
                <h2>Employee Details</h2>
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
                        <input  type="search"  name="search" id="" class="form-control" placeholder="Search Employee"  value= "{{$search}}" >
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                        + Add Employee
                    </button>
                </div>
         <!--table start-->
         <!--table start-->
         <div class="card-body">
            <table class="table table-bordered">
            <thead class="thead-pink" >
              <tr>
                 <th><b>S.No.</b></th>
                 <th><b>Emp Id</b></th> 
                 <th><b>Name</b></th>
                 <th><b>E-mail</b></th> 
                 <th><b>Desigantion</b></th> 
                 <th><b>Phone no.</b></th>
                 <th><b>Joining Date</b></th> 
                 <th><b>Gender</b></th>
                 <th><b>Address</b></th>
                 <th><b>Status</b></th> 
                 <th style="text-align: center;"><b> Action</b></th>
              </tr>
            </thead>
            <tbody>
            @if(!empty($employee))
              @foreach($employee as $emp)
              <tr>
              <td> {{$emp->id}}</td>
                  <th>{{$emp->emp_code}}</th>
                  <th>{{ucfirst($emp->name)}}</th>
                  <th>{{$emp->email}}</th>
                  <th>{{$emp->desigantion}}</th>
                  <th>{{$emp->phone}}</th>
                  <th>{{$emp->joining_date}}</th>
                  <th>{{$emp->gender}}</th>
                  <th>{{$emp->current_address}}</th>
                  <th>{{$emp->status}}</th>
                 <td>
                 <button type="button"  value="{{$emp->id}}" data-bs-toggle="modal" class="btn btn-danger editbtn btn-sm">EDIT</button>  
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
    <Form    action="{{route('employestrore')}}"  method="POST" >
        @csrf
            <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel">Add Employee</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="col ms-1 me-2 mt-3">
                      
                      <div class="row">
                        <div class="col">
                          <label for="emp_name" class="form-label">Employee Name <span style="color: red">*</span></label>
                          <input type="text" class="name form-control" name="name"   required>
                        </div>
                    </div> 
                           
           
                                                        <br>
                        <div class="row g-3">
                            <div class="col-4">
                                <label for="email" class="form-label">Email <span style="color: red">*</span></label>
                                <input type="text" class="email form-control" name="email"    required>
                            </div>

                            <div class="col-4">
                                <label for="text" class="form-label">Phone No <span style="color: red">*</span></label>
                                <input type="text"  class="phone form-control"  maxlength="10" name="phone"  required>
                            </div>

                            <div class="col-4">
                                <label for="text" class="form-label">Alternate Phone No <span style="color: red">*</span></label>
                                <input type="text"  class="alernate_number form-control"  maxlength="10" name="alernate_number" required>
                            </div>
                        </div>
                        <br>
                        <div class="row g-3">
                          <div class="col-6">
                              <label for="emp_id" class="form-label">Designation <span style="color: red">*</span> </label>
                                <select name="desigantion" class="desigantion   form-control"  id="desigantion" data-live-search="true"  data-size="8" tabindex="null">
                                  @foreach($DesignationList as $row)
                                  <option value="{{$row->desigantion}}">{{$row->desigantion }}</option>
                                  @endforeach
                               </select>
                           </div>
                            <div class="col-6">
                              <label for="text" class="form-label">Gender </label>
                              <select name="gender" class="gender  form-control select_type" id="gender" >
                                  <option value="Male">Male</option>
                                  <option value="Female">Female</option>
                                </select>
                        </div>
                        </div><br>
                        <div class="row g-3">
                            <div class="col-6">
                                <label for="text" class="form-label">Father Name <span style="color: red">*</span></label>
                                <input type="text" class="father_name form-control" name="father_name" required>
                            </div>

                            <div class="col-6">
                                <label for="text" class="form-label">Father Phone No <span style="color: red">*</span></label>
                                    <input type="text" class="father_mobile form-control" name="father_mobile" maxlength="10" placeholder="Enter Father Phone No " required>
                            </div>

                        </div>
                      <br>
                        <div class="row">
                            <div class="col">
                                <label for="text" class="form-label">Current Address <span style="color: red">*</span></label>
                                    <input type="text" class="current_address form-control" name="current_address"  placeholder="Enter Address" required>
                            </div>
                        </div> 
                                                                <br>

                        <div class="row g-3">
                            <div class="col-6 mt-3"> 
                                <label for="country" class="form-label">Country <span style="color: red">*</span></label><br>
                                <select id="country" name="country"  id="country" class="country form-control" > 
                                  <option value="12">INDIA</option>  
                               </select>
                            </div>

                            <div class="col-6">
                                <label for="inputState" class="form-label">State <span style="color: red">*</span></label>
                                <select  name="region" id="region" class="region form-control">
                                 <option value="region1">DELHI</option>
              </select>
                            </div>
                        </div>
                                                            <br>
                        <div class="row g-3">
                            <div class="col-6">
                                <label for="inputCity" class="form-label">City <span style="color: red">*</span></label>
                                <select  name="city" id="city" class="city form-control">
                                  <option value="city1">East Delhi</option>
                               </select>
                            </div>

                            <div class="col-6">
                                <label for="pincode" class="form-label">Pincode <span style="color: red">*</span></label>
                                <input type="pin_code"   maxlength="6" class="pin_code form-control" name="pin_code" required>
                                
                            </div>
                        </div>
                        <br>
                                                                        
                        <div class="row">
                            <div class="col">
                                <label for="text" class="form-label">Permanent Address <span style="color: red">*</span></label>
                                <input type="text" class="permanent_address form-control"  name="permanent_address" placeholder="Enter Address" required>
                            </div>
                        </div> 
                    <br>   
                        <div class="row g-3">
                            <div class="col">
                                <label for="text" class="form-label">Joining Date</label>
                                <input type="date"  class="joining_date form-control"  name="joining_date" required>
                            </div>
                            <div class="col ">  
                            <label for="">Status *</label>
                            <select name="status" class="status  form-control select_type" id="status">
                              <option value="Active">Active</option>
                              <option value="In active">In Active</option>
                            </select>
  
           </div>
        </div>
    <br>
                                       
<!--Bank Details Start-->
                    <fieldset class="scheduler-border">
                        <legend class="scheduler-border mt-2">Banking Details</legend>
                        <div class="row">
                            <div class="col mt-3">
                                <div class="row g-3">
                                    <div class=" col-6 ">
                                        <label for="text" class="form-label">Account Holder Name <span style="color: red">*</span></label>
                                        <input type="text" class="beneficiary_name form-control" name="beneficiary_name" placeholder="Enter account holder name" required>
                                    </div>

                                    <div class=" col-6 ">
                                        <label for="text" class="form-label">Account Number <span style="color: red">*</span></label>
                                        <input type="text" class="account_number form-control" name="account_number" placeholder="Enter account number">
                                    </div>
                                </div><br>

                                <div class="row g-3">
                                    <div class=" col-4 ">
                                        <label for="text" class="form-label">Bank Name <span style="color: red">*</span></label>
                                        <input type="text" class="bank_name form-control" name="bank_name" required>
                                    </div>

                                    <div class=" col-4 ">
                                        <label for="text" class="form-label">Branch Name <span style="color: red">*</span></label>
                                        <input type="text" class="branch_name form-control" name="branch_name" placeholder="Enter branch name">
                                    </div>

                                    <div class=" col-4 ">
                                        <label for="text" class="form-label">IFSC Code <span style="color: red">*</span></label>
                                        <input type="text" class="ifsc_code form-control" name="ifsc_code"  placeholder="Enter IFSC code" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancel">
            <button type="submit" id="submit"   class="btn btn-primary add_empolyee">Add</button>
        </div>
    </form>
   </div>
  </div>
</div>
           <!-- Edit Modal HTML -->                   
 <div id="EditModal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="EditModal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
               <Form    action="{{url('/employee/update/')}}" method="POST"  id="editForm">
                @method('PUT')  
                        @csrf      
                <input type="hidden" id="id" name="id"/>
                     <div class="modal-header">						
                        <h4 class="modal-title"  id="EditModal">Edit Employee Details</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <div class="modal-body">			
                           <div class="form-group">
                              
                    <div class="col ms-1 me-2 mt-3">              
                          <div class="row">
                            <div class="col">
                              <label for="emp_name" class="form-label">Employee Name <span style="color: red">*</span></label>
                              <input type="text" class="name form-control" name="name" id="name1"  required>
                            </div>
                        </div><br>
                        <div class="row g-3">
                            <div class="col-4">
                                <label for="email" class="form-label">Email <span style="color: red">*</span></label>
                                <input type="text" class="email form-control" name="email" id="email1"   required>
                            </div>

                            <div class="col-4">
                                <label for="text" class="form-label">Phone No <span style="color: red">*</span></label>
                                <input type="text"  class="phone form-control"  maxlength="10" name="phone" id="phone1" required>
                            </div>

                            <div class="col-4">
                                <label for="text" class="form-label">Alternate Phone No <span style="color: red">*</span></label>
                                <input type="text"  class="alernate_number form-control"  maxlength="10" name="alernate_number"  id="alernate_number1" required>
                            </div>
                        </div>
                      <br>
                      <div class="row g-3">
                        <div class="col-6">
                            <label for="emp_id" class="form-label">Designation <span style="color: red">*</span> </label>
                              <select name="desigantion" class="desigantion   form-control"  id="desigantion1" data-live-search="true"  data-size="8" tabindex="null">
                                @foreach($DesignationList as $row)
                                <option value="{{$row->desigantion}}">{{$row->desigantion }}</option>
                                @endforeach
                             </select>
                         </div>
                          <div class="col-6">
                            <label for="text" class="form-label">Gender </label>
                            <select name="gender" class="gender  form-control select_type" id="gender" >
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                              </select>
                      </div>
                      </div><br>
                        <div class="row g-3">
                            <div class="col-6 mt-3">
                                <label for="text" class="form-label">Father Name <span style="color: red">*</span></label>
                                <input type="text" class="father_name form-control"  id="father_name1" name="father_name" required>
                            </div>
                            <div class="col-6">
                                <label for="text" class="form-label">Father Phone No <span style="color: red">*</span></label>
                                    <input type="text" class="father_mobile form-control" name="father_mobile" id="father_mobile1" maxlength="10" placeholder="Enter Father Phone No" required>
                            </div>
                             
                        </div>
                      <br>
                        <div class="row">
                            <div class="col">
                                <label for="text" class="form-label">Current Address <span style="color: red">*</span></label>
                                <input type="text" class="current_address form-control" name="current_address" id="current_address1" required>
                            </div>
                        </div> 
                        <br>
                        <div class="row g-3">
                            <div class="col-6 mt-3"> 
                                <label for="country" class="form-label">Country <span style="color: red">*</span></label><br>
                                <select id="country1" name="country_id"  class="country_id form-control" >  
                                    <option value="12">INDIA</option>  
                                
                                 
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="inputState" class="form-label">State <span style="color: red">*</span></label>
                                <select  name="region_id" id="region1" class="region_id form-control">
                                  <option value="DELHI">DELHI</option>
                                
                              </select>
                            </div>
                        </div>
                    <br>
                        <div class="row g-3">
                            <div class="col-6">
                                <label for="inputCity" class="form-label">City <span style="color: red">*</span></label>
                                <select  name="city_id" id="city1" class="city_id form-control">
                                  <option value="city">City</option>
                              </select>
                            </div>
                            <div class="col-6">
                                <label for="pincode" class="form-label">Pincode <span style="color: red">*</span></label>
                                <input type="text" class="pin_code form-control" id="pin_code1" name="pin_code" required>
                            </div>
                        </div>
                     <br>                                                
                        <div class="row">
                            <div class="col">
                                <label for="text" class="form-label">Permanent Address <span style="color: red">*</span></label>
                                <input type="text"  class="permanent_address form-control"  name="permanent_address"  id="permanent_address1" required>
                            </div>
                        </div> 
                        <br>
               
                        <br>
                      
                    <br>
                        <div class="row g-3">
                            <div class="col">
                                <label for="text" class="form-label">Joining Date</label>
                                <input type="date"  class="joining_date form-control"  id="joining_date1" name="joining_date" required>
                            </div>
                        <div class="col">  
                            <label for="">Status *</label>
                                <select name="status" class="status  form-control " id="status1">
                                    <option value="Active">Active</option>
                                    <option value="In active">In Active</option>
                               </select>
                         </div>
                     </div>
                    
                    <br>
                    <br>             
<!--Bank Details Start-->
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border mt-2">Banking Details</legend>
                    <div class="row">
                        <div class="col mt-3">
                            <div class="row g-3">
                                <div class=" col-6 ">
                                    <label for="text" class="form-label">Account Holder Name <span style="color: red">*</span></label>
                                    <input type="text" class="beneficiary_name form-control" name="beneficiary_name" id="beneficiary_name1"  required>
                                </div>
                                <div class=" col-6 ">
                                    <label for="text" class="form-label">Account Number <span style="color: red">*</span></label>
                                    <input type="text" class="account_number form-control" name="account_number" id="account_number1" required>
                                </div>
                            </div><br>
                            <div class="row g-3">
                                <div class=" col-4 ">
                                    <label for="text" class="form-label">Bank Name <span style="color: red">*</span></label>
                                    <input type="bank_name" class="bank_name form-control" name="bank_name"  id="bank_name1" required>
                                </div>
                                <div class=" col-4 ">
                                    <label for="text" class="form-label">Branch Name <span style="color: red">*</span></label>
                                    <input type="text" class="branch_name form-control" name="branch_name" id="branch_name1"  required>
                                </div>
                                <div class=" col-4 ">
                                    <label for="text" class="form-label">IFSC Code <span style="color: red">*</span></label>
                                    <input type="ifsc_code" class="ifsc_code form-control" name="ifsc_code"  id="ifsc_code1" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>

 <!--dfd-->
                    </div>       
                        </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" id="submit"   class="btn btn-primary add_empolyee">Update</button>
                            </div>
                         </form>
                        </div>
                     </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>      
@endsection
@section('scripts')
 <script>  
$(document).ready(function(){
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
                url: "/employee/edit/"+id,
                    success: function (response){
                //nsole.log(response);
                    $('#id ').val(response.employee.id );
                    $('#name1').val(response.employee.name);
                    $('#email1').val(response.employee.email);
                    $('#phone1').val(response.employee.phone);
                    $('#desigantion1').val(response.employee.desigantion);
                    $('#alernate_number1').val(response.employee.alernate_number);
                    $('#father_name1').val(response.employee.father_name);
                    $('#father_mobile1').val(response.employee.father_mobile);
                    $('#gender1').val(response.employee.gender);  
                    $('#joining_date1').val(response.employee.joining_date);    
                    $('#permanent_address1').val(response.employee.permanent_address);
                    $('#country_id1').val(response.employee.country_id);
                    $('#region_id1').val(response.employee.region_id);
                    $('#city_id1').val(response.employee.city_id);
                    $('#current_address1').val(response.employee.current_address)    
                    $('#country1').val(response.employee.country);
                    $('#region1').val(response.employee.region);
                    $('#city1').val(response.employee.city); 
                    $('#pin_code1').val(response.employee.pin_code);  
                    $('#bank_name1').val(response.employee.bank_name);   
                    $('#beneficiary_name1').val(response.employee.beneficiary_name);
                    $('#account_number1').val(response.employee.account_number);   
                    $('#ifsc_code1').val(response.employee.ifsc_code);  
                    $('#branch_name1').val(response.employee.branch_name);    
                        
            }
        });
    });
    var selectedCountry = (selectedRegion = selectedCity = "");
                // This is a demo API key for testing purposes. You should rather request your API key (free) from http://battuta.medunes.net/
                var BATTUTA_KEY = "00000000000000000000000000000000";
                // Populate country select box from battuta API
                url =
                  "https://battuta.medunes.net/api/country/all/?key=" +
                  BATTUTA_KEY +
                  "&callback=?";

                // EXTRACT JSON DATA.
                $.getJSON(url, function(data) {
                  console.log(data);
                  $.each(data, function(index, value) {
                    // APPEND OR INSERT DATA TO SELECT ELEMENT.
                    $("#country").append(
                      '<option value="' + value.code + '">' + value.name + "</option>"
                    );
                  });
                });
                // Country selected --> update region list .
                $("#country").change(function() {
                  selectedCountry = this.options[this.selectedIndex].text;
                  countryCode = $("#country").val();
                  // Populate country select box from battuta API
                  url =
                    "https://battuta.medunes.net/api/region/" +
                    countryCode +
                    "/all/?key=" +
                    BATTUTA_KEY +
                    "&callback=?";
                  $.getJSON(url, function(data) {
                    $("#region option").remove();
                    $('#region').append('<option value="">Please select your region</option>');
                    $.each(data, function(index, value) {
                      // APPEND OR INSERT DATA TO SELECT ELEMENT.
                      $("#region").append(
                        '<option value="' + value.region + '">' + value.region + "</option>"
                      );
                    });
                  });
                });
                // Region selected --> updated city list
                $("#region").on("change", function() {
                  selectedRegion = this.options[this.selectedIndex].text;
                  // Populate country select box from battuta API
                  countryCode = $("#country").val();
                  region = $("#region").val();
                  url =
                    "https://battuta.medunes.net/api/city/" +
                    countryCode +
                    "/search/?region=" +
                    region +
                    "&key=" +
                    BATTUTA_KEY +
                    "&callback=?";
                  $.getJSON(url, function(data) {
                    console.log(data);
                    $("#city option").remove();
                    $('#city').append('<option value="">Please select your city</option>');
                    $.each(data, function(index, value) {
                      // APPEND OR INSERT DATA TO SELECT ELEMENT.
                      $("#city").append(
                        '<option value="' + value.city + '">' + value.city + "</option>"
                      );
                    });
                  });
                });
                // city selected --> update location string
                $("#city").on("change", function() {
                  selectedCity = this.options[this.selectedIndex].text;
                  $("#location").html(
                    "Locatation: Country: " +
                      selectedCountry +
                      ", Region: " +
                      selectedRegion +
                      ", City: " +
                      selectedCity
                  );
                })
          
                var selectedCountry = (selectedRegion = selectedCity = "");
                // This is a demo API key for testing purposes. You should rather request your API key (free) from http://battuta.medunes.net/
                var BATTUTA_KEY = "00000000000000000000000000000000";
                // Populate country select box from battuta API
                url =
                  "https://battuta.medunes.net/api/country/all/?key=" +
                  BATTUTA_KEY +
                  "&callback=?";

                // EXTRACT JSON DATA.
                $.getJSON(url, function(data) {
                  console.log(data);
                  $.each(data, function(index, value) {
                    // APPEND OR INSERT DATA TO SELECT ELEMENT.
                    $("#country1").append(
                      '<option value="' + value.code + '">' + value.name + "</option>"
                    );
                  });
                });
                // Country selected --> update region list .
                $("#country1").change(function() {
                  selectedCountry = this.options[this.selectedIndex].text;
                  countryCode = $("#country1").val();
                  // Populate country select box from battuta API
                  url =
                    "https://battuta.medunes.net/api/region/" +
                    countryCode +
                    "/all/?key=" +
                    BATTUTA_KEY +
                    "&callback=?";
                  $.getJSON(url, function(data) {
                    $("#region1 option").remove();
                    $('#region1').append('<option value="">Please select your region</option>');
                    $.each(data, function(index, value) {
                      // APPEND OR INSERT DATA TO SELECT ELEMENT.
                      $("#region1").append(
                        '<option value="' + value.region + '">' + value.region + "</option>"
                      );
                    });
                  });
                });
                // Region selected --> updated city list
                $("#region1").on("change", function() {
                  selectedRegion = this.options[this.selectedIndex].text;
                  // Populate country select box from battuta API
                  countryCode = $("#country1").val();
                  region = $("#region1").val();
                  url =
                    "https://battuta.medunes.net/api/city/" +
                    countryCode +
                    "/search/?region=" +
                    region +
                    "&key=" +
                    BATTUTA_KEY +
                    "&callback=?";
                  $.getJSON(url, function(data) {
                    console.log(data);
                    $("#city1 option").remove();
                    $('#city1').append('<option value="">Please select your city</option>');
                    $.each(data, function(index, value) {
                      // APPEND OR INSERT DATA TO SELECT ELEMENT.
                      $("#city1").append(
                        '<option value="' + value.city + '">' + value.city + "</option>"
                      );
                    });
                  });
                });
                // city selected --> update location string
                $("#city1").on("change", function() {
                  selectedCity = this.options[this.selectedIndex].text;
                  $("#location").html(
                    "Locatation: Country: " +
                      selectedCountry +
                      ", Region: " +
                      selectedRegion +
                      ", City: " +
                      selectedCity
                  );
                });  
            }); 
               
</script>
@endsection

