@extends('VCREPORT.layouts.master')
@section('content-header')

<!-- Start dashboard inner -->
<div class="midde_cont">
  <div class="container-fluid">
     <div class="row column_title">
        <div class="col-md-12">
           <div class="page_title">
              <h2>Department</h2>
           </div>
        </div>
     </div>
     <!-- row -->
     <div class="row column1">
        <div class="col-md-12">
           <div class="white_shd full margin_bottom_30">
              <div class="full graph_head">
                 <div class="heading1 margin_0">
                    <h2>Add Department</h2>
                 </div>
              </div>

<div class="container py-5">
<div class="row">
<div class="col-md-12">
                @if(session('status'))
                <div class="alert alert-success">{{session('status')}}</div>
                @endif
<div id="success_message"></div>
<div class="card mt-3">
<div class="card-header">
  <!-- SEARCH BY TASK START -->
  <nav class="navbar navbar-light bg-light">
     <form method="get"  class="form-inline">
     <a class="btn btn-danger text-white" href="{{route('dashboard')}}" role="button">Back</a> &nbsp;&nbsp;
     <input  type="search"  name="search" id="" class="form-control" placeholder="Search Department">
           <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
     </form>
           <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal"> + Add New Department</button>
</div>
<!--table start-->
<div class="card-body">
  <table class="table table-bordered">
        <thead class="thead-dark">
           <tr>
              <th><b>S.No</b></th>
              <th><b>Department</b></th> 
              <th style="text-align: center;"> <b>Action</b></th>
           </tr>
        </thead>
        <tbody>
        @if(!empty($department))
            @foreach($department as $department)
            <tr> 
            <th>{{$department->id}}</th>
                <th>{{ucfirst($department->department)}}</th>
              <td>
                  <button type="button"  value="{{$department->id}}" class="btn btn-primary editbtn btn-sm">Edit</button>
                  <button type="button"  value="{{$department->id}}" class="btn btn-danger deletedepartmentBtn">Delete</button>  
              </td>
              </tr>
                
                @endforeach
                @endif
        </tbody>
     </table>
  </div>
  </div>
</div>
   <!--------Card close-->
</div>
</div>
</div>
<!--------Container close-->
</div>
</div>
<!--row close-->
</div>
</div>
 <!-- Edit Modal HTML -->                   
<div id="EditModal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="EditModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<Form    action="{{url('/department/update/')}}" method="POST"  id="editForm"  enctype="multipart/form-data"/>
 @method('PUT')  
           @csrf  
           <input type="hidden" id="dpt_id" name="dpt_id"/>
  <div class="modal-header">						
        <h4 class="modal-title"  id="EditModalLabel">Edit Department</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
  </div>

  <div class="modal-body">			
     <div class="form-group">
         <div class="row g-3">             
              <div class="col-12">                            
                       <label for="text" class="form-label">Department <span style="color: red">*</span></label></br>
                       <input type="text" class="department form-control" name="department" id="department1" required> 
                       </div>
            <span class="text-danger">
               @error('department')
               {{$message}}
               @enderror
              </span>
           </div>
        </div>
     </div>
  <div class="modal-footer">
           <input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Close">
           <input type="submit" class="btn btn-info" value="Update">
  </div>
</form>
</div>
</div>
</div>


<!-- Delete Modal HTML -->


<div id="deleteModal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
               <div class="modal-dialog">
                  <div class="modal-content">
                  <form  action="{{ url('/department/destroy/')}}"  method="POST">
                       @csrf
                        <div class="modal-header">						
                           <h4 class="modal-title"  id="deleteModalLabel">Delete Designation</h4>
                           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                           </div>
                            <div class="modal-body">
                           <div class="form-group">					
                              <p>Are you sure you want to delete these Records?</p>
                              <input type="hidden" name="department" id="department">
                            <p class="text-warning"><small>This action cannot be undone.</small></p>
                        </div>
                     </div>
                        <div class="modal-footer">
                           <input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancel">
                           <input type="submit" class="btn btn-danger" value="Delete">
                        </div>
                     </form>
                  </div>
               </div>
            </div>
<!-- The Modal -->




<!-- Modal -->
<div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<Form  action="{{route('store')}}" method="POST" >
 @csrf
<ul id="savefrom_errList"></ul>
  <div class="modal-header">New Department</h5>
  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
  </div>
  <div class="modal-body">
  <div class="form-group">
         <div class="row g-3">             
              <div class="col-12">                            
                       <label for="text" class="form-label">Add Department <span style="color: red">*</span></label></br>
                       <input type="text"  class="department form-control" name="department" id="department" required> 
              </div>
              <span class="text-danger">
               @error('department')
               {{$message}}
               @enderror
              </span>
           </div>
        </div>
  </div>                         

     
  <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" id="submit"   class="btn btn-primary add_department">Add</button>
  </div>
</form>
</div>
</div>
</div>

@endsection
@section('scripts')
<script type="text/javascript">
  $(document).ready(function (){
         $.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
      });
    $('.deletedepartmentBtn').click(function (e) {
                e.preventDefault();
               var department = $(this).val();
                $('#department').val(department);
                $('#deleteModal').modal('show');

              });
      $(document).on('click', '.editbtn', function(){
              

              var dpt_id = $(this).val();

              $('#EditModal').modal('show');
              
              $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                    type: "GET",
                    url: "/department/edit/"+dpt_id,
                      success: function (response){
                        //console.log("Hello world!");
                      $('#dpt_id').val(response.department.id);
                      $('#department1').val(response.department.department)          
         }
       });
      });
    });
</script>
@endsection

