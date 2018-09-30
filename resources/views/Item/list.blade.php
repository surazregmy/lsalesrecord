@extends('layouts.apptheme')
@section('content')
<section class="content">
        <div class="row" style="margin-left:0px; margin-right:0px">
          
            <div class="box">
            <div class="box-header with-border">
                  <section class="content-header">
                      <h4 class="text-center" style="float:center">{{$subheading}}</h4>
                      <a class = 'breadcrumb' href='{{ action('Items\ItemsController@create') }}' style="float:right">
                          <img src="{{ url('images/add_icon.png') }}" class="img-circle" alt="User Image" style="height:30px; width:30px">
                      </a>
                  </section>         
            </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead style="background-image: -webkit-gradient(linear, left top, left bottom, from(#f1eeed), to(#666e96));">
                  <tr>
                    <th>S.N.</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Quantity</th>
                    <th>Selling Price(Rs)</th>
                    <th>Discount Rate(%)</th>
                    <th>Manage</th>
                  </tr>
                  </thead>
                  <tbody>
                    @if(count($items)>0)
                       @php ($i = 1)  {{-- // declare the variable   --}}
                      @foreach($items as $item)
                        <tr>
                          <td>{{$i}}</td>
                          <td>{{$item->item_name}}</td>
                          <td>{{$item->i_category}}</td>                          
                          <td>{{$item->i_quantity}}</td>
                          <td>{{$item->i_cur_sp}}</td>
                          <td>{{$item->i_cur_dp}}</td>
                          <td class="text-left">
                              <div class='delete' style="display:inline;">
                                  {!! Form::open(['class'=>'del','action'=>['Items\ItemsController@destroy',$item->item_id],'style'=>'display:inline;','method'=>'POST','id'=>$item->item_id]) !!}
                                  {!! Form::hidden('_method','DELETE') !!}
                                  <button type="button" class="btnk btn btn-danger btn-xs cdelete" onclick="deleteItem({{$item->item_id}})"><i class="fa fa-trash margin-r-5"></i>Delete</button>
                                  {!! Form::close() !!}  
                              </div>
                              <div style="display:inline;float: right clear">
                                <a href="/items/{{$item->item_id}}" class="btn btn-primary btn-xs"><i class="fa fa-check"></i> View</a>
                                <a href="/items/{{$item->item_id}}/edit" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit</a>
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
