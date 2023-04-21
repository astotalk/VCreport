@extends('VCREPORT.layouts.master')
@section('content-header')
<div class="card mt-3">
    <div class="card-header">
        <!-- SEARCH BY TASK START -->
        <nav class="navbar navbar-light bg-light">
        <form method="get"  class="form-inline">
                <a class="btn btn-danger text-white" href="{{ route('dashboard') }}" role="button">Back</a> &nbsp;&nbsp;
            <input  type="search"  name="search" id="" class="form-control" placeholder="Search Employee"  value= "{{$search}}">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
            + Add Employee
        </button>
    </div>
<!--table start-->
<div class="card-body">
<table class="table table-bordered">
<thead class="thead-dark" >
<tr>
   <th><b>S.No.</b></th>
   <th><b>Emp Id</b></th> 
   <th><b>Name</b></th>
   <th><b>E-mail</b></th> 
   <th><b>Phone no.</b></th>
   <th><b>Joining Date</b></th> 
   <th><b>Desig.</b></th>
   <th><b>Deptt.</b></th> 
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
<td>  {{$emp->id}}</td>
    <th>{{$emp->emp_code}}</th>
    <th>{{ucfirst($emp->name)}}</th>
    <th>{{$emp->email}}</th>
    <th>{{$emp->desigantion}}</th>
    <th>{{$emp->phone}}</th>
    <th>{{$emp->joining_date}}</th>
    <th>{{$emp->desigantion}}</th>
    <th>{{$emp->department}}</th>
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
@endsection