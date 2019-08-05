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
              {!! Form::open(['action'=>'Pbills\PbillsController@store','method'=>'POST']) !!}
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
                    <tr>
                      <td>1</td>
                      <td>
                            <select name = "item1" class="select2 form-control" style="width: 100%";>
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
                      <td> {{form:: text('total1','',['class'=>'form-control total','placeholder'=>'Total'])}}</td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>
                            <select name = "item2" class="select2 form-control" style="width: 100%";>
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
                      <td> {{form:: text('total2','',['class'=>'form-control total','placeholder'=>'Total'])}}</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>
                                <select name = "item3" class="select2 form-control" style="width: 100%";>
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
                        <td> {{form:: text('total3','',['class'=>'form-control total','placeholder'=>'Total'])}}</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>
                                <select name = "item4" class="select2 form-control" style="width: 100%";>
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
                        <td> {{form:: text('total4','',['class'=>'form-control total','placeholder'=>'Total'])}}</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>
                                <select name = "item5" class="select2 form-control" style="width: 100%";>
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
                        <td> {{form:: text('total5','',['class'=>'form-control total','placeholder'=>'Total'])}}</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>
                                <select name = "item6" class="select2 form-control" style="width: 100%";>
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
                        <td> {{form:: text('total6','',['class'=>'form-control total','placeholder'=>'Total'])}}</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>
                                <select name = "item7" class="select2 form-control" style="width: 100%";>
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
                        <td> {{form:: text('total7','',['class'=>'form-control total','placeholder'=>'Total'])}}</td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>
                                <select name = "item8" class="select2 form-control" style="width: 100%";>
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
                            {{form:: text('total_amount','',['class'=>'form-control grandtotal','placeholder'=>'Item name'])}}
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
                                  {{form:: label('d_id','Supllier Name: ','',['class'=>'form-control'])}}
                                  </div>
                                  <div class="col-sm-8">
                                        <select name = "d_id" class="select2 form-control" style="width: 100%";>
                                                <option value=""  selected="selected" >Select Supplier</option>
                                                <?php foreach($debtors as $debtor): ?>
                                                           <option value="<?php echo $debtor['debtor_id'] ?>"
                                                                @if (old('d_id') == $debtor['debtor_id']) selected="selected" @endif>
                                                            <?php echo $debtor['debtor_name'];?></option>          
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
                                  {{form:: text('pbill_original_id','',['class'=>'form-control','placeholder'=>'Bill No'])}}
                                  </div>
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="row">
                                  <div class="col-sm-4 text-center">
                                  {{form:: label('Date of Purchase','Date of Purchase : ','',['class'=>'form-control'])}}
                                  </div>
                                  <div class="col-sm-8">
                                  {{form:: text('date_of_purchase','',['class'=>'form-control bod-picker','placeholder'=>'date'])}}
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