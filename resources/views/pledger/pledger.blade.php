<table id="example1" class="table table-bordered table-striped">
        <thead style="background-image: -webkit-gradient(linear, left top, left bottom, from(#f1eeed), to(#666e96));">
        <tr>
          <th>S.N.</th>
          <th>Particulars</th>
          <th>Debit(Rs.)</th>
          <th>Credit(Rs.)</th>
          <th>Balance(Rs)</th>
        </tr>
        </thead>
        <tbody>
          @php ($balance = 0)
             @php ($i = 1)  {{-- // declare the variable   --}}
            @foreach($pbills as $pbill)
              @php ($balance = $balance + $pbill->p_total_amount)
              <tr>
                <td>{{$i}}</td>
                <td><b>PBill:</b><a href="/pbills/{{$pbill->pbill_id}}">{{$pbill->pbill_original_id}}</a></td>
                <td></td>                          
                <td>{{$pbill->p_total_amount}}</td>  
                <td>{{$balance}}</td>                 
              </tr>
             @php ($i++)
            @endforeach
            @foreach($preceipts as $preceipt)
              @php ($balance = $balance - $preceipt->p_rec_amount)
              <tr>
                <td>{{$i}}</td>
                <td><b>Receipt:</b><a href="/preceipts/{{$preceipt->p_rec_id}}">{{$preceipt->p_rec_no}}</a></td>                         
                <td>{{$preceipt->p_rec_amount}}</td>
                <td></td> 
                <td>{{$balance}}</td>                 
              </tr>
             @php ($i++)
            @endforeach
            @foreach($prbills as $prbill)
            @php ($balance = $balance - $prbill->p_total_amount)
            <tr>
              <td>{{$i}}</td>
              <td><b>PRBill:</b><a href="/prbills/{{$prbill->prbill_id}}">{{$prbill->prbill_original_id}}</a></td>                         
              <td>{{$prbill->pr_total_amount}}</td>
              <td></td> 
              <td>{{$balance}}</td>                 
            </tr>
           @php ($i++)
          @endforeach
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

    