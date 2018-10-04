@extends('layouts.apptheme')
@section('content')
<section class="content">
        <!-- Main row -->
        {!! Form::open(['action'=>'Sbills\SbillsController@store','method'=>'POST']) !!}
        <div class="row">
          <!-- Left col -->
          <div class="col-md-8">
            <!-- TABLE: Purchase Bills -->
       
            <div class="box box-info">
              <div class="box-header with-border  text-center">
                <h3 class="box-title" ><b>Items Detail</b></h3>
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
                    <tr>
                      <td>1</td>
                      <td>
                            <select name = "item1" id="form-item1"  class="select2 form-control form-item1" style="width: 100%";>
                                <option value=""  selected="selected" >Select Item</option>
                                <?php foreach($items as $item): ?>
                                           <option value="<?php echo $item['item_id'] ?>"
                                                @if (old('item1') == $item['item_id']) selected="selected" @endif>
                                            <?php echo $item['item_name'];?></option>          
                                 <?php endforeach ?>
                             </select>
                        </td>
                      <td> {{form:: text('quantity1','',['class'=>'form-control quantity','placeholder'=>'Quantity'])}}</td>
                      <td> {{form:: text('rate1','',['class'=>'form-control rate','placeholder'=>'Rate'])}}</td>
                      <td> {{form:: text('discount1','',['class'=>'form-control discount','placeholder'=>'discount'])}}</td>
                      <td> {{form:: text('total1','',['class'=>'form-control total','placeholder'=>'Total'])}}</td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>
                            <select name = "item2" id="form-item2"  class="select2 form-control form-item2" style="width: 100%";>
                                    <option value=""  selected="selected" >Select Item</option>
                                    <?php foreach($items as $item): ?>
                                               <option value="<?php echo $item['item_id'] ?>"
                                                    @if (old('item2') == $item['item_id']) selected="selected" @endif>
                                                <?php echo $item['item_name'];?></option>          
                                     <?php endforeach ?>
                             </select>
                        </td>
                      <td> {{form:: text('quantity2','',['class'=>'form-control quantity','placeholder'=>'Quantity'])}}</td>
                      <td> {{form:: text('rate2','',['class'=>'form-control rate','placeholder'=>'Rate'])}}</td>
                      <td> {{form:: text('discount2','',['class'=>'form-control discount','placeholder'=>'discount'])}}</td>
                      <td> {{form:: text('total2','',['class'=>'form-control total','placeholder'=>'Total'])}}</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>
                                <select name = "item3" id="form-item3" class="select2 form-control form-item3" style="width: 100%";>
                                        <option value=""  selected="selected" >Select Item</option>
                                        <?php foreach($items as $item): ?>
                                                   <option value="<?php echo $item['item_id'] ?>"
                                                        @if (old('item3') == $item['item_id']) selected="selected" @endif>
                                                    <?php echo $item['item_name'];?></option>          
                                         <?php endforeach ?>
                                </select>
                            </td>
                        <td> {{form:: text('quantity3','',['class'=>'form-control quantity','placeholder'=>'Quantity'])}}</td>
                        <td> {{form:: text('rate3','',['class'=>'form-control rate','placeholder'=>'Rate'])}}</td>
                        <td> {{form:: text('discount3','',['class'=>'form-control discount','placeholder'=>'discount'])}}</td>
                        <td> {{form:: text('total3','',['class'=>'form-control total','placeholder'=>'Total'])}}</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>
                                <select name = "item4" id="form-item4" class="select2 form-control form-item4" style="width: 100%";>
                                        <option value=""  selected="selected" >Select Item</option>
                                        <?php foreach($items as $item): ?>
                                                   <option value="<?php echo $item['item_id'] ?>"
                                                        @if (old('item4') == $item['item_id']) selected="selected" @endif>
                                                    <?php echo $item['item_name'];?></option>          
                                         <?php endforeach ?>
                                 </select>
                            </td>
                        <td> {{form:: text('quantity4','',['class'=>'form-control quantity','placeholder'=>'Quantity'])}}</td>
                        <td> {{form:: text('rate4','',['class'=>'form-control rate','placeholder'=>'Rate'])}}</td>
                        <td> {{form:: text('discount4','',['class'=>'form-control discount','placeholder'=>'discount'])}}</td>
                        <td> {{form:: text('total4','',['class'=>'form-control total','placeholder'=>'Total'])}}</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>
                                <select name = "item5" id="form-item5" class="select2 form-control form-item5" style="width: 100%";>
                                        <option value=""  selected="selected" >Select Item</option>
                                        <?php foreach($items as $item): ?>
                                                   <option value="<?php echo $item['item_id'] ?>"
                                                        @if (old('item5') == $item['item_id']) selected="selected" @endif>
                                                    <?php echo $item['item_name'];?></option>          
                                         <?php endforeach ?>
                                 </select>
                            </td>
                        <td> {{form:: text('quantity5','',['class'=>'form-control quantity','placeholder'=>'Quantity'])}}</td>
                        <td> {{form:: text('rate5','',['class'=>'form-control rate','placeholder'=>'Rate'])}}</td>
                        <td> {{form:: text('discount5','',['class'=>'form-control discount','placeholder'=>'discount'])}}</td>
                        <td> {{form:: text('total5','',['class'=>'form-control total','placeholder'=>'Total'])}}</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>
                                <select name = "item6" id="form-item6" class="select2 form-control form-item6" style="width: 100%";>
                                        <option value=""  selected="selected" >Select Item</option>
                                        <?php foreach($items as $item): ?>
                                                   <option value="<?php echo $item['item_id'] ?>"
                                                        @if (old('item6') == $item['item_id']) selected="selected" @endif>
                                                    <?php echo $item['item_name'];?></option>          
                                         <?php endforeach ?>
                                 </select>
                            </td>
                        <td> {{form:: text('quantity6','',['class'=>'form-control quantity','placeholder'=>'Quantity'])}}</td>
                        <td> {{form:: text('rate6','',['class'=>'form-control rate','placeholder'=>'Rate'])}}</td>
                        <td> {{form:: text('discount6','',['class'=>'form-control discount','placeholder'=>'discount'])}}</td>
                        <td> {{form:: text('total6','',['class'=>'form-control total','placeholder'=>'Total'])}}</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>
                                <select name = "item7" id="form-item7" class="select2 form-control form-item7" style="width: 100%";>
                                        <option value=""  selected="selected" >Select Item</option>
                                        <?php foreach($items as $item): ?>
                                                   <option value="<?php echo $item['item_id'] ?>"
                                                        @if (old('item7') == $item['item_id']) selected="selected" @endif>
                                                    <?php echo $item['item_name'];?></option>          
                                         <?php endforeach ?>
                                 </select>
                            </td>
                        <td> {{form:: text('quantity7','',['class'=>'form-control quantity','placeholder'=>'Quantity'])}}</td>
                        <td> {{form:: text('rate7','',['class'=>'form-control rate','placeholder'=>'Rate'])}}</td>
                        <td> {{form:: text('discount7','',['class'=>'form-control discount','placeholder'=>'discount'])}}</td>
                        <td> {{form:: text('total7','',['class'=>'form-control total','placeholder'=>'Total'])}}</td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>
                                <select name = "item8" id="form-item8" class="select2 form-control form-item8" style="width: 100%";>
                                        <option value=""  selected="selected" >Select Item</option>
                                        <?php foreach($items as $item): ?>
                                                   <option value="<?php echo $item['item_id'] ?>"
                                                        @if (old('item8') == $item['item_id']) selected="selected" @endif>
                                                    <?php echo $item['item_name'];?></option>          
                                         <?php endforeach ?>
                                 </select>
                            </td>
                        <td> {{form:: text('quantity8','',['class'=>'form-control quantity','placeholder'=>'Quantity'])}}</td>
                        <td> {{form:: text('rate8','',['class'=>'form-control rate','placeholder'=>'Rate'])}}</td>
                        <td> {{form:: text('discount8','',['class'=>'form-control discount','placeholder'=>'discount'])}}</td>
                        <td> {{form:: text('total8','',['class'=>'form-control total','placeholder'=>'Total'])}}</td>
                    </tr>
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
                                                <option value=""  selected="selected" >Select Creditor</option>
                                                <?php foreach($creditors as $creditor): ?>
                                                           <option value="<?php echo $creditor['creditor_id'] ?>"
                                                                @if (old('c_id') == $creditor['creditor_id']) selected="selected" @endif>
                                                            <?php echo $creditor['creditor_name'];?></option>          
                                                 <?php endforeach ?>
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
                                  {{form:: text('sbill_original_id','',['class'=>'form-control','placeholder'=>'Bill No'])}}
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
                                    array('credit' => 'Credit', 'cash' => 'Cash','halfpaid'=>'Halfpaid',''=>'Select'), '',
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
                                  {{form:: text('date_of_sale','',['class'=>'form-control bod-picker','placeholder'=>'date'])}}
                                  </div>
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="row">
                                  <div class="col-sm-4 text-center">
                                  {{form:: label('entered_by','Entered By : ','',['class'=>'form-control'])}}
                                  </div>
                                  <div class="col-sm-8">
                                  {{form:: text('entered_by',$log_user->name,['class'=>'form-control','readonly'])}}
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
                                    {{form:: text('sub_total','',['class'=>'form-control grandtotal','placeholder'=>'Item name'])}}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" id ="dis_amt">
                                    <div class="row">
                                        <div class="col-sm-4 text-center">
                                        {{form:: label('dis_amt','Discount Amount: ','',['class'=>'form-control '])}}
                                        </div>
                                        <div class="col-sm-8">
                                        {{form:: text('dis_amt','',['class'=>'form-control final_discount','placeholder'=>'Item name'])}}
                                        </div>
                                    </div>
                             </div>
                             <div class="form-group" id ="tot_amt">
                                    <div class="row">
                                        <div class="col-sm-4 text-center">
                                        {{form:: label('tot_amt','Total Amount: ','',['class'=>'form-control '])}}
                                        </div>
                                        <div class="col-sm-8">
                                        {{form:: text('tot_amt','',['class'=>'form-control final_total','placeholder'=>'Item name'])}}
                                        </div>
                                    </div>
                             </div>
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

@endsection