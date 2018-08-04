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
                    {!! Form::open(['action'=>'Items\ItemsController@store','method'=>'POST']) !!}
                    <tbody class="detail">
                    <tr>
                      <td>1</td>
                      <td>
                            <select name = "item1" class="select2 form-control" style="width: 100%";>
                                <option value="aa" disabled="disabled" selected="selected" >Select Item</option>
                                <?php foreach($items as $item): ?>
                                           <option value="<?php echo $item['items_id'] ?>"><?php echo $item['item_name'];?></option>          
                                 <?php endforeach ?>
                             </select>
                        </td>
                      <td> {{form:: text('i_cur_dp','',['class'=>'form-control quantity','placeholder'=>'Quantity'])}}</td>
                      <td> {{form:: text('i_cur_dp','',['class'=>'form-control rate','placeholder'=>'Rate'])}}</td>
                      <td> {{form:: text('i_cur_dp','',['class'=>'form-control total','placeholder'=>'Total'])}}</td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>
                            <select name = "item1" class="select2 form-control" style="width: 100%";>
                                <option value="aa" disabled="disabled" selected="selected" >Select Item</option>
                                <?php foreach($items as $item): ?>
                                           <option value="<?php echo $item['items_id'] ?>"><?php echo $item['item_name'];?></option>          
                                 <?php endforeach ?>
                             </select>
                        </td>
                      <td> {{form:: text('i_cur_dp','',['class'=>'form-control quantity','placeholder'=>'Quantity'])}}</td>
                      <td> {{form:: text('i_cur_dp','',['class'=>'form-control rate','placeholder'=>'Rate'])}}</td>
                      <td> {{form:: text('i_cur_dp','',['class'=>'form-control total','placeholder'=>'Total'])}}</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>
                                <select name = "item1" class="select2 form-control" style="width: 100%";>
                                    <option value="aa" disabled="disabled" selected="selected" >Select Item</option>
                                    <?php foreach($items as $item): ?>
                                                <option value="<?php echo $item['items_id'] ?>"><?php echo $item['item_name'];?></option>          
                                    <?php endforeach ?>
                                </select>
                            </td>
                        <td> {{form:: text('i_cur_dp','',['class'=>'form-control','placeholder'=>'Quantity'])}}</td>
                        <td> {{form:: text('i_cur_dp','',['class'=>'form-control','placeholder'=>'Rate'])}}</td>
                        <td> {{form:: text('i_cur_dp','',['class'=>'form-control','placeholder'=>'Total'])}}</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>
                                <select name = "item1" class="select2 form-control" style="width: 100%";>
                                        <option value="aa" disabled="disabled" selected="selected" >Select Item</option>
                                    <?php foreach($items as $item): ?>
                                                <option value="<?php echo $item['items_id'] ?>"><?php echo $item['item_name'];?></option>          
                                    <?php endforeach ?>
                                </select>
                            </td>
                        <td> {{form:: text('i_cur_dp','',['class'=>'form-control','placeholder'=>'Quantity'])}}</td>
                        <td> {{form:: text('i_cur_dp','',['class'=>'form-control','placeholder'=>'Rate'])}}</td>
                        <td> {{form:: text('i_cur_dp','',['class'=>'form-control','placeholder'=>'Total'])}}</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>
                                <select name = "item1" class="select2 form-control" style="width: 100%";>
                                    <option value="aa" disabled="disabled" selected="selected" >Select Item</option>
                                    <?php foreach($items as $item): ?>
                                                <option value="<?php echo $item['items_id'] ?>"><?php echo $item['item_name'];?></option>          
                                    <?php endforeach ?>
                                </select>
                            </td>
                        <td> {{form:: text('i_cur_dp','',['class'=>'form-control','placeholder'=>'Quantity'])}}</td>
                        <td> {{form:: text('i_cur_dp','',['class'=>'form-control','placeholder'=>'Rate'])}}</td>
                        <td> {{form:: text('i_cur_dp','',['class'=>'form-control','placeholder'=>'Total'])}}</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>
                                <select name = "item1" class="select2 form-control" style="width: 100%";>
                                    <option value="aa" disabled="disabled" selected="selected" >Select Item</option>
                                    <?php foreach($items as $item): ?>
                                                <option value="<?php echo $item['items_id'] ?>"><?php echo $item['item_name'];?></option>          
                                    <?php endforeach ?>
                                </select>
                            </td>
                        <td> {{form:: text('i_cur_dp','',['class'=>'form-control','placeholder'=>'Quantity'])}}</td>
                        <td> {{form:: text('i_cur_dp','',['class'=>'form-control','placeholder'=>'Rate'])}}</td>
                        <td> {{form:: text('i_cur_dp','',['class'=>'form-control','placeholder'=>'Total'])}}</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>
                                <select name = "item1" class="select2 form-control" style="width: 100%";>
                                    <option value="aa" disabled="disabled" selected="selected" >Select Item</option>
                                    <?php foreach($items as $item): ?>
                                                <option value="<?php echo $item['items_id'] ?>"><?php echo $item['item_name'];?></option>          
                                    <?php endforeach ?>
                                </select>
                            </td>
                        <td> {{form:: text('i_cur_dp','',['class'=>'form-control','placeholder'=>'Quantity'])}}</td>
                        <td> {{form:: text('i_cur_dp','',['class'=>'form-control','placeholder'=>'Rate'])}}</td>
                        <td> {{form:: text('i_cur_dp','',['class'=>'form-control','placeholder'=>'Total'])}}</td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>
                                <select name = "item1" class="select2 form-control" style="width: 100%";>
                                    <option value="aa" disabled="disabled" selected="selected" >Select Item</option>
                                    <?php foreach($items as $item): ?>
                                                <option value="<?php echo $item['items_id'] ?>"><?php echo $item['item_name'];?></option>          
                                    <?php endforeach ?>
                                </select>
                            </td>
                        <td> {{form:: text('i_cur_dp','',['class'=>'form-control','placeholder'=>'Quantity'])}}</td>
                        <td> {{form:: text('i_cur_dp','',['class'=>'form-control','placeholder'=>'Rate'])}}</td>
                        <td> {{form:: text('i_cur_dp','',['class'=>'form-control','placeholder'=>'Total'])}}</td>
                    </tr>
                    </tbody>
                    {!! Form::close() !!}
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
                            {{form:: label('item_name','Total Amount: ','',['class'=>'form-control '])}}
                            </div>
                            <div class="col-sm-8">
                            {{form:: text('item_name','',['class'=>'form-control grandtotal','placeholder'=>'Item name'])}}
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
                                  {{form:: label('item_name','Debtor Name: ','',['class'=>'form-control'])}}
                                  </div>
                                  <div class="col-sm-8">
                                  {{form:: text('item_name','',['class'=>'form-control','placeholder'=>'Item name'])}}
                                  </div>
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="row">
                                  <div class="col-sm-4 text-center">
                                  {{form:: label('item_name','Bill No: ','',['class'=>'form-control'])}}
                                  </div>
                                  <div class="col-sm-8">
                                  {{form:: text('item_name','',['class'=>'form-control','placeholder'=>'Item name'])}}
                                  </div>
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="row">
                                  <div class="col-sm-4 text-center">
                                  {{form:: label('item_name','Date : ','',['class'=>'form-control'])}}
                                  </div>
                                  <div class="col-sm-8">
                                  {{form:: text('item_name','',['class'=>'form-control','placeholder'=>'Item name'])}}
                                  </div>
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="row">
                                  <div class="col-sm-4 text-center">
                                  {{form:: label('item_name','Entered By : ','',['class'=>'form-control'])}}
                                  </div>
                                  <div class="col-sm-8">
                                  {{form:: text('item_name','',['class'=>'form-control','placeholder'=>'Item name'])}}
                                  </div>
                              </div>
                          </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                            <a href="javascript:void(0)" class="btn btn-md btn-info btn-flat pull-left" onclick="changeC()">Save</a>
                            <a href="javascript:void(0)" class="btn btn-md btn-default btn-flat pull-right">Save and Exit</a>
                    </div>
                    <!-- /.box-footer -->
                  </div>
                  <!-- /.box -->
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

      var string ="<option value=\"aa\" disabled=\"disabled\" selected=\"selected\" >Select Item</option>";
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