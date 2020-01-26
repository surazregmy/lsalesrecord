@extends('layouts.apptheme')
@section('content')
<section class="content">
    <!-- Default box -->
  <div class="row" style="margin-left:0px; margin-right:0px"> 
    <div class="box">
        <div class="box-header with-border">
            <section class="content-header">
            <h4 class="text-center" style="float:center">Detail on {{$type2}}</h4>
            </section>         
        </div>
      <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead style="background-image: -webkit-gradient(linear, left top, left bottom, from(#f1eeed), to(#666e96));">
                <tr>
                    <th>S.N.</th>
                    <th>Bill No</th>
                    <th>Creditor Name</th>
                    <th>Sale Date</th>
                    <th>Type</th>
                    <th>Sub Total</th>
                    <th>Final Discount</th>
                    <th>Total</th>
                    <th>paid</th>
                    <th>Due</th>
                    <th>Status</th>
                    <th>Entered By</th>
                    <th>Profit</th>
                </tr>
                </thead>
                <tbody>
                    @if(count($sdbills)>0)
                        @php ($i = 1)  {{-- // declare the variable   --}}
                    @foreach($sdbills as $sbill)
                        <tr>
                        <td>{{$i}}</td>
                        <td>{{$sbill->sbill_generated_id}}</td>
                        <td>{{$sbill->creditor->creditor_name}}</td>                          
                        <td>{{$sbill->s_date_of_sale_n}}</td>
                        <td>{{$sbill->sbill_type}}</td>
                        <td>{{$sbill->s_sub_total_amount}}</td>
                        <td>{{$sbill->s_fin_discount_amount}}</td>
                        <td>{{$sbill->s_fin_total_amount}}</td>
                        <td>{{$sbill->s_paid_amount}}</td>
                        <td>{{$sbill->s_rem_amount}}</td>
                        <td>{{$sbill->status}}</td>
                        <td>{{$sbill->s_entered_by}}</td>
                        <td>{{$sbill->profit_amount}}</td>                
                        </tr>
                        @php ($i++)
                    @endforeach
                    @endif
                </tbody>
        </table>  
       
        <div class="box-header with-border">
            <section class="content-header">
            <h4 class="text-center" style="float:center">Detail on {{$type1}}</h4>
            </section>         
        </div>

        <table id="example3" class="table table-bordered table-striped">
            <thead style="background-image: -webkit-gradient(linear, left top, left bottom, from(#f1eeed), to(#666e96));">
            <tr>
              <th>S.N.</th>
              <th>Bill No</th>
              <th>Creditor Name</th>
              <th>Sale Date</th>
              <th>Type</th>
              <th>Sub Total</th>
              <th>Final Discount</th>
              <th>Total</th>
              <th>paid</th>
              <th>Due</th>
              <th>Status</th>
              <th>Entered By</th>
              <th>Profit</th>
            </tr>
            </thead>
            <tbody>
              @if(count($sbills)>0)
                 @php ($i = 1)  {{-- // declare the variable   --}}
                @foreach($sbills as $sbill)
                  <tr>
                    <td>{{$i}}</td>
                    <td>{{$sbill->sbill_generated_id}}</td>
                    <td>{{$sbill->creditor->creditor_name}}</td>                          
                    <td>{{$sbill->s_date_of_sale_n}}</td>
                    <td>{{$sbill->sbill_type}}</td>
                    <td>{{$sbill->s_sub_total_amount}}</td>
                    <td>{{$sbill->s_fin_discount_amount}}</td>
                    <td>{{$sbill->s_fin_total_amount}}</td>
                    <td>{{$sbill->s_paid_amount}}</td>
                    <td>{{$sbill->s_rem_amount}}</td>
                    <td>{{$sbill->status}}</td>
                    <td>{{$sbill->s_entered_by}}</td>
                    <td>{{$sbill->profit_amount}}</td>                
                  </tr>
                 @php ($i++)
                @endforeach
              @endif
            </tbody>
        </table>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        
      </div>
      <!-- /.box-footer-->
    </div>
  </div>


  
</section>
@endsection