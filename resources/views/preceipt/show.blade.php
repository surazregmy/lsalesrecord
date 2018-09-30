@extends('layouts.apptheme')
@section('content')
<section class="content">
    <!-- Default box -->
  <div style="margin-left:0px; margin-right:0px"> 
    <div class="box">
      <div class="box-header with-border">
      <h4 class="text-center">{{$subheading}}</h4>
      </div>
      <div class="box-body">
        <div class="col-md-8">
          <table class="table table-bordered table-striped table-hover ">
              <tr>
                <td>Purchase Record No</td>
                <td>{{$preceipt->p_rec_no}}</td>
              </tr>
              <tr>
                <td>Debtor Name</td>
                <td>{{$preceipt->debtor->debtor_name}}</td>
              </tr>
              <tr>
                  <td>Date of Pay</td>
                  <td>{{$preceipt->p_rec_date_of_pay_n}}</td>
              </tr>
              <tr>
                    <td>Paid Amount</td>
                    <td>{{$preceipt->p_rec_amount}}</td>
              </tr>
              <tr>
                  <td>Entered BY</td>
                  <td>{{$preceipt->p_rec_entered_by}}</td>
              </tr>
            </table>
        </div>
            

      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        
      </div>
      <!-- /.box-footer-->
    </div>
  </div>
</section>
@endsection