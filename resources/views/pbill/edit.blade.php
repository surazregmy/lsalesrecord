@extends('layouts.apptheme')
@section('content')
<section class="content">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-8">
            <!-- TABLE: Purchase Bills -->
            <div class="box box-info">
              <div class="box-header with-border  text-center">
                <h3 class="box-title" ><b>Items Detail</b></h3>
              </div>
              <!-- /.box-header -->
              {!! Form::open(['action'=>['Pbills\PbillsController@update',$pbill->pbill_id],'method'=>'PUT']) !!}
              <div class="box-body">
                <div class="table-responsive">
                  <table class="table no-margin" id="input_item">
                    <thead>
                    <tr>
                      <th>S.N.</th>
                      <th style="width: 45%">Item Name</th>
                      <th>Quantity</th>
                      <th>Rate</th>
                      <th>Total</th>
                    </tr>
                    </thead>
                    <tbody class="detail">
                    @php ($i = 1)
                     @foreach ($pbill->pbillitem as $pbitem)   

                     <tr>
                            <td>{{$i}}</td>
                            <td>
                            <select name = "{{'item'.$i}}" class="select2 form-control" style="width: 100%";>
                                  <option value="<?php echo $pbitem->item_id?>"  selected="selected" >{{$pbitem->item[0]['item_name']}}</option>
                                      <?php foreach($items as $item): ?>
                                                 <option value="<?php echo $item['item_id'] ?>"><?php echo $item['item_name'];?></option>          
                                       <?php endforeach ?>
                                   </select>
                              </td>
                            <td> {{form:: text('quantity'.$i,$pbitem->quantity,['class'=>'form-control quantity','placeholder'=>'Quantity'])}}</td>
                            <td> {{form:: text('rate'.$i,$pbitem->rate,['class'=>'form-control rate','placeholder'=>'Rate'])}}</td>
                            <td> {{form:: text('total'.$i,$pbitem->total,['class'=>'form-control total','placeholder'=>'Total'])}}</td>
                            @php ($i++)
                        </tr>
                     @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.box-body -->
              <div class="box-footer clearfix">
                <a href="javascript:void(0)" id = "add" class="btn btn-sm btn-danger btn-flat pull-left" onclick="deletelastrow()" >Delete Last Row</a>

                <a href="javascript:void(0)" id = "add" class="btn btn-sm btn-warning btn-flat pull-right" onclick="addnewrow()" >Add New Row</a>
              </div>
              <!-- /.box-footer -->
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->
  
          <div class="col-md-4">
            <!-- PRODUCT LIST -->
            <div class="box box-primary">
              <div class="box-header with-border text-center">
                <h3 class="box-title"><b>Total</b></h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-4 text-center">
                            {{form:: label('total_amount','Total Amount: ','',['class'=>'form-control '])}}
                            </div>
                            <div class="col-sm-8">
                            {{form:: text('total_amount',$pbill->p_total_amount,['class'=>'form-control grandtotal','placeholder'=>'Item name'])}}
                            </div>
                        </div>
                    </div>
            </div>
            <!-- /.box -->
              <!-- PRODUCT LIST -->
              <div class="box box-primary">
                    <div class="box-header with-border text-center">
                      <h3 class="box-title"><b>Bill Details</b></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                          <div class="form-group">
                              <div class="row">
                                  <div class="col-sm-4 text-center">
                                  {{form:: label('d_id','Debtor Name: ','',['class'=>'form-control'])}}
                                  </div>
                                  <div class="col-sm-8">
                                        <select name = "d_id" class="select2 form-control" style="width: 100%";>
                                        <option value="{{$pbill->debtor->debtor_id}}"  selected="selected" >{{$pbill->debtor->debtor_name}}</option>
                                                <?php foreach($debtors as $debtor): ?>
                                                           <option value="<?php echo $debtor['debtor_id'] ?>"><?php echo $debtor['debtor_name'];?></option>          
                                                 <?php endforeach ?>
                                             </select>
                                  </div>
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="row">
                                  <div class="col-sm-4 text-center">
                                  {{form:: label('pbill_original_id','Bill No: ','',['class'=>'form-control'])}}
                                  </div>
                                  <div class="col-sm-8">
                                  {{form:: text('pbill_original_id',$pbill->pbill_original_id,['class'=>'form-control','placeholder'=>'Bill No'])}}
                                  </div>
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="row">
                                  <div class="col-sm-4 text-center">
                                  {{form:: label('Date of Purchase','Date of Purchase : ','',['class'=>'form-control'])}}
                                  </div>
                                  <div class="col-sm-8">
                                  {{form:: text('date_of_purchase',$pbill->p_date_of_purchase_n,['class'=>'form-control bod-picker','placeholder'=>'date'])}}
                                  </div>
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="row">
                                  <div class="col-sm-4 text-center">
                                  {{form:: label('entered_by','Entered By : ','',['class'=>'form-control'])}}
                                  </div>
                                  <div class="col-sm-8">
                                  {{form:: text('entered_by',$pbill->p_entered_by,['class'=>'form-control','readonly'])}}
                                  </div>
                              </div>
                          </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                            {{Form::hidden('pbill_old_id', $pbill->pbill_generated_id) }}
                            {{form:: submit('update',['class'=>'btn btn-md btn-info btn-flat pull-left','onclick'=>"changeC()",'name'=>'update'])}} 
                            {{-- <a href="javascript:void(0)" class="btn btn-md btn-info btn-flat pull-left" onclick="changeC()">Save</a> --}}
                            {{form:: submit('Update and Exit',['class'=>'btn btn-md btn-default btn-flat pull-right','onclick'=>"changeC()",'name'=>'update_and_exit'])}}
                            {{-- <a href="javascript:void(0)" class="btn btn-md btn-default btn-flat pull-right">Update and Exit</a> --}}
                    </div>
                    <!-- /.box-footer -->
                  </div>
                  <!-- /.box -->
                  {!! Form::close() !!}                  
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
@endsection

