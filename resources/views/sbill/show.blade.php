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
          <td>Sbill No: </td>
        <td>{{$sbill->sbill_original_id}}</td>
        </tr>
        <tr>
          <td>Creditor Name</td>
          <td>{{$sbill->creditor->creditor_name}}</td>
        </tr>
        <tr>
          <td>Creditor Address</td>
          <td>{{$sbill->creditor->c_address}}</td>
        </tr>
        <tr>
          <td>Phone no</td>
          <td>{{$sbill->creditor->c_prim_phone}}</td>
        </tr>
        <tr>
          <td>Date of purchase</td>
          <td>{{$sbill->s_date_of_sale_n}}</td>
        </tr>
        <tr>
            <td>Type</td>
            <td>{{$sbill->sbill_type}}</td>
        </tr>
        <tr>
          <td>Entered By</td>
          <td>{{$sbill->s_entered_by}}</td>
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
          <th>Discount(%)</th>
          <th>Total</th>
        </tr>
        </thead>
        <tbody>
            @php ($i = 1)
            @foreach ($sbill->sbillitem as $sbitem)   
            
            @if($sbitem->discount == 0)
                @php ($d = '')
            @else
            @php ($d = $sbitem->discount)
            @endif
            <tr>
                   <td>{{$i}}</td>
                   <td>{{$sbitem->item[0]['item_name']}}</td>
                   <td>{{$sbitem->quantity}}</td>
                   <td>{{$sbitem->rate}}</td>
                   <td>{{$d}}</td>
                   <td>{{$sbitem->total}}</td>
                   @php ($i++)
            </tr>
            @endforeach
         <tfoot>
              <tr>
                <th></th>
                <th></th>
                <th colspan="3" style="text-center">Subtotal</th>
                <th>{{$sbill->s_sub_total_amount}}</th>
              </tr>
              <tr>
                <th></th>
                <th></th>
                <th colspan="3" style="text-center">Discount</th>
                <th>{{$sbill->s_fin_discount_amount}}</th>
              </tr>
              <tr>
                <th></th>
                <th></th>
                <th colspan="3" style="text-center">Total</th>
                <th>{{$sbill->s_fin_total_amount}}</th>
              </tr>
              @if($sbill->sbill_type == 'halfpaid')
                <tr>
                    <th></th>
                    <th></th>
                    <th colspan="3" style="text-center">Amount Paid</th>
                    <th>{{$sbill->s_paid_amount}}</th>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th colspan="3" style="text-center">Amount Due</th>
                    <th>{{$sbill->s_rem_amount}}</th>
                </tr>
              @endif
              
          </tfoot>
        </tbody>
      </table>
    </div>
    <!-- /.col -->
  </div>

  <!-- this row will not appear when printing -->
  <div class="row no-print">
    <div class="col-xs-12">
      <a href="/printsbill/{{$sbill->sbill_id}}" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
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