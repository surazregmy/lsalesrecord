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
        @foreach($sbills as $sbill)
          @php ($balance = $balance + $sbill->s_fin_total_amount)
          <tr>
            <td>{{$i}}</td>
            <td><b>SBill:</b><a href="/sbills/{{$sbill->sbill_id}}">{{$sbill->sbill_original_id}}</a></td>                      
            <td>{{$sbill->s_fin_total_amount}}</td>  
            <td></td>  
            <td>{{$balance}}</td>                 
          </tr>
         @php ($i++)
        @endforeach
        @foreach($sreceipts as $sreceipt)
          @php ($balance = $balance - $sreceipt->s_rec_amount)
          <tr>
            <td>{{$i}}</td>
            <td><b>Receipt:</b><a href="/preceipts/{{$sreceipt->s_rec_id}}">{{$sreceipt->s_rec_no}}</a></td>                         
            <td></td>
            <td>{{$sreceipt->s_rec_amount}}</td> 
            <td>{{$balance}}</td>                 
          </tr>
         @php ($i++)
        @endforeach
    
        @foreach($srbills as $srbill)
        @php ($balance = $balance - $srbill->sr_total_amount)
        <tr>
          <td>{{$i}}</td>
          <td><b>SRBill:</b><a href="/srbills/{{$srbill->srbill_id}}">{{$srbill->srbill_original_id}}</a></td>                         
          <td></td> 
          <td>{{$srbill->sr_total_amount}}</td>
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