@section('pagespecificscripts')
<script src="{{asset('js/custom/pbill_js.js')}}"></script>
<script src="{{asset('js/blockUI/blockUI.js')}}"></script>
<script>
    function addnewrow(){
      var o = <?php echo json_encode($items); ?>;
    //   var k = JSON.stringify(complex);
    //   var o = JSON.parse(k);

      var n =($('.detail tr').length)+1; 
      var count = Object.keys(o).length;

      var string ="<option value=\"\" selected=\"selected\" >Select Item</option>";
      var form_string = " class=\"form-control select2 \" style=\"width: 100%;\"";

      for(var i=0; i<count; i++){
        string = string+'<option value = \" '+ o[i].item_id+'\"'+'>'+o[i].item_name+ '</option>';
      }
      
      var vartrk = 
      '<tr>'+  
          '<td class="no">'+n+'</td>'+  
          '<td><select name =item'+n+form_string+'>'+ string +'</select></td>'+  
          '<td><input type="text" min=0  name="quantity'+n+'" class="quantity form-control"></td>'+  
          '<td><input type="text" min=0 step = "0.0001"  name="rate'+n+'" class="rate form-control"></td>'+  
          '<td><input type="text" min=0 step = "0.0001"  name="total'+n+'" class="total form-control"></td>'+ 
        '</tr>'; 

    $('.detail').append(vartrk); 

     // This is the one to load the select2 bootstrap plugin again
            // It is also necessary to load the multiply function
            $(document).ready(function() {
                $(".select2").select2();

                $('body').delegate('.quantity,.rate,.total','keyup',function(){  
                  var tr=$(this).parent().parent();  
                  var qty=tr.find('.quantity').val();  
                  var price=tr.find('.rate').val();  
                  var amt =(qty * price);  
                  tr.find('.total').val(amt);  

                 // total();  
               });
            });
      
    }
    function deletelastrow(){
        var n =($('.detail tr').length);
        if(n > 8){
        var trtags = document.getElementsByTagName("tr");
        trtags[n].remove();
        }
        else{
            alertify.alert('Delete Last Row', 'Can not delete row < 8');
        }

    }
    function changeC(){
            var $el = $(".box-body"),
            x = 500;
        
           
        $el.block({ message: null });
        setTimeout(function(){
            $el.unblock({ message: null });
        }, x);
    }
</script>
@endsection

