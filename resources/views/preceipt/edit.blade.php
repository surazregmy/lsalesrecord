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
        {!! Form::open(['action'=>['Preceipts\PreceiptsController@update',$preceipt->p_rec_id],'method'=>'PUT']) !!}
            <div class="form-group">
              <div class="row">
                <div class="col-sm-2 text-center">
                  {{form:: label('p_rec_no','Receipt No : ','',['class'=>'form-control'])}}
                </div>
                <div class="col-sm-4">
                  {{form:: text('p_rec_no',$preceipt->p_rec_no,['class'=>'form-control','placeholder'=>'Receipt No '])}}
                </div>
              </div>
            </div>
            <div class="form-group">
                <div class="row">
                  <div class="col-sm-2 text-center">
                    {{form:: label('d_id','Supplier Name : ','',['class'=>'form-control'])}}
                  </div>
                  <div class="col-sm-4">
                      <select name = "d_id" class="select2 form-control" style="width: 100%";>
                      <option value="{{$preceipt->debtor->debtor_id}}"  selected="selected" >{{$preceipt->debtor->debtor_name}}</option>
                        <?php foreach($debtors as $debtor): ?>
                                  <option value="<?php echo $debtor['debtor_id'] ?>"><?php echo $debtor['debtor_name'];?></option>          
                        <?php endforeach ?>
                      </select>
                  </div>
                </div>
              </div>
            <div class="form-group">
                  <div class="row">
                    <div class="col-sm-2 text-center">
                      {{form:: label('p_rec_date','Date of Payment : ','',['class'=>'form-control required'])}}
                    </div>
                    <div class="col-sm-4">
                      {{form:: text('p_rec_date',$preceipt->p_rec_date_of_pay_n,['class'=>'form-control bod-picker','placeholder'=>'Date'])}}
                    </div>
                  </div>
             </div>
                <div class="form-group">
                    <div class="row">
                      <div class="col-sm-2 text-center">
                        {{form:: label('amt_paid','Amount Paid : ','',['class'=>'form-control'])}}
                      </div>
                      <div class="col-sm-4">
                        {{form:: text('p_rec_amount',$preceipt->p_rec_amount,['class'=>'form-control','placeholder'=>'Amount'])}}
                      </div>
                    </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-sm-2 text-center">
                      {{form:: label('entered_by','Entered By : ','',['class'=>'form-control'])}}
                    </div>
                    <div class="col-sm-4">
                      {{form:: text('log_user',$log_user->name,['class'=>'form-control','placeholder'=>'Amount','readonly'])}}
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
              {{Form::hidden('p_rec_old_id', $preceipt->p_rec_gen_no) }}
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