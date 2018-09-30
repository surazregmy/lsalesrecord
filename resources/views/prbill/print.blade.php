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
        <td>{{$pbill->pbill_original_id}}</td>
        </tr>
        <tr>
          <td>Debtor's Name</td>
          <td>{{$pbill->debtor->debtor_name}}</td>
        </tr>
        <tr>
          <td>Debtor's Address</td>
          <td>{{$pbill->debtor->d_address}}</td>
        </tr>
        <tr>
          <td>Phone no</td>
          <td>{{$pbill->debtor->d_prim_phone}}</td>
        </tr>
        <tr>
          <td>Date of purchase</td>
          <td>{{$pbill->p_date_of_purchase_n}}</td>
        </tr>
        <tr>
          <td>Entered By</td>
          <td>{{$pbill->p_entered_by}}</td>
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
            @foreach ($pbill->pbillitem as $pbitem)   
            <tr>
                   <td>{{$i}}</td>
                   <td>{{$pbitem->item[0]['item_name']}}</td>
                   <td>{{$pbitem->quantity}}</td>
                   <td>{{$pbitem->rate}}</td>
                   <td>{{$pbitem->total}}</td>
                   @php ($i++)
            </tr>
            @endforeach
         <tfoot>
              <tr>
                <th></th>
                <th colspan="3" style="text-center">Total</th>
                <th>{{$pbill->p_total_amount}}</th>
              </tr>
          </tfoot>
        </tbody>
      </table>
    </div>
    <!-- /.col -->
  </div>
  
</section>
<!-- /.content -->
<div class="clearfix"></div>
@endsection

@section('pagespecificscripts')
<body onload="window.print();">
@endsection