<table id="example1" class="table table-bordered table-striped">
    <thead style="background-image: -webkit-gradient(linear, left top, left bottom, from(#f1eeed), to(#666e96));">
    <tr>
      <th>S.N.</th>
      <th>Bill No</th>
      {{-- <th>Creditor Name</th> --}}
      <th>Sale Date</th>
      <th>Type</th>
      <th>Sub Total</th>
      <th style="padding:1px">Final Discount</th>
      <th>Total</th>
      <th>paid</th>
      <th>Due</th>
      <th>Status</th>
      <th style="padding:1px">Entered By</th>
      <th>Manage</th>
    </tr>
    </thead>
    <tbody>
      @if(count($sbills)>0)
         @php ($i = 1)  {{-- // declare the variable   --}}
        @foreach($sbills as $sbill)
          <tr>
            <td>{{$i}}</td>
            <td>{{$sbill->sbill_generated_id}}</td>
            {{-- <td>{{$sbill->creditor->creditor_name}}</td>                           --}}
            <td>{{$sbill->s_date_of_sale_n}}</td>
            <td>{{$sbill->sbill_type}}</td>
            <td>{{$sbill->s_sub_total_amount}}</td>
            <td>{{$sbill->s_fin_discount_amount}}</td>
            <td>{{$sbill->s_fin_total_amount}}</td>
            <td>{{$sbill->s_paid_amount}}</td>
            <td>{{$sbill->s_rem_amount}}</td>
            <td>Clear</td>
            <td>{{$sbill->s_entered_by}}</td>
            <td class="text-left" style="padding:0px">
                <div class='delete' style="display:inline;">
                    {!! Form::open(['class'=>'del','action'=>['Sbills\SbillsController@destroy',$sbill->sbill_id],'style'=>'display:inline;','method'=>'POST','id'=>$sbill->sbill_id]) !!}
                    {!! Form::hidden('_method','DELETE') !!}
                    <button type="button" class="btnk btn btn-danger btn-xs cdelete" onclick="deleteItem({{$sbill->sbill_id}})"><i class="fa fa-trash margin-r-5"></i></button>
                    {!! Form::close() !!}  
                </div>
                <div style="display:inline;float: right clear">
                  <a href="/sbills/{{$sbill->sbill_id}}" class="btn btn-primary btn-xs"><i class="fa fa-check"></i> </a>
                  <a href="/sbills/{{$sbill->sbill_id}}/edit" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> </a>
                </div>
             </td>                      
          </tr>
         @php ($i++)
        @endforeach
      @endif
    </tbody>
  </table>
  <script>
    $(function () {
      $("#example1").DataTable();
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false
      });
    });
  </script>