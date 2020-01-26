@extends('layouts.apptheme')
@section('content')
<section class="content">
    <!-- Default box -->
  <div class="row" style="margin-left:0px; margin-right:0px"> 
    <div class="box">
        <div class="box-header with-border">
            <section class="content-header">
            <h4 class="text-center" style="float:center">Detail on {{$type}}</h4>
            </section>         
        </div>
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead style="background-image: -webkit-gradient(linear, left top, left bottom, from(#f1eeed), to(#666e96));">
            <tr>
              <th>S.N.</th>
              <th>SR Bill No</th>
              <th>Creditor Name</th>
              <th>Return Date</th>
              <th>Entered By</th>
              <th>Total</th>
            </tr>
            </thead>
            <tbody>
              @if(count($srbills)>0)
                 @php ($i = 1)  {{-- // declare the variable   --}}
                @foreach($srbills as $srbill)
                  <tr>
                    <td>{{$i}}</td>
                    <td>{{$srbill->srbill_generated_id}}</td>
                    <td>{{$srbill->creditor->creditor_name}}</td>                          
                    <td>{{$srbill->sr_date_of_ret_n}}</td>
                    <td>{{$srbill->sr_entered_by}}</td>
                    <td>{{$srbill->sr_total_amount}}</td>                    
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
  <div id="salersresult">

  </div>
</section>
@endsection