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
        {!! Form::open(['action'=>['Debtors\DebtorsController@update',$debtor->debtor_id],'method'=>'PUT'])  !!}
            <div class="form-group">
              <div class="row">
                <div class="col-sm-2 text-center">
                  {{form:: label('d_name','Debtor Name : ','',['class'=>'form-control'])}}
                </div>
                <div class="col-sm-4">
                  {{form:: text('d_name',$debtor->debtor_name,['class'=>'form-control','placeholder'=>'Debtor name'])}}
                </div>
              </div>
            </div>
            <div class="form-group">
                <div class="row">
                  <div class="col-sm-2 text-center">
                    {{form:: label('d_address','Debtor Address : ','',['class'=>'form-control'])}}
                  </div>
                  <div class="col-sm-4">
                    {{form:: text('d_address',$debtor->d_address,['class'=>'form-control','placeholder'=>'Debtor Address'])}}
                  </div>
                </div>
              </div>
            <div class="form-group">
                  <div class="row">
                    <div class="col-sm-2 text-center">
                      {{form:: label('d_prim_phone','Primary Phone* : ','',['class'=>'form-control required'])}}
                    </div>
                    <div class="col-sm-4">
                      {{form:: text('d_prim_phone',$debtor->d_prim_phone,['class'=>'form-control','placeholder'=>'Primary Phone number'])}}
                    </div>
                  </div>
             </div>
                <div class="form-group">
                    <div class="row">
                      <div class="col-sm-2 text-center">
                        {{form:: label('d_sec_phone','Phone Number : ','',['class'=>'form-control'])}}
                      </div>
                      <div class="col-sm-4">
                        {{form:: text('d_sec_phone',$debtor->d_sec_phone,['class'=>'form-control','placeholder'=>'Secondary'])}}
                      </div>
                    </div>
                </div>

              <div class="form-group">
                  <div class="row">
                    <div class="col-sm-2 text-center">
                    </div>
                    <div class="col-sm-2 text-center">
                        {{form:: submit('update',['class'=>'form-control btn btn-primary'])}}
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