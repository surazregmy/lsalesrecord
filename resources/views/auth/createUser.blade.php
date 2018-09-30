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
        {!! Form::open(['action'=>'Auth\UserController@saveUser','method'=>'POST']) !!}
            <div class="form-group">
              <div class="row">
                <div class="col-sm-2 text-center">
                  {{form:: label('username','Username : ','',['class'=>'form-control'])}}
                </div>
                <div class="col-sm-4">
                  {{form:: text('username','',['class'=>'form-control','placeholder'=>'Username'])}}
                </div>
              </div>
            </div>
            <div class="form-group">
                <div class="row">
                  <div class="col-sm-2 text-center">
                    {{form:: label('email_address','Email Address : ','',['class'=>'form-control'])}}
                  </div>
                  <div class="col-sm-4">
                    {{form:: text('email_address','',['class'=>'form-control','placeholder'=>'Email Address'])}}
                  </div>
                </div>
              </div>
            <div class="form-group">
                  <div class="row">
                    <div class="col-sm-2 text-center">
                      {{form:: label('role','Role : ','',['class'=>'form-control required'])}}
                    </div>
                    <div class="col-sm-4">
                      {{ Form::select('role', array('user' => 'user', 'admin' => 'admin'),null,['class'=>'select2 form-control']) }}
                    </div>
                  </div>
             </div>
                <div class="form-group">
                    <div class="row">
                      <div class="col-sm-2 text-center">
                        {{form:: label('password','Password : ','',['class'=>'form-control'])}}
                      </div>
                      <div class="col-sm-4">
                            {{ Form::password('password',['class'=>'form-control','placeholder'=>'password']) }}
                      </div>
                    </div>
                </div>
                <div class="form-group">
                        <div class="row">
                          <div class="col-sm-2 text-center">
                            {{form:: label('password_confirmation','Re-type Password : ','',['class'=>'form-control'])}}
                          </div>
                          <div class="col-sm-4">
                                {{ Form::password('password_confirmation',['class'=>'form-control','placeholder'=>'re-type password']) }}
                          </div>
                        </div>
                    </div>

              <div class="form-group">
                  <div class="row">
                    <div class="col-sm-2 text-center">
                    </div>
                    <div class="col-sm-2 text-center">
                        {{form:: submit('Save',['class'=>'form-control btn btn-primary'])}}
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