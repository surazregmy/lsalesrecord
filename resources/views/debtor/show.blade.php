@extends('layouts.apptheme')
@section('content')
<section class="content">

    <div class="row">
      <div class="col-md-3">

        <!-- Profile Image -->
        <div class="box box-primary">
          <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="{{ url('images/profile-icon.png') }}" alt="User profile picture">

            <h3 class="profile-username text-center">{{$debtor->debtor_name}}</h3>

            <p class="text-muted text-center">{{$debtor->d_address}}</p>
            <p class="text-muted text-center">{{$debtor->d_prim_phone}}</p>

            <ul class="list-group list-group-unbordered">
                <a href="#">
                    <li class="list-group-item ">
                        <i class="fa  fa-bar-chart-o  margin-r-5"></i><b>Summary</b>
                    </li>
                </a>
                <a href="#">
                    <li class="list-group-item">
                        <i class="fa  fa-align-left  margin-r-5"></i> <b>Activity</b> 
                    </li>
                </a>
                <a href="#invoices" onclick="fetchpinvoices()">
                    <li class="list-group-item">
                        <i class="fa fa-credit-card  margin-r-5"></i> <b>Invoices</b> <span class="pull-right label label-info">13,287</span>
                    </li>
                </a>
                <a href="#returninvoices" onclick="fetchprinvoices()">
                    <li class="list-group-item">
                        <i class="fa fa-credit-card  margin-r-5"></i> <b>Return Invoices</b> <span class="pull-right label label-info">13,287</span>
                    </li>
                </a>
              <a href="#receipts" onclick="fetchreceipts()">
                    <li class="list-group-item">
                        <i class="fa    fa-file  margin-r-5"></i><b>Receipts</b> <span class="pull-right label label-info">13,287</span>
                    </li>
              </a>
              <a href="#pledger" onclick="fetchpledger()">
                <li class="list-group-item">
                    <i class="fa    fa-list-alt  margin-r-5"></i><b>Ledgers</b>
                </li>
              </a>
            </ul>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <!-- About Me Box -->
        <div class="box box-primary">
           
          <div class="box-body">
            <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-file-text-o margin-r-5"></i> Notes</h3>
             </div>
            {!! Form::open(['action'=>'Debtors\DebtorsController@saveNotes','method'=>'POST']) !!}
            <div class="form-group">
              <div>
                <div>
                  {{form:: textarea('d_note',$debtor->d_note,['class'=>'form-control','placeholder'=>'notes','rows'=>'6'])}}
                </div>
              </div>
            </div>
            {{Form::hidden('d_id', $debtor->debtor_id) }}
            {{form:: submit('Save',['class'=>'form-control btn btn-primary'])}}
            {{-- <a href="#notes" onclick="saveNotes()" class="btn btn-primary btn-block"><b>Save</b></a> --}}
            {!! Form::close() !!}
            
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="row" style="margin-left:0px; margin-right:0px"> 
            <div class="box">
              <div class="box-header with-border">
              <h4 class="text-center">{{$subheading}}</h4>
              </div>
              <div class="box-body" id = 'result'>
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                Footer
              </div>
              <!-- /.box-footer-->
            </div>
          </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

  </section>
@endsection

@section('pagespecificscripts')
<script>
  function fetchpinvoices(){
   var debtor_id = {{$debtor->debtor_id}};
   $.ajax({
                    type : "GET",
                    url :  '/pbills/getPbillsOfDebtor/'+debtor_id,
                    success : function(msg){
                      // alert(msg);
                      $('#result').html(msg);
                    },
                    error : function(msg){
                       alert(" data is not passed");
                       
                    }
          });
  

  }
  function fetchprinvoices(){
   var debtor_id = {{$debtor->debtor_id}};
   $.ajax({
                    type : "GET",
                    url :  '/prbills/getPrbillsOfDebtor/'+debtor_id,
                    success : function(msg){
                      // alert(msg);
                      $('#result').html(msg);
                    },
                    error : function(msg){
                       alert(" data is not passed");
                       
                    }
          });
  

  }
  function fetchreceipts(){
   var debtor_id = {{$debtor->debtor_id}};
   $.ajax({
                    type : "GET",
                    url :  '/preceipts/getPreceiptsOfDebtor/'+debtor_id,
                    success : function(msg){
                      // alert(msg);
                      $('#result').html(msg);
                    },
                    error : function(msg){
                       alert(" data is not passed");
                       
                    }
          });
  

  }
  function fetchpledger(){
   var debtor_id = {{$debtor->debtor_id}};
   $.ajax({
                    type : "GET",
                    url :  '/pledgers/prepareLedgerforDebtor/'+debtor_id,
                    success : function(msg){
                      // alert(msg);
                      $('#result').html(msg);
                    },
                    error : function(msg){
                       alert(" data is not passed");
                    }
          });
  

  }
</script>
@endsection