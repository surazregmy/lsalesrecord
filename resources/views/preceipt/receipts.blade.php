<table id="example1" class="table table-bordered table-striped">
        <thead style="background-image: -webkit-gradient(linear, left top, left bottom, from(#f1eeed), to(#666e96));">
        <tr>
          <th>S.N.</th>
          <th>Receipt No</th>
          <th>Debotrs Name</th>
          <th>Date of Pay</th>
          <th>Paid Amount</th>
          <th>Entered By</th>
          <th>Manage</th>
        </tr>
        </thead>
        <tbody>
          @if(count($preceipts)>0)
             @php ($i = 1)  {{-- // declare the variable   --}}
            @foreach($preceipts as $preceipt)
              <tr>
                <td>{{$i}}</td>
                <td>{{$preceipt->p_rec_no}}</td>
                <td>{{$preceipt->debtor->debtor_name}}</td>                          
                <td>{{$preceipt->p_rec_date_of_pay_n}}</td>
                <td>{{$preceipt->p_rec_amount}}</td>
                <td>{{$preceipt->p_rec_entered_by}}</td>
                <td class="text-left">
                    <div class='delete' style="display:inline;">
                        {!! Form::open(['class'=>'del','action'=>['Preceipts\PreceiptsController@destroy',$preceipt->p_rec_id],'style'=>'display:inline;','method'=>'POST','id'=>$preceipt->p_rec_id]) !!}
                        {!! Form::hidden('_method','DELETE') !!}
                        <button type="button" class="btnk btn btn-danger btn-xs cdelete" onclick="deleteItem({{$preceipt->p_rec_id}})"><i class="fa fa-trash margin-r-5"></i>Delete</button>
                        {!! Form::close() !!}  
                    </div>
                    <div style="display:inline;float: right clear">
                      <a href="/preceipts/{{$preceipt->p_rec_id}}" class="btn btn-primary btn-xs"><i class="fa fa-check"></i> View</a>
                      <a href="/preceipts/{{$preceipt->p_rec_id}}/edit" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit</a>
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