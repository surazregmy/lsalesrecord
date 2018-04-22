@extends('layouts.apptheme')
@section('content')
<section class="content">
        <div class="row" style="margin-left:0px; margin-right:0px">
  
            <div class="box">
                    <div class="box-header with-border">
                            <h4 class="text-center">{{$subheading}}</h4>
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
                              <div id='delete' style="display:inline;">
                                  {!! Form::open(['action'=>['Items\ItemsController@destroy',$item->item_id],'style'=>'display:inline;','method'=>'POST']) !!}
                                  {!! Form::hidden('_method','DELETE') !!}
                                  {!!Form::submit('Delete',['class'=>'btn btn-danger btn-xs cdelete','onClick' => 'return ConfirmDelete()'])!!}
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
<script>
 function ConfirmDelete()
    {
     var x = confirm("Delete?");
     if(x) return true; 
     else return false;
      
  }
</script>