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
        {!! Form::open(['action'=>'Items\ItemsController@store','method'=>'POST']) !!}
            <div class="form-group">
              <div class="row">
                <div class="col-sm-2 text-center">
                  {{form:: label('item_name','Item Name : ','',['class'=>'form-control'])}}
                </div>
                <div class="col-sm-4">
                  {{form:: text('item_name','',['class'=>'form-control','placeholder'=>'Item name'])}}
                </div>
              </div>
            </div>
            <div class="form-group">
                <div class="row">
                  <div class="col-sm-2 text-center">
                    {{form:: label('i_category','Item Category : ','',['class'=>'form-control'])}}
                  </div>
                  <div class="col-sm-4">
                    {{form:: text('i_category','',['class'=>'form-control','placeholder'=>'Item Category'])}}
                  </div>
                </div>
              </div>
              <div class="form-group">
                  <div class="row">
                    <div class="col-sm-2 text-center">
                      {{form:: label('i_quantity','Item Quantity : ','',['class'=>'form-control'])}}
                    </div>
                    <div class="col-sm-4">
                      {{form:: text('i_quantity','',['class'=>'form-control','placeholder'=>'Item Quantity'])}}
                    </div>
                  </div>
                </div>
                <div class="form-group">
                    <div class="row">
                      <div class="col-sm-2 text-center">
                        {{form:: label('i_cur_cp','Cost Price : ','',['class'=>'form-control'])}}
                      </div>
                      <div class="col-sm-4">
                        {{form:: text('i_cur_cp','',['class'=>'form-control','placeholder'=>'Cost Price'])}}
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                      <div class="col-sm-2 text-center">
                        {{form:: label('i_cur_sp','Selling Price : ','',['class'=>'form-control'])}}
                      </div>
                      <div class="col-sm-4">
                        {{form:: text('i_cur_sp','',['class'=>'form-control','placeholder'=>'Selling Price'])}}
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                      <div class="col-sm-2 text-center">
                        {{form:: label('i_cur_dp','Discount Rate(%) : ','',['class'=>'form-control'])}}
                      </div>
                      <div class="col-sm-4">
                        {{form:: text('i_cur_dp','',['class'=>'form-control','placeholder'=>'Discount Price'])}}
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                      <div class="col-sm-2 text-center">
                        {{form:: label('i_low_flag','Low Flag : ','',['class'=>'form-control'])}}
                      </div>
                      <div class="col-sm-4">
                        {{form:: text('i_low_flag','',['class'=>'form-control','placeholder'=>'Low Flag'])}}
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                      <div class="col-sm-2 text-center">
                      </div>
                      <div class="col-sm-2 text-center">
                          {{form:: submit('Submit',['class'=>'form-control btn btn-primary'])}} 
                      </div>
                      <a href="" data-toggle="modal" data-target="#myModal">| Or Load from Excel</a>
                      
                    </div>
                    </div>
                </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
   <!-- Modal -->
   <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Load Items From Excel</h4>
        </div>
        <div class="modal-body">
          <p>Select Excel file </p>
          {!! Form::open(['action'=>'Items\ItemsController@loadFromExcel','method'=>'POST','enctype'=>'multipart/form-data']) !!}
              {{ Form::file('xls_file')}} 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-success">Load</button>
          {{ Form::close() }}
        </div>
      </div>
    </div>
</section>
@endsection