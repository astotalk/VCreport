@extends('VCREPORT.layouts.master')
@section('content-header')

 <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Designation</h2>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
<div class="row column1">
<div class="col-md-12">
    <div class="white_shd full margin_bottom_30">
        <div class="full graph_head">
            <div class="heading1 margin_0">
            <h2>Add Designation</h2>
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
                     <input  type="search"  name="search" id="" class="form-control" placeholder="Search Designation">
                           <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                     </form>
                           <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                              + Add Designation
                           </button>
               </div>
         <!--table start-->
               <div class="card-body">
                  <table class="table table-bordered">
                        <thead class="thead-dark ">
                           <tr>
                              <th><b>S.No.</b></th>
                              <th><b>Designation</b></th> 
                              <th style="text-align: center;"> <b>Action</b></th>
                           </tr>
                        </thead>
                        <tbody>
                        @if(!empty($desigantion))
                            @foreach($desigantion as $designation)
                           <tr>
                             
                        <th>{{$designation->id}}</th>
                        <th>{{ucfirst($designation->desigantion)}}</th>
                        <td>
                        <button type="button"  value="{{$designation->id}}" class="btn btn-primary editbtn btn-sm"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></button>&nbsp; 
                        <button type="button"  value="{{$designation->id}}" class="btn btn-danger deletedesignationBtn">Delete</button>
                
                      </tr>
                        @endforeach
                        @endif
                        </tbody>
                     </table>
                   </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
                 <!-- Edit Modal HTML -->                   
  <div id="EditModal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="EditModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
            <Form    action="{{url('/designation/update/')}}" method="POST"  id="editForm">
            @method('PUT')  
           @csrf  
           <input type="hidden" id="dig_id" name="dig_id"/>
                  <div class="modal-header">						
                        <h4 class="modal-title"  id="EditModalLabel">Edit Designation</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>

                  <div class="modal-body">			
                     <div class="form-group">
                         <div class="row g-3">             
                              <div class="col-12">                            
                                       <label for="text" class="form-label">Designation <span style="color: red">*</span></label></br>
                                       <input type="text" class="desigantion form-control" name="desigantion" id="desigantion1" required> 
                              </div>
                              <span class="text-danger">
                            @error('name')
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
                  <form  action="{{ url('/designation/destroy/')}}"  method="POST">
                       @csrf
                        <div class="modal-header">						
                           <h4 class="modal-title"  id="deleteModalLabel">Delete Designation</h4>
                           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                           </div>
                            <div class="modal-body">
                           <div class="form-group">					
                              <p>Are you sure you want to delete these Records?</p>
                              <input type="hidden" name="desigantion" id="desigantion">
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
            <Form    action="{{route('addstoress')}}"  method="POST" >
 @csrf
                  <div class="modal-header">New Designation</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                  <div class="form-group">
                         <div class="row g-3">             
                              <div class="col-12">                            
                                       <label for="text" class="form-label">Add Designation <span style="color: red">*</span></label></br>
                                       <input type="text" class="desigantion form-control" name="desigantion" id="desigantion" required> 
                              </div>
                              <span class="text-danger">
                            @error('desigantion')
                            {{$message}}
                            @enderror
                            </span>
                           </div>
                   </div>
                  </div>                         
                  <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                 <button type="submit" id="submit"   class="btn btn-primary add_designation">Add</button>
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

      $('.deletedesignationBtn').click(function (e) {
                e.preventDefault();
               var desigantion = $(this).val();
                $('#desigantion').val(desigantion);
                $('#deleteModal').modal('show');

              });
              
      $(document).on('click', '.editbtn', function(){
              

              var dig_id = $(this).val();

              $('#EditModal').modal('show');
              
              $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                    type: "GET",
                    url: "/designation/edit/"+dig_id,
                      success: function (response){
                        //console.log("Hello world!");
                      $('#dig_id').val(response.desigantion.id);
                      $('#desigantion1').val(response.desigantion.desigantion)          

}



});

      });
    });
       

</script>
@endsection