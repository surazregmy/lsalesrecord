@extends('layouts.apptheme')
@section('content')
<section class="content">
    <!-- Default box -->
  <div style="margin-left:0px; margin-right:0px"> 
    <div class="box">
      <div class="box-header with-border">
      <h4 class="text-center">{{$subheading}}</h4>
      </div>
      <div class="box-body">
        <div class="col-md-8">
          <table class="table table-bordered table-striped table-hover ">
              <tr>
                <td>Item Name</td>
                <td>{{$item->item_name}}</td>
              </tr>
              <tr>
                <td>Item Category</td>
                <td>{{$item->i_category}}</td>
              </tr>
              <tr>
                  <td>Item Quantity</td>
                  <td>{{$item->i_quantity}}</td>
              </tr>
              <tr>
                    <td>Previous Cost Price</td>
                    <td>{{$item->i_pre_cp}}</td>
              </tr>
              <tr>
                  <td>Previous Sellling Price </td>
                  <td>{{$item->i_pre_sp}}</td>
              </tr>
              <tr>
                  <td>Current Cost Price</td>
                  <td>{{$item->i_cur_cp}}</td>
              </tr>
              <tr>
                  <td>Current Sellling Price </td>
                  <td>{{$item->i_cur_sp}}</td>
              </tr>
              <tr>
                  <td>Previous Discount Rate </td>
                  <td>{{$item->i_pre_dp}}</td>
              </tr>
              <tr>
                  <td>Current Discount Rate </td>
                  <td>{{$item->i_cur_dp}}</td>
              </tr>
              <tr>
                  <td>Date of rate changed</td>
                  <td>{{$item->i_date_of_change_of_price}}</td>
              </tr>
              <tr>
                  <td>Low Flag</td>
              <td>{{$item->i_low_flag}}</td>
              </tr>
              
            </table>
        </div>
            

      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        
      </div>
      <!-- /.box-footer-->
    </div>
  </div>
</section>
@endsection