@extends('layouts.apptheme')
@section('content')
<section class="content">

    <div class="row">
      <div class="col-md-3">

        <!-- Profile Image -->
        <div class="box box-primary">
          <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="{{ url('images/profile-icon.png') }}" alt="User profile picture">

            <h3 class="profile-username text-center">Nina Mcintire</h3>

            <p class="text-muted text-center">Software Engineer</p>

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
                <a href="#">
                    <li class="list-group-item">
                        <i class="fa   fa-credit-card  margin-r-5"></i> <b>Invoices</b> <span class="pull-right label label-info">13,287</span>
                    </li>
                </a>
              <a href="#">
                    <li class="list-group-item">
                        <i class="fa    fa-file  margin-r-5"></i><b>Receipts</b> <span class="pull-right label label-info">13,287</span>
                    </li>
              </a>
              <a href="#">
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
            {!! Form::open(['action'=>'Debtors\DebtorsController@store','method'=>'POST']) !!}
            <div class="form-group">
              <div>
                <div>
                  {{form:: textarea('d_name','',['class'=>'form-control','placeholder'=>'notes','rows'=>'6'])}}
                </div>
              </div>
            </div>
            <a href="#" class="btn btn-primary btn-block"><b>Save</b></a>
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
              <div class="box-body">
                
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