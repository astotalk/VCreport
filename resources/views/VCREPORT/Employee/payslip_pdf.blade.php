@extends('VCREPORT.layouts.master')
@section('content-header')
<style>
  table, th, td {
  border: 1px solid black;
}
.btn {
  background-color: DodgerBlue;
  border: none;
  color: white;
  padding: 12px 30px;
  font-size: 20px;
  text-align:center;
}
</style>

 
        <table border="1"  style="width:100%">  
        
          <tr height="100px" style="background-color:#363636;color:#ffffff;text-align:center;font-size:24px; font-weight:600;">

            <td><img style="border-radius: 100% 100%;" src="{{asset('lts_assets/images/layout_img/latech.jfif')}}" width="50" alt="" colspan='4'>Latech-solutions Pvt.Ltd.</td><br>
            </tr><br>
             </table><br><br>
            @foreach ($add_salary_emp as $key => $salaryslip)
            <table style="padding: 11px;" colspan="10">
             
              <tr>
              <th colspan="10" style="text-align:center;">Payslip for the month of March 2023 </th>
              </tr>
              <tr>
                  <td style="text-align:left;border:none;font-weight:30">Name :</td>
                  <td  style="text-align:left;border:none">{{$salaryslip->name}}</td>
                  <td style="text-align:left;border:none;font-weight:20">Aadhar Number :</td>
                  <td  style="text-align:left;border:none">{{$salaryslip->adhar_no}}</td>
              </tr>
  <!-----2 row--->
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
       
        <a href="{{route('payslip_pdf')}}">Download PDF</a> 
     @endforeach
    
@endsection
@section('scripts')
 <script> 
 $(document).ready(function(){


});   
  </script>
  @endsection