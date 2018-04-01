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
            <div class="row">
                    <div class="col-sm-2 text-left">
                     Item Name : 
                    </div>
                    <div class="col-sm-4">
                      {{$item->item_name}}
                    </div>
            </div>
            <div class="row">
                    <div class="col-sm-2 text-left">
                     Item Category : 
                    </div>
                    <div class="col-sm-4">
                      {{$item->i_category}}
                    </div>
            </div>
            <div class="row">
                    <div class="col-sm-2 text-left">
                     Item Quantity : 
                    </div>
                    <div class="col-sm-4">
                      {{$item->i_quantity}}
                    </div>
            </div>
            <div class="row">
                    <div class="col-sm-2 text-left">
                     Previous Cost Price : 
                    </div>
                    <div class="col-sm-4">
                      {{$item->i_pre_cp}}
                    </div>
            </div>
            <div class="row">
                    <div class="col-sm-2 text-left">
                     Previous Sellling Price : 
                    </div>
                    <div class="col-sm-4">
                      {{$item->i_pre_sp}}
                    </div>
            </div>
            <div class="row">
                    <div class="col-sm-2 text-left">
                     Current Cost Price : 
                    </div>
                    <div class="col-sm-4">
                      {{$item->i_cur_cp}}
                    </div>
            </div>
            <div class="row">
                    <div class="col-sm-2 text-left">
                     Current Sellling Price : 
                    </div>
                    <div class="col-sm-4">
                      {{$item->i_cur_sp}}
                    </div>
            </div>
            <div class="row">
                    <div class="col-sm-2 text-left">
                     Previous Discount Price : 
                    </div>
                    <div class="col-sm-4">
                      {{$item->i_pre_dp}}
                    </div>
            </div>
            <div class="row">
                    <div class="col-sm-2 text-left">
                     Current Discount Price : 
                    </div>
                    <div class="col-sm-4">
                      {{$item->i_pre_dp}}
                    </div>
            </div>
            <div class="row">
                    <div class="col-sm-2 text-left">
                    low flag : 
                    </div>
                    <div class="col-sm-4">
                      {{$item->i_low_flag}}
                    </div>
            </div>

      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        Footer
      </div>
      <!-- /.box-footer-->
    </div>
  </div>
</section>
@endsection