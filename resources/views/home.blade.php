@extends('layouts.apptheme')
@section('content')
<section class="content">

  <!-- row -->
  <div class="row">
    <div class="col-xs-12">
      <!-- jQuery Knob -->
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-bar-chart-o"></i>

          <h3 class="box-title">Sales and Sales Return</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        
            

          <div class="row">
          <!-- Today -->
              <div class="col-md-3">
                  <!-- Widget: user widget style 1 -->
                    <div class="box box-widget">
                      <!-- Add the bg color to the header using any of the bg-* classes -->
                      <div class="widget-user-header text-center" style="padding-bottom: 1px;background-color:#C3C1B8">
                        <h3 class="widget-user-username">Today</h3>
                        <h5 class="widget-user-desc">Baisakh  11</h5>
                      </div>
                      <div class="box-footer no-padding">
                        <ul class="nav nav-stacked">
                          <li>
                          <a href="#"><b>Cash Sales </b><span class=" badge bg-green">{{$cash_bill_no}}</span><span class="pull-right"><b>Rs. {{$cash_total}}</b></span>
                            </a>
                          </li>
                          <li>
                            <a href="#"><div><b>Credit Sales</b></div>
                            <div>&nbsp Cleared <span class=" badge bg-blue">31</span><span class=" pull-right"><b> Rs. 31 </b></span></div>
                            <div>&nbsp Due <span class=" badge bg-red">31</span>
                            <span class=" pull-right "><b> Rs. 31 </b></span></div></a>
                          </li>
                          <li>
                            <a href="#"><div><b>Half Paid</b></div>
                            <div>&nbsp Cleared <span class=" badge bg-blue"><b>31</b></span><span class=" pull-right"><b>Rs. 31</b></span></div>
                            <div>&nbsp Due <span class=" badge bg-red">31</span>
                            <span class=" pull-right "><b> Rs. 31 </b></span></div></a>
                          </li>
                          <li>
                            <a href="#"><b>Sales Return </b><span class=" badge bg-orange">31</span><span class="pull-right"><b>Rs. 31</b></span>
                            </a>
                          </li>
                          <li>
                            <a href="#"><b>Total Sales </b><span class="pull-right"><b>Rs. 31</b></span>
                            </a>
                          </li>
                           <li>
                            <a href="#"><b>Total Profit </b><span class="pull-right"><b>Rs. 31</b></span>
                            </a>
                          </li>

                        </ul>
                      </div>
                    </div>
                 <!-- /.widget-user -->
              </div>
              <!-- This week -->
              <div class="col-md-3">
                  <!-- Widget: user widget style 1 -->
                    <div class="box box-widget">
                      <!-- Add the bg color to the header using any of the bg-* classes -->
                      <div class="widget-user-header text-center" style="padding-bottom: 1px;background-color:#A6A395">
                        <h3 class="widget-user-username">This Week</h3>
                        <h5 class="widget-user-desc">Baisakh  11</h5>
                      </div>
                      <div class="box-footer no-padding">
                        <ul class="nav nav-stacked">
                          <li>
                            <a href="#"><b>Cash Sales </b><span class=" badge bg-green">31</span><span class="pull-right"><b>Rs. 31</b></span>
                            </a>
                          </li>
                          <li>
                            <a href="#"><div><b>Credit Sales</b></div>
                            <div>&nbsp Cleared <span class=" badge bg-blue">31</span><span class=" pull-right"><b> Rs. 31 </b></span></div>
                            <div>&nbsp Due <span class=" badge bg-red">31</span>
                            <span class=" pull-right "><b> Rs. 31 </b></span></div></a>
                          </li>
                          <li>
                            <a href="#"><div><b>Half Paid</b></div>
                            <div>&nbsp Cleared <span class=" badge bg-blue"><b>31</b></span><span class=" pull-right"><b>Rs. 31</b></span></div>
                            <div>&nbsp Due <span class=" badge bg-red">31</span>
                            <span class=" pull-right "><b> Rs. 31 </b></span></div></a>
                          </li>
                          <li>
                            <a href="#"><b>Sales Return </b><span class=" badge bg-orange">31</span><span class="pull-right"><b>Rs. 31</b></span>
                            </a>
                          </li>
                          <li>
                            <a href="#"><b>Total Sales </b><span class="pull-right"><b>Rs. 31</b></span>
                            </a>
                          </li>
                           <li>
                            <a href="#"><b>Total Profit </b><span class="pull-right"><b>Rs. 31</b></span>
                            </a>
                          </li>

                        </ul>
                      </div>
                    </div>
                 <!-- /.widget-user -->
              </div>
              <!-- This Month -->
               <div class="col-md-3">
                  <!-- Widget: user widget style 1 -->
                    <div class="box box-widget">
                      <!-- Add the bg color to the header using any of the bg-* classes -->
                      <div class="widget-user-header text-center" style="padding-bottom: 1px;background-color:#888472">
                        <h3 class="widget-user-username">This Month</h3>
                        <h5 class="widget-user-desc">Baisakh  11</h5>
                      </div>
                      <div class="box-footer no-padding">
                        <ul class="nav nav-stacked">
                          <li>
                            <a href="#"><b>Cash Sales </b><span class=" badge bg-green">31</span><span class="pull-right"><b>Rs. 31</b></span>
                            </a>
                          </li>
                          <li>
                            <a href="#"><div><b>Credit Sales</b></div>
                            <div>&nbsp Cleared <span class=" badge bg-blue">31</span><span class=" pull-right"><b> Rs. 31 </b></span></div>
                            <div>&nbsp Due <span class=" badge bg-red">31</span>
                            <span class=" pull-right "><b> Rs. 31 </b></span></div></a>
                          </li>
                          <li>
                            <a href="#"><div><b>Half Paid</b></div>
                            <div>&nbsp Cleared <span class=" badge bg-blue"><b>31</b></span><span class=" pull-right"><b>Rs. 31</b></span></div>
                            <div>&nbsp Due <span class=" badge bg-red">31</span>
                            <span class=" pull-right "><b> Rs. 31 </b></span></div></a>
                          </li>
                          <li>
                            <a href="#"><b>Sales Return </b><span class=" badge bg-orange">31</span><span class="pull-right"><b>Rs. 31</b></span>
                            </a>
                          </li>
                          <li>
                            <a href="#"><b>Total Sales </b><span class="pull-right"><b>Rs. 31</b></span>
                            </a>
                          </li>
                           <li>
                            <a href="#"><b>Total Profit </b><span class="pull-right"><b>Rs. 31</b></span>
                            </a>
                          </li>

                        </ul>
                      </div>
                    </div>
                 <!-- /.widget-user -->
              </div>
              <!-- This Year -->
               <div class="col-md-3">
                  <!-- Widget: user widget style 1 -->
                    <div class="box box-widget">
                      <!-- Add the bg color to the header using any of the bg-* classes -->
                      <div class="widget-user-header text-center" style="padding-bottom: 1px;background-color:#6A664F">
                        <h3 class="widget-user-username">This Year</h3>
                        <h5 class="widget-user-desc">Baisakh  11</h5>
                      </div>
                      <div class="box-footer no-padding">
                        <ul class="nav nav-stacked">
                          <li>
                            <a href="#"><b>Cash Sales </b><span class=" badge bg-green">31</span><span class="pull-right"><b>Rs. 31</b></span>
                            </a>
                          </li>
                          <li>
                            <a href="#"><div><b>Credit Sales</b></div>
                            <div>&nbsp Cleared <span class=" badge bg-blue">31</span><span class=" pull-right"><b> Rs. 31 </b></span></div>
                            <div>&nbsp Due <span class=" badge bg-red">31</span>
                            <span class=" pull-right "><b> Rs. 31 </b></span></div></a>
                          </li>
                          <li>
                            <a href="#"><div><b>Half Paid</b></div>
                            <div>&nbsp Cleared <span class=" badge bg-blue"><b>31</b></span><span class=" pull-right"><b>Rs. 31</b></span></div>
                            <div>&nbsp Due <span class=" badge bg-red">31</span>
                            <span class=" pull-right "><b> Rs. 31 </b></span></div></a>
                          </li>
                          <li>
                            <a href="#"><b>Sales Return </b><span class=" badge bg-orange">31</span><span class="pull-right"><b>Rs. 31</b></span>
                            </a>
                          </li>
                          <li>
                            <a href="#"><b>Total Sales </b><span class="pull-right"><b>Rs. 31</b></span>
                            </a>
                          </li>
                           <li>
                            <a href="#"><b>Total Profit </b><span class="pull-right"><b>Rs. 31</b></span>
                            </a>
                          </li>

                        </ul>
                      </div>
                    </div>
                 <!-- /.widget-user -->
              </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <div class="row">
    <div class="col-xs-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-bar-chart-o"></i>

          <h3 class="box-title">Purchase and Purchase Return</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
          </div>
        </div>
        <!-- /.box-header -->
        <!-- /.box-header -->
        <div class="box-body">
        

          <div class="row">
          <!-- Today -->
              <div class="col-md-3">
                  <!-- Widget: user widget style 1 -->
                    <div class="box box-widget">
                      <!-- Add the bg color to the header using any of the bg-* classes -->
                      <div class="widget-user-header text-center" style="padding-bottom: 1px;background-color:#C3C1B8">
                        <h3 class="widget-user-username">Today</h3>
                        <h5 class="widget-user-desc">Baisakh  11</h5>
                      </div>
                      <div class="box-footer no-padding">
                        <ul class="nav nav-stacked">
                          <li>
                            <a href="#"><b>Purchase</b><span class=" badge bg-green">31</span><span class="pull-right"><b>Rs. 31</b></span>
                            </a>
                          </li>
                          <li>
                            <a href="#"><b>Purchase Return </b><span class=" badge bg-orange">31</span><span class="pull-right"><b>Rs. 31</b></span>
                            </a>
                          </li>
                          <li>
                            <a href="#"><b>Total Purchases </b><span class="pull-right"><b>Rs. 31</b></span>
                            </a>
                          </li>

                        </ul>
                      </div>
                    </div>
                 <!-- /.widget-user -->
              </div>
              <!-- This week -->
              <div class="col-md-3">
                <!-- Widget: user widget style 1 -->
                  <div class="box box-widget">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header text-center" style="padding-bottom: 1px;background-color:#A6A395">
                      <h3 class="widget-user-username">This Week</h3>
                      <h5 class="widget-user-desc">Baisakh  11</h5>
                    </div>
                    <div class="box-footer no-padding">
                      <ul class="nav nav-stacked">
                        <li>
                          <a href="#"><b>Purchases </b><span class=" badge bg-green">31</span><span class="pull-right"><b>Rs. 31</b></span>
                          </a>
                        </li>
                        <li>
                            <a href="#"><b>Purchase Returns </b><span class=" badge bg-orange">31</span><span class="pull-right"><b>Rs. 31</b></span>
                            </a>
                        </li>
                        <li>
                            <a href="#"><b>Total Purchase</b><span class="pull-right"><b>Rs. 31</b></span>
                            </a>
                        </li>

                      </ul>
                    </div>
                  </div>
               <!-- /.widget-user -->
              </div>
              <!-- This Month -->
              <div class="col-md-3">
                  <!-- Widget: user widget style 1 -->
                    <div class="box box-widget">
                      <!-- Add the bg color to the header using any of the bg-* classes -->
                      <div class="widget-user-header text-center" style="padding-bottom: 1px;background-color:#888472">
                        <h3 class="widget-user-username">This Month</h3>
                        <h5 class="widget-user-desc">Baisakh  11</h5>
                      </div>
                      <div class="box-footer no-padding">
                        <ul class="nav nav-stacked">
                          <li>
                            <a href="#"><b>Purchase </b><span class=" badge bg-green">31</span><span class="pull-right"><b>Rs. 31</b></span>
                            </a>
                          </li>
                          <li>
                            <a href="#"><b>Purchase Returns </b><span class=" badge bg-orange">31</span><span class="pull-right"><b>Rs. 31</b></span>
                            </a>
                          </li>
                          <li>
                            <a href="#"><b>Total Purchases </b><span class="pull-right"><b>Rs. 31</b></span>
                            </a>
                          </li>

                        </ul>
                      </div>
                    </div>
                 <!-- /.widget-user -->
              </div>
              <!-- This Year -->
              <div class="col-md-3">
                  <!-- Widget: user widget style 1 -->
                    <div class="box box-widget">
                      <!-- Add the bg color to the header using any of the bg-* classes -->
                      <div class="widget-user-header text-center" style="padding-bottom: 1px;background-color:#6A664F">
                        <h3 class="widget-user-username">This Year</h3>
                        <h5 class="widget-user-desc">Baisakh  11</h5>
                      </div>
                      <div class="box-footer no-padding">
                        <ul class="nav nav-stacked">
                          <li>
                            <a href="#"><b>Purchases </b><span class=" badge bg-green">31</span><span class="pull-right"><b>Rs. 31</b></span>
                            </a>
                          </li>
                          <li>
                            <a href="#"><b>Purchase Return </b><span class=" badge bg-orange">31</span><span class="pull-right"><b>Rs. 31</b></span>
                            </a>
                          </li>
                          <li>
                            <a href="#"><b>Total Purchase </b><span class="pull-right"><b>Rs. 31</b></span>
                            </a>
                          </li>

                        </ul>
                      </div>
                    </div>
                 <!-- /.widget-user -->
              </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

<!-- Sales Graph -->
  <div class="row">
      <div class="col-md-12">
        <!-- AREA CHART -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Sales Chart</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="box-body">
            <div class="chart">
              <canvas id="areaChart" style="height:250px"></canvas>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <!-- DONUT CHART -->
        <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title">Purchase Chart</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="box-body">
            <canvas id="pieChart" style="height:250px"></canvas>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

      </div>

      </div>

</section>
@endsection