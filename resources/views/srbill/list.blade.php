@extends('layouts.apptheme')
@section('content')
<section class="content">
    <!-- Default box -->
  <div class="row" style="margin-left:0px; margin-right:0px"> 
    <div class="box">
        <div class="box-header with-border">
            <section class="content-header">
                <h4 class="text-center" style="float:center">{{$subheading}}</h4>
                <a class = 'breadcrumb' href='{{ action('Srbills\SrbillsController@create') }}' style="float:right">
                    <img src="{{ url('images/add_icon.png') }}" class="img-circle" alt="User Image" style="height:30px; width:30px">
                </a>
            </section>         
        </div>
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead style="background-image: -webkit-gradient(linear, left top, left bottom, from(#f1eeed), to(#666e96));">
            <tr>
              <th>S.N.</th>
              <th>SR Bill No</th>
              <th>Creditor Name</th>
              <th>Return Date</th>
              <th>Total</th>
              <th>Entered By</th>
              <th>Manage</th>
            </tr>
            </thead>
            <tbody>
              @if(count($srbills)>0)
                 @php ($i = 1)  {{-- // declare the variable   --}}
                @foreach($srbills as $srbill)
                  <tr>
                    <td>{{$i}}</td>
                    <td>{{$srbill->srbill_generated_id}}</td>
                    <td>{{$srbill->creditor->creditor_name}}</td>                          
                    <td>{{$srbill->sr_date_of_ret_n}}</td>
                    <td>{{$srbill->sr_total_amount}}</td>
                    <td>{{$srbill->sr_entered_by}}</td>
                    <td class="text-left" style="padding:0px">
                        <div class='delete' style="display:inline;">
                            {!! Form::open(['class'=>'del','action'=>['Srbills\SrbillsController@destroy',$srbill->srbill_id],'style'=>'display:inline;','method'=>'POST','id'=>$srbill->srbill_id]) !!}
                            {!! Form::hidden('_method','DELETE') !!}
                            <button type="button" class="btnk btn btn-danger btn-xs cdelete" onclick="deleteItem({{$srbill->srbill_id}})"><i class="fa fa-trash margin-r-5"></i></button>
                            {!! Form::close() !!}  
                        </div>
                        <div style="display:inline;float: right clear">
                          <a href="/srbills/{{$srbill->srbill_id}}" class="btn btn-primary btn-xs"><i class="fa fa-check"></i> </a>
                          <a href="/srbills/{{$srbill->srbill_id}}/edit" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> </a>
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
      <div class="box-footer">
        
      </div>
      <!-- /.box-footer-->
    </div>
  </div>
</section>
@endsection