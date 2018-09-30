@extends('layouts.apptheme')
@section('content')
<section class="invoice">
  <!-- title row -->
  <div class="row">
    <div class="col-xs-12">
      <h3 class="page-header text-center">
        ईश्वर प्लम्बिङ पसल
      </h3>
    </div>
    <!-- /.col -->
  </div>
  <div class="row">
    <div class="col-xs-7 table-responsive">
      <table class="table table-condensed" style="border: none;">
        <tbody>
        <tr>
          <td>Pbill No: </td>
        <td>{{$prbill->prbill_original_id}}</td>
        </tr>
        <tr>
          <td>Debtor's Name</td>
          <td>{{$prbill->debtor->debtor_name}}</td>
        </tr>
        <tr>
          <td>Debtor's Address</td>
          <td>{{$prbill->debtor->d_address}}</td>
        </tr>
        <tr>
          <td>Phone no</td>
          <td>{{$prbill->debtor->d_prim_phone}}</td>
        </tr>
        <tr>
          <td>Date of purchase</td>
          <td>{{$prbill->p_date_of_purchase_n}}</td>
        </tr>
        <tr>
          <td>Entered By</td>
          <td>{{$prbill->p_entered_by}}</td>
        </tr>
        </tbody>
      </table>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
  <div class="row text-center" >
    <h4>Particulars</h4>
  </div>
 <div class="row">
    <div class="col-xs-12 table-responsive">
      <table class="table table-bordered table-condensed">
        <thead>
        <tr>
          <th>S.N</th>
          <th>Item Name</th>
          <th>Quantity(unit)</th>
          <th>Rate(Rs.)</th>
          <th>Total</th>
        </tr>
        </thead>
        <tbody>
            @php ($i = 1)
            @foreach ($prbill->prbillitem as $prbitem)   
            <tr>
                   <td>{{$i}}</td>
                   <td>{{$prbitem->item[0]['item_name']}}</td>
                   <td>{{$prbitem->quantity}}</td>
                   <td>{{$prbitem->rate}}</td>
                   <td>{{$prbitem->total}}</td>
                   @php ($i++)
            </tr>
            @endforeach
         <tfoot>
              <tr>
                <th></th>
                <th colspan="3" style="text-center">Total</th>
                <th>{{$prbill->pr_total_amount}}</th>
              </tr>
          </tfoot>
        </tbody>
      </table>
    </div>
    <!-- /.col -->
  </div>

  <!-- this row will not appear when printing -->
  <div class="row no-print">
    <div class="col-xs-12">
      <a href="/printpbill/{{$prbill->prbill_id}}" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
      {{-- <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
      </button> --}}
      <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
        <i class="fa fa-download"></i> Generate PDF
      </button>
    </div>
  </div>
</section>
<!-- /.content -->
<div class="clearfix"></div>
@endsection