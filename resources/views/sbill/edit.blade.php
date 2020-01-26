@extends('layouts.apptheme')
@section('content')
<section class="content">
        <!-- Main row -->
        {!! Form::open(['action'=>['Sbills\SbillsController@update',$sbill->sbill_id],'method'=>'PUT']) !!}
        <div class="row">
          <!-- Left col -->
          <div class="col-md-8">
            <!-- TABLE: Purchase Bills -->
            <div class="box box-info">
              <div class="box-header with-border  text-center">
                <h3 class="box-title" ><b>Items Detail</b></h3>
                <div class="custom-control custom-checkbox pull-right">
                    <input type="hidden" name="status_date">
                    <input type="hidden" name="status" value="due">
                    @if($sbill->status == 'clear')
                    <input type="checkbox" checked name="status" class="custom-control-input" value="clear" id="statuscheck"  data-target="#myModal" onclick="getStatusChangedDate()">
                    <label class="custom-control-label" for="customCheck1">Clear</label>
                    &nbsp &nbsp &nbsp {{ $sbill->date_status }}
                    @else
                    <input type="checkbox"  name="status" class="custom-control-input" value="clear" id="statuscheck"  data-target="#myModal" onclick="getStatusChangedDate()">
                    <label class="custom-control-label" for="customCheck1">Clear</label>
                    @endif
                    
                </div>
              </div>
              <!-- /.box-header -->
             
              <div class="box-body">
                <div class="table-responsive">
                  <table class="table no-margin" id="input_item">
                    <thead>
                    <tr>
                      <th>S.N.</th>
                      <th style="width: 45%">Item Name</th>
                      <th>Quantity(Unit)</th>
                      <th>Rate(Rs.)</th>
                      <th>Discount(%)</th>
                      <th>Total(Rs.)</th>
                    </tr>
                    </thead>
                    <tbody class="detail">
                    @php($i = 1)
                    @foreach ($sbill->sbillitem as $sbitem)  
                    <tr>
                      <td>{{$i}}</td>
                      <td>
                      <select name = "{{'item'.$i}}" id="{{'form-item'.$i}}"  class="{{'select2 form-control form-item'.$i}}" style="width: 100%";>
                            <option value="<?php echo $sbitem->item_id?>"  selected="selected" >{{$sbitem->item[0]['item_name']}}</option>
                                <?php foreach($items as $item): ?>
                                     <option value="<?php echo $item['item_id'] ?>"><?php echo $item['item_name'];?></option>          
                                <?php endforeach ?>             
                             </select>
                        </td>
                      <td> {{form:: text('quantity'.$i,$sbitem->quantity,['class'=>'form-control quantity','placeholder'=>'Quantity'])}}</td>
                      <td> {{form:: text('rate'.$i,$sbitem->rate,['class'=>'form-control rate','placeholder'=>'Rate'])}}</td>
                      <td> {{form:: text('discount'.$i,$sbitem->discount,['class'=>'form-control discount','placeholder'=>'discount'])}}</td>
                      <td> {{form:: text('total'.$i,$sbitem->total,['class'=>'form-control total','placeholder'=>'Total'])}}</td>
                    </tr>
                    @php ($i++)
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
                      <h3 class="box-title"><b>Bill Details</b></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                          <div class="form-group">
                              <div class="row">
                                  <div class="col-sm-4 text-center">
                                  {{form:: label('c_id','Creditor Name: ','',['class'=>'form-control'])}}
                                  </div>
                                  <div class="col-sm-8">
                                        <select name = "c_id" class="select2 form-control" style="width: 100%";>
                                                <option value="{{$sbill->creditor->creditor_id}}"  selected="selected" >{{$sbill->creditor->creditor_name}}</option>
                                                <?php foreach($creditors as $creditor): ?>
                                                           <option value="<?php echo $creditor['creditor_id'] ?>"><?php echo $creditor['creditor_name'];?></option>          
                                                 <?php endforeach ?>
                                             </select>
                                         </select>
                                  </div>
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="row">
                                  <div class="col-sm-4 text-center">
                                  {{form:: label('sbill_original_id','Bill No: ','',['class'=>'form-control'])}}
                                  </div>
                                  <div class="col-sm-8">
                                  {{form:: text('sbill_original_id',$sbill->sbill_original_id,['class'=>'form-control','placeholder'=>'Bill No'])}}
                                  </div>
                              </div>
                          </div>
                          <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4 text-center">
                                    {{form:: label('sbill_type','Type: ','',['class'=>'form-control'])}}
                                    </div>
                                    <div class="col-sm-8">
                                    {{ Form::select('sbill_type', 
                                    array('credit' => 'Credit', 'cash' => 'Cash','halfpaid'=>'Halfpaid',''=>'Select'), $sbill->sbill_type,
                                    ['class' => 'form-control formtype','id'=>'form_type'])}}
                                    </div>
                                </div>
                            </div>
                          <div class="form-group">
                              <div class="row">
                                  <div class="col-sm-4 text-center">
                                  {{form:: label('Date of Sale','Date of Sale : ','',['class'=>'form-control'])}}
                                  </div>
                                  <div class="col-sm-8">
                                  {{form:: text('date_of_sale',$sbill->s_date_of_sale_n,['class'=>'form-control bod-picker','placeholder'=>'date'])}}
                                  </div>
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="row">
                                  <div class="col-sm-4 text-center">
                                  {{form:: label('entered_by','Entered By : ','',['class'=>'form-control'])}}
                                  </div>
                                  <div class="col-sm-8">
                                  {{form:: text('entered_by',$sbill->s_entered_by,['class'=>'form-control','readonly'])}}
                                  </div>
                              </div>
                          </div>
                          <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4 text-center">
                                    <input type="hidden" name="add_pan">
                                    {{form:: label('add_pan','Add PAN?: ','',['class'=>'form-control'])}}
                                    </div>
                                    <div class="col-sm-8">
                                    @if($sbill->pan_enable == "on")    
                                     <input type="checkbox"  checked name="addPan" class="custom-control-input" id="statuscheck">
                                    @else
                                    <input type="checkbox" name="addPan" class="custom-control-input" id="statuscheck">
                                    @endif
                                    </div>
                                </div>
                            </div>
                          <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4 text-center">
                                {{form:: label('comment','Comment : ','',['class'=>'form-control'])}}
                                </div>
                                <div class="col-sm-8">
                                    {{form:: textarea('comment',$sbill->comment,['class'=>'form-control','placeholder'=>'notes','rows'=>'3'])}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                      <!-- PRODUCT LIST -->
                    <div class="box box-primary">
                        <div class="box-header with-border text-center">
                        <h3 class="box-title"><b>Total</b></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body amount_details" id ='amt_details'>
                            <div class="form-group" id ="sub_tot">
                                <div class="row">
                                    <div class="col-sm-4 text-center">
                                    {{form:: label('sub_total','Sub Total: ','',['class'=>'form-control '])}}
                                    </div>
                                    <div class="col-sm-8">
                                    {{form:: text('sub_total',$sbill->s_sub_total_amount,['class'=>'form-control grandtotal','placeholder'=>'Item name'])}}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" id ="dis_amt">
                                    <div class="row">
                                        <div class="col-sm-4 text-center">
                                        {{form:: label('dis_amt','Discount Amount: ','',['class'=>'form-control '])}}
                                        </div>
                                        <div class="col-sm-8">
                                        {{form:: text('dis_amt',$sbill->s_fin_discount_amount,['class'=>'form-control final_discount','placeholder'=>'Item name'])}}
                                        </div>
                                    </div>
                             </div>
                             <div class="form-group" id ="tot_amt">
                                    <div class="row">
                                        <div class="col-sm-4 text-center">
                                        {{form:: label('tot_amt','Total Amount: ','',['class'=>'form-control '])}}
                                        </div>
                                        <div class="col-sm-8">
                                        {{form:: text('tot_amt',$sbill->s_fin_total_amount,['class'=>'form-control final_total','placeholder'=>'Item name'])}}
                                        </div>
                                    </div>
                             </div>
                            @if($sbill->sbill_type == 'halfpaid')
                            <div class="form-group" id ="paid_amt">
                                    <div class="row">
                                        <div class="col-sm-4 text-center">
                                        {{form:: label('paid_amount','Paid Amount: ','',['class'=>'form-control '])}}
                                        </div>
                                        <div class="col-sm-8">
                                        {{form:: text('paid_amount',$sbill->s_paid_amount,['class'=>'form-control paid_amt','placeholder'=>'Item name'])}}
                                        </div>
                                    </div>
                             </div>
                             <div class="form-group" id ="rem_amt">
                                    <div class="row">
                                        <div class="col-sm-4 text-center">
                                        {{form:: label('rem_amount','Remaining Amount: ','',['class'=>'form-control '])}}
                                        </div>
                                        <div class="col-sm-8">
                                        {{form:: text('rem_amount',$sbill->s_rem_amount,['class'=>'form-control rem_amt','placeholder'=>'Item name'])}}
                                        </div>
                                    </div>
                             </div>
                            @endif
                             
                    </div>
                    <!-- /.box -->
                    <div class="box-footer clearfix">
                            {{form:: submit('save',['class'=>'btn btn-md btn-info btn-flat pull-left','onclick'=>"changeC()",'name'=>'save'])}} 
                            {{-- <a href="javascript:void(0)" class="btn btn-md btn-info btn-flat pull-left" onclick="changeC()">Save</a> --}}
                            {{form:: submit('Save and Exit',['class'=>'btn btn-md btn-default btn-flat pull-right','onclick'=>"changeC()",'name'=>'save_and_exit'])}}                             
                            {{-- <a href="javascript:void(0)" class="btn btn-md btn-default btn-flat pull-right">Save and Exit</a> --}}
                    </div>
                    <!-- /.box-footer -->
                  </div>
                  <!-- /.box -->
                  {!! Form::close() !!}                  
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

         <!-- Modal -->
   <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Select Date of Clearance</h4>
        </div>
        <div class="modal-body">
          <p>Select Date</p>
          {{form:: text('status_date',$sbill->date_status,['class'=>'form-control bod-picker','id'=>'st_date','placeholder'=>'date','required'])}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
        </div>
      </div>
    </div>
      </section>

      @endsection

@section('pagespecificscripts')
<script src="{{asset('js/custom/sbill_js.js')}}"></script>
<script src="{{asset('js/blockUI/blockUI.js')}}"></script>
<script>
function addnewrow(){
var o = <?php echo json_encode($items); ?>;
//   var k = JSON.stringify(complex);
//   var o = JSON.parse(k);

var n =($('.detail tr').length)+1; 
var count = Object.keys(o).length;

var string ="<option value=\"\" selected=\"selected\" >Select Item</option>";
var form_string = " class=\"form-control select2 form-item1 \" style=\"width: 100%;\"";

for(var i=0; i<count; i++){
string = string+'<option value = \" '+ o[i].item_id+'\"'+'>'+o[i].item_name+ '</option>';
}

var vartrk = 
'<tr>'+  
'<td class="no">'+n+'</td>'+  
'<td><select name =item'+n+' id=form-item'+n+
' class="form-control select2 form-item'+n+'" style="width: 100%;"'+
'>'+ string +'</select></td>'+  
'<td><input type="text" min=0  name="quantity'+n+'" class="quantity form-control"></td>'+  
'<td><input type="text" min=0 step = "0.0001"  name="rate'+n+'" class="rate form-control"></td>'+
'<td><input type="text" min=0 step = "0.0001"  name="discount'+n+'" class="discount form-control"></td>'+    
'<td><input type="text" min=0 step = "0.0001"  name="total'+n+'" class="total form-control"></td>'+ 
'</tr>'; 

$('.detail').append(vartrk); 

// This is the one to load the select2 bootstrap plugin again
// It is also necessary to load the multiply function as well as price
$(document).ready(function() {
    $(".select2").select2();

    calculaterow();
    calculatefinaltotal();
    calculateremamt();

    $('.form-item1').change(function () {
        var tr=$(this).parent().parent();
        var item = document.getElementById("form-item1");
        var itemid = item.options[item.selectedIndex].value;
        $.each(o, function(i,v){
            if(itemid == v.item_id){                       
            tr.find('.rate').val(v.i_cur_sp);
            tr.find('.discount').val(v.i_cur_dp);
            }
            
        });
        calculaterowselect(tr);
        calculatefinaltotalselect();
        calculateremamtselect();
    
    }); 

    $('.form-item2').change(function () {
        var tr=$(this).parent().parent();
        var item = document.getElementById("form-item2");
        var itemid = item.options[item.selectedIndex].value;
        $.each(o, function(i,v){
            if(itemid == v.item_id){                       
            tr.find('.rate').val(v.i_cur_sp);
            tr.find('.discount').val(v.i_cur_dp);
            
            }
        });
        calculaterowselect(tr);
        calculatefinaltotalselect();
        calculateremamtselect();
    
    }); 

    $('.form-item3').change(function () {
        var tr=$(this).parent().parent();
        var item = document.getElementById("form-item3");
        var itemid = item.options[item.selectedIndex].value;
        $.each(o, function(i,v){
            if(itemid == v.item_id){                       
            tr.find('.rate').val(v.i_cur_sp);
            tr.find('.discount').val(v.i_cur_dp);
            
            }
        });
        calculaterowselect(tr);
        calculatefinaltotalselect();
        calculateremamtselect();
    
    }); 

    $('.form-item4').change(function () {
        var tr=$(this).parent().parent();
        var item = document.getElementById("form-item4");
        var itemid = item.options[item.selectedIndex].value;
        $.each(o, function(i,v){
            if(itemid == v.item_id){                       
            tr.find('.rate').val(v.i_cur_sp);
            tr.find('.discount').val(v.i_cur_dp);
            
            }
        });
        calculaterowselect(tr);
        calculatefinaltotalselect();
        calculateremamtselect();
    
    }); 

    $('.form-item5').change(function () {
        var tr=$(this).parent().parent();
        var item = document.getElementById("form-item5");
        var itemid = item.options[item.selectedIndex].value;
        $.each(o, function(i,v){
            if(itemid == v.item_id){                       
            tr.find('.rate').val(v.i_cur_sp);
            tr.find('.discount').val(v.i_cur_dp);
        
            }
        });
        calculaterowselect(tr);
        calculatefinaltotalselect();
        calculateremamtselect();
    
    }); 

    $('.form-item6').change(function () {
        var tr=$(this).parent().parent();
        var item = document.getElementById("form-item6");
        var itemid = item.options[item.selectedIndex].value;
        $.each(o, function(i,v){
            if(itemid == v.item_id){                       
            tr.find('.rate').val(v.i_cur_sp);
            tr.find('.discount').val(v.i_cur_dp);
        
            }
        });
        calculaterowselect(tr);
        calculatefinaltotalselect();
        calculateremamtselect();
    
    });

    $('.form-item7').change(function () {
        var tr=$(this).parent().parent();
        var item = document.getElementById("form-item7");
        var itemid = item.options[item.selectedIndex].value;
        $.each(o, function(i,v){
            if(itemid == v.item_id){                       
            tr.find('.rate').val(v.i_cur_sp);
            tr.find('.discount').val(v.i_cur_dp);
            }
        });
        calculaterowselect(tr);
        calculatefinaltotalselect();
        calculateremamtselect();
    
    });

    $('.form-item8').change(function () {
        var tr=$(this).parent().parent();
        var item = document.getElementById("form-item8");
        var itemid = item.options[item.selectedIndex].value;
        $.each(o, function(i,v){
            if(itemid == v.item_id){                       
            tr.find('.rate').val(v.i_cur_sp);
            tr.find('.discount').val(v.i_cur_dp);
            }
        });
        calculaterowselect(tr);
        calculatefinaltotalselect();
        calculateremamtselect();
    
    }); 
    
    $('.form-item9').change(function () {
        var tr=$(this).parent().parent();
        var item = document.getElementById("form-item9");
        var itemid = item.options[item.selectedIndex].value;
        $.each(o, function(i,v){
            if(itemid == v.item_id){                       
            tr.find('.rate').val(v.i_cur_sp);
            tr.find('.discount').val(v.i_cur_dp);
            }
        });
        calculaterowselect(tr);
        calculatefinaltotalselect();
        calculateremamtselect();
    
    });

    $('.form-item10').change(function () {
        var tr=$(this).parent().parent();
        var item = document.getElementById("form-item10");
        var itemid = item.options[item.selectedIndex].value;
        $.each(o, function(i,v){
            if(itemid == v.item_id){                       
            tr.find('.rate').val(v.i_cur_sp);
            tr.find('.discount').val(v.i_cur_dp);
            }
        });
        calculaterowselect(tr);
        calculatefinaltotalselect();
        calculateremamtselect();
    
    });

    $('.form-item11').change(function () {
        var tr=$(this).parent().parent();
        var item = document.getElementById("form-item11");
        var itemid = item.options[item.selectedIndex].value;
        $.each(o, function(i,v){
            if(itemid == v.item_id){                       
            tr.find('.rate').val(v.i_cur_sp);
            tr.find('.discount').val(v.i_cur_dp);
            
            }
        });
        calculaterowselect(tr);
        calculatefinaltotalselect();
        calculateremamtselect();
    
    });
    $('.form-item12').change(function () {
        var tr=$(this).parent().parent();
        var item = document.getElementById("form-item12");
        var itemid = item.options[item.selectedIndex].value;
        $.each(o, function(i,v){
            if(itemid == v.item_id){                       
            tr.find('.rate').val(v.i_cur_sp);
            tr.find('.discount').val(v.i_cur_dp);
        
            }
        });
        calculaterowselect(tr);
        calculatefinaltotalselect();
        calculateremamtselect();
    
    });
    $('.form-item13').change(function () {
        var tr=$(this).parent().parent();
        var item = document.getElementById("form-item13");
        var itemid = item.options[item.selectedIndex].value;
        $.each(o, function(i,v){
            if(itemid == v.item_id){                       
            tr.find('.rate').val(v.i_cur_sp);
            tr.find('.discount').val(v.i_cur_dp);
        
            }
        });
        calculaterowselect(tr);
        calculatefinaltotalselect();
        calculateremamtselect();
    
    });
    $('.form-item14').change(function () {
        var tr=$(this).parent().parent();
        var item = document.getElementById("form-item14");
        var itemid = item.options[item.selectedIndex].value;
        $.each(o, function(i,v){
            if(itemid == v.item_id){                       
            tr.find('.rate').val(v.i_cur_sp);
            tr.find('.discount').val(v.i_cur_dp);
        
            }
        });
        calculaterowselect(tr);
        calculatefinaltotalselect();
        calculateremamtselect();
    
    });
    $('.form-item15').change(function () {
        var tr=$(this).parent().parent();
        var item = document.getElementById("form-item15");
        var itemid = item.options[item.selectedIndex].value;
        $.each(o, function(i,v){
            if(itemid == v.item_id){                       
            tr.find('.rate').val(v.i_cur_sp);
            tr.find('.discount').val(v.i_cur_dp);
        
            }
        });
        calculaterowselect(tr);
        calculatefinaltotalselect();
        calculateremamtselect();
    
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

<script type="text/javascript">

$(document).ready(function() {

    $('.formtype').change(function () {
    var optionstatus = document.getElementById("form_type");
    var status_type = optionstatus.options[optionstatus.selectedIndex].value;
    if(status_type == 'halfpaid'){
        var el = '<div class="form-group" id="paid_amt">'+
                    '<div class="row">'+
                        ' <div class="col-sm-4 text-center">'+
                        '{{form:: label('paid_amount','Paid Amount: ','',['class'=>'form-control '])}}'+
                        '</div>'+
                        '<div class="col-sm-8">'+
                        ' {{form:: text('paid_amount','',['class'=>'form-control paid_amt','placeholder'=>'Item name'])}}'+
                        ' </div>'+
                    '</div>'+
                '</div>';
        var el1 = '<div class="form-group" id="rem_amt">'+
            '<div class="row">'+
                ' <div class="col-sm-4 text-center">'+
                '{{form:: label('rem_amount','Remaining Amount: ','',['class'=>'form-control '])}}'+
                '</div>'+
                '<div class="col-sm-8">'+
                ' {{form:: text('rem_amount','',['class'=>'form-control rem_amt','placeholder'=>'Item name'])}}'+
                ' </div>'+
            '</div>'+
        '</div>';
        $('.amount_details').append(el); 
        $('.amount_details').append(el1); 
    }
    else{
        $('#rem_amt').remove();
        $('#paid_amt').remove();
    }
    });     
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    var o = <?php echo json_encode($items); ?>;

    $('.form-item1').change(function () {
        var tr=$(this).parent().parent();
        var item = document.getElementById("form-item1");
        var itemid = item.options[item.selectedIndex].value;
        $.each(o, function(i,v){
            if(itemid == v.item_id){                       
            tr.find('.rate').val(v.i_cur_sp);
            tr.find('.discount').val(v.i_cur_dp);
            }
            
        });
        calculaterowselect(tr);
        calculatefinaltotalselect();
        calculateremamtselect();
    
    }); 

    $('.form-item2').change(function () {
        var tr=$(this).parent().parent();
        var item = document.getElementById("form-item2");
        var itemid = item.options[item.selectedIndex].value;
        $.each(o, function(i,v){
            if(itemid == v.item_id){                       
            tr.find('.rate').val(v.i_cur_sp);
            tr.find('.discount').val(v.i_cur_dp);
            
            }
        });
        calculaterowselect(tr);
        calculatefinaltotalselect();
        calculateremamtselect();
    
    }); 

    $('.form-item3').change(function () {
        var tr=$(this).parent().parent();
        var item = document.getElementById("form-item3");
        var itemid = item.options[item.selectedIndex].value;
        $.each(o, function(i,v){
            if(itemid == v.item_id){                       
            tr.find('.rate').val(v.i_cur_sp);
            tr.find('.discount').val(v.i_cur_dp);
            
            }
        });
        calculaterowselect(tr);
        calculatefinaltotalselect();
        calculateremamtselect();
    
    }); 

    $('.form-item4').change(function () {
        var tr=$(this).parent().parent();
        var item = document.getElementById("form-item4");
        var itemid = item.options[item.selectedIndex].value;
        $.each(o, function(i,v){
            if(itemid == v.item_id){                       
            tr.find('.rate').val(v.i_cur_sp);
            tr.find('.discount').val(v.i_cur_dp);
            
            }
        });
        calculaterowselect(tr);
        calculatefinaltotalselect();
        calculateremamtselect();
    
    }); 

    $('.form-item5').change(function () {
        var tr=$(this).parent().parent();
        var item = document.getElementById("form-item5");
        var itemid = item.options[item.selectedIndex].value;
        $.each(o, function(i,v){
            if(itemid == v.item_id){                       
            tr.find('.rate').val(v.i_cur_sp);
            tr.find('.discount').val(v.i_cur_dp);
        
            }
        });
        calculaterowselect(tr);
        calculatefinaltotalselect();
        calculateremamtselect();
    
    }); 

    $('.form-item6').change(function () {
        var tr=$(this).parent().parent();
        var item = document.getElementById("form-item6");
        var itemid = item.options[item.selectedIndex].value;
        $.each(o, function(i,v){
            if(itemid == v.item_id){                       
            tr.find('.rate').val(v.i_cur_sp);
            tr.find('.discount').val(v.i_cur_dp);
        
            }
        });
        calculaterowselect(tr);
        calculatefinaltotalselect();
        calculateremamtselect();
    
    });

    $('.form-item7').change(function () {
        var tr=$(this).parent().parent();
        var item = document.getElementById("form-item7");
        var itemid = item.options[item.selectedIndex].value;
        $.each(o, function(i,v){
            if(itemid == v.item_id){                       
            tr.find('.rate').val(v.i_cur_sp);
            tr.find('.discount').val(v.i_cur_dp);
            }
        });
        calculaterowselect(tr);
        calculatefinaltotalselect();
        calculateremamtselect();
    
    });

    $('.form-item8').change(function () {
        var tr=$(this).parent().parent();
        var item = document.getElementById("form-item8");
        var itemid = item.options[item.selectedIndex].value;
        $.each(o, function(i,v){
            if(itemid == v.item_id){                       
            tr.find('.rate').val(v.i_cur_sp);
            tr.find('.discount').val(v.i_cur_dp);
            }
        });
        calculaterowselect(tr);
        calculatefinaltotalselect();
        calculateremamtselect();
    
    });
        
});
</script>
<script>
function getStatusChangedDate(){
   var checkbx = document.getElementById('statuscheck');
   if(checkbx.checked == true){
    $("#myModal").modal();
   }
   else{
       var x= $('#st_date').val('');
    //    alert(x);
    //    document.getElementById('st_date').val('');
   }
}
</script>
@endsection