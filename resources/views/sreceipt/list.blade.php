@extends('layouts.apptheme')
@section('content')
<section class="content">
        <div class="row" style="margin-left:0px; margin-right:0px">
          
            <div class="box">
            <div class="box-header with-border">
                  <div class="col-md-6">
                  <h4 class="text-right" style="float:center">{{$subheading}}</h4>
                  </div>
                  <div>
                      <a class = 'pull-right' href='{{ action('Sreceipts\SreceiptsController@create') }}' style="float:right">
                          <img src="{{ url('images/add_icon.png') }}" class="img-circle" alt="User Image" style="height:30px; width:30px">
                          </a>
                  </div>            
            </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead style="background-image: -webkit-gradient(linear, left top, left bottom, from(#f1eeed), to(#666e96));">
                  <tr>
                    <th>S.N.</th>
                    <th>Receipt No</th>
                    <th>Creditors Name</th>
                    <th>Date of Pay</th>
                    <th>Paid Amount</th>
                    <th>Entered By</th>
                    <th>Manage</th>
                  </tr>
                  </thead>
                  <tbody>
                    @if(count($sreceipts)>0)
                       @php ($i = 1)  {{-- // declare the variable   --}}
                      @foreach($sreceipts as $sreceipt)
                        <tr>
                          <td>{{$i}}</td>
                          <td>{{$sreceipt->s_rec_gen_no}}</td>
                          <td>{{$sreceipt->creditor->creditor_name}}</td>                          
                          <td>{{$sreceipt->s_rec_date_of_pay_n}}</td>
                          <td>{{$sreceipt->s_rec_amount}}</td>
                          <td>{{$sreceipt->s_rec_entered_by}}</td>
                          <td class="text-left">
                              <div class='delete' style="display:inline;">
                                  {!! Form::open(['class'=>'del','action'=>['Sreceipts\SreceiptsController@destroy',$sreceipt->s_rec_id],'style'=>'display:inline;','method'=>'POST','id'=>$sreceipt->s_rec_id]) !!}
                                  {!! Form::hidden('_method','DELETE') !!}
                                  <button type="button" class="btnk btn btn-danger btn-xs cdelete" onclick="deleteItem({{$sreceipt->s_rec_id}})"><i class="fa fa-trash margin-r-5"></i>Delete</button>
                                  {!! Form::close() !!}  
                              </div>
                              <div style="display:inline;float: right clear">
                                <a href="/sreceipts/{{$sreceipt->s_rec_id}}" class="btn btn-primary btn-xs"><i class="fa fa-check"></i> View</a>
                                <a href="/sreceipts/{{$sreceipt->s_rec_id}}/edit" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                              </div>
                           </td>                      
                        </tr>
                       @php ($i++)
                      @endforeach
                    @endif
                  </tbody>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      
@endsection
