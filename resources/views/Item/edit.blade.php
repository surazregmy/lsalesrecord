@extends('layouts.apptheme')
@section('content')
<section class="content">
    <!-- Default box -->
  <div class="row" style="margin-left:0px; margin-right:0px"> 
    <div class="box">
      <div class="box-header with-border">
      <h4 class="text-center">{{$subheading}}</h4>
      </div>
      <div class="box-body">
        {!! Form::open(['action'=>['Items\ItemsController@update',$item->item_id],'method'=>'POST']) !!}
            <div class="form-group">
              <div class="row">
                <div class="col-sm-2 text-center">
                  {{form:: label('item_name','Item Name : ','',['class'=>'form-control'])}}
                </div>
                <div class="col-sm-4">
                  {{form:: text('item_name',$item->item_name,['class'=>'form-control','placeholder'=>'Item name'])}}
                </div>
              </div>
            </div>
            <div class="form-group">
                <div class="row">
                  <div class="col-sm-2 text-center">
                    {{form:: label('i_category','Item Category : ','',['class'=>'form-control'])}}
                  </div>
                  <div class="col-sm-4">
                    {{form:: text('i_category',$item->i_category,['class'=>'form-control','placeholder'=>'Item Category'])}}
                  </div>
                </div>
              </div>
              <div class="form-group">
                  <div class="row">
                    <div class="col-sm-2 text-center">
                      {{form:: label('i_quantity','Item Quantity : ','',['class'=>'form-control'])}}
                    </div>
                    <div class="col-sm-4">
                      {{form:: text('i_quantity',$item->i_quantity,['class'=>'form-control','placeholder'=>'Item Quantity'])}}
                    </div>
                  </div>
                </div>
                <div class="form-group">
                    <div class="row">
                      <div class="col-sm-2 text-center">
                        {{form:: label('i_cur_cp','Cost Price : ','',['class'=>'form-control'])}}
                      </div>
                      <div class="col-sm-4">
                        {{form:: text('i_cur_cp',$item->i_cur_cp,['class'=>'form-control','placeholder'=>'Cost Price'])}}
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                      <div class="col-sm-2 text-center">
                        {{form:: label('i_cur_sp','Selling Price : ','',['class'=>'form-control'])}}
                      </div>
                      <div class="col-sm-4">
                        {{form:: text('i_cur_sp',$item->i_cur_sp,['class'=>'form-control','placeholder'=>'Selling Price'])}}
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                      <div class="col-sm-2 text-center">
                        {{form:: label('i_cur_dp','Discount Price : ','',['class'=>'form-control'])}}
                      </div>
                      <div class="col-sm-4">
                        {{form:: text('i_cur_dp',$item->i_cur_dp,['class'=>'form-control','placeholder'=>'Discount Price'])}}
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                      <div class="col-sm-2 text-center">
                        {{form:: label('i_low_flag','Low Flag : ','',['class'=>'form-control'])}}
                      </div>
                      <div class="col-sm-4">
                        {{form:: text('i_low_flag',$item->i_low_flag,['class'=>'form-control','placeholder'=>'Low Flag'])}}
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                      <div class="col-sm-2 text-center">
                      </div>
                      <div class="col-sm-2 text-center">
                          {{form:: hidden('_method','PUT')}}
                          {{form:: submit('Update',['class'=>'form-control btn btn-primary'])}}
                      </div>
                    </div>
                </div>
        {!! Form::close() !!}
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
       
      </div>
      <!-- /.box-footer-->
    </div>
  </div>
</section>
@endsection