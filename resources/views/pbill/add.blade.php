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
                  <table class="table no-margin">
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
                    <tbody>
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
                      <td> {{form:: text('i_cur_dp','',['class'=>'form-control','placeholder'=>'Quantity'])}}</td>
                      <td> {{form:: text('i_cur_dp','',['class'=>'form-control','placeholder'=>'Rate'])}}</td>
                      <td> {{form:: text('i_cur_dp','',['class'=>'form-control','placeholder'=>'Total'])}}</td>
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
                      <td> {{form:: text('i_cur_dp','',['class'=>'form-control','placeholder'=>'Quantity'])}}</td>
                      <td> {{form:: text('i_cur_dp','',['class'=>'form-control','placeholder'=>'Rate'])}}</td>
                      <td> {{form:: text('i_cur_dp','',['class'=>'form-control','placeholder'=>'Total'])}}</td>
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
                <a href="javascript:void(0)" class="btn btn-sm btn-warning btn-flat pull-right">Add New Row</a>
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
                            {{form:: label('item_name','Total Amount: ','',['class'=>'form-control'])}}
                            </div>
                            <div class="col-sm-8">
                            {{form:: text('item_name','',['class'=>'form-control','placeholder'=>'Item name'])}}
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
                            <a href="javascript:void(0)" class="btn btn-md btn-info btn-flat pull-left">Save</a>
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
