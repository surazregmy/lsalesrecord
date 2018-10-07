<table id="example1" class="table table-bordered table-striped">
        <thead style="background-image: -webkit-gradient(linear, left top, left bottom, from(#f1eeed), to(#666e96));">
        <tr>
          <th>S.N.</th>
          <th>Bill No</th>
          <th>Debtor Name</th>
          <th>Purchase Date</th>
          <th>Total Amount</th>
          <th>Entered By</th>
          <th>Manage</th>
        </tr>
        </thead>
        <tbody>
          @if(count($pbills)>0)
             @php ($i = 1)  {{-- // declare the variable   --}}
            @foreach($pbills as $pbill)
              <tr>
                <td>{{$i}}</td>
                <td>{{$pbill->pbill_original_id}}</td>
                <td>{{$pbill->debtor->debtor_name}}</td>                          
                <td>{{$pbill->p_date_of_purchase_n}}</td>
                <td>{{$pbill->p_total_amount}}</td>
                <td>{{$pbill->p_entered_by}}</td>
                <td class="text-left" style="padding:0px">
                    <div class='delete' style="display:inline;">
                        {!! Form::open(['class'=>'del','action'=>['Pbills\PbillsController@destroy',$pbill->pbill_id],'style'=>'display:inline;','method'=>'POST','id'=>$pbill->pbill_id]) !!}
                        {!! Form::hidden('_method','DELETE') !!}
                        <button type="button" class="btnk btn btn-danger btn-xs cdelete" onclick="deleteItem({{$pbill->pbill_id}})"><i class="fa fa-trash margin-r-5"></i></button>
                        {!! Form::close() !!}  
                    </div>
                    <div style="display:inline;float: right clear">
                      <a href="/pbills/{{$pbill->pbill_id}}" class="btn btn-primary btn-xs"><i class="fa fa-check"></i></a>
                      <a href="/pbills/{{$pbill->pbill_id}}/edit" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
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
<script>


</script>
    