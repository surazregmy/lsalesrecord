<div class="row">
    <!-- Today -->
        <div class="col-md-3">
            <!-- Widget: user widget style 1 -->
              <div class="box box-widget">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header text-center" style="padding-bottom: 1px;background-color:#C3C1B8">
                  <h3 class="widget-user-username">Today</h3>
                  <h5 class="widget-user-desc">{{$nepali_date_toady}}</h5>
                </div>
                <div class="box-footer no-padding">
                  <ul class="nav nav-stacked">
                    <li>
                      <a href="#"><b>Purchase</b><span class=" badge bg-green">{{$sum_day['purchase_bill_no']}}</span><span class="pull-right"><b>Rs. {{$sum_day['purchase_total']}}</b></span>
                      </a>
                    </li>
                    <li>
                      <a href="#"><b>Purchase Return </b><span class=" badge bg-orange">{{$sum_day['purchase_return_bill_no']}}</span><span class="pull-right"><b>Rs.{{$sum_day['purchase_return_total']}}</b></span>
                      </a>
                    </li>
                    <li>
                      <a href="#"><b>Total Purchases </b><span class="pull-right"><b>Rs. {{$sum_day['purchase_total_sub']}}</b></span>
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
                <h5 class="widget-user-desc">{{$nweek_begin_md}} to {{$nweek_end_md}}</h5>
              </div>
              <div class="box-footer no-padding">
                <ul class="nav nav-stacked">
                    <li>
                        <a href="#"><b>Purchase</b><span class=" badge bg-green">{{$sum_week['purchase_bill_no']}}</span><span class="pull-right"><b>Rs. {{$sum_week['purchase_total']}}</b></span>
                        </a>
                    </li>
                    <li>
                         <a href="#"><b>Purchase Return </b><span class=" badge bg-orange">{{$sum_week['purchase_return_bill_no']}}</span><span class="pull-right"><b>Rs.{{$sum_week['purchase_return_total']}}</b></span>
                        </a>
                    </li>
                    <li>
                        <a href="#"><b>Total Purchases </b><span class="pull-right"><b>Rs. {{$sum_week['purchase_total_sub']}}</b></span>
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
                  <h5 class="widget-user-desc">{{$nmonth}}</h5>
                </div>
                <div class="box-footer no-padding">
                  <ul class="nav nav-stacked">
                    <li>
                        <a href="#"><b>Purchase</b><span class=" badge bg-green">{{$sum_month['purchase_bill_no']}}</span><span class="pull-right"><b>Rs. {{$sum_month['purchase_total']}}</b></span>
                        </a>
                    </li>
                    <li>
                         <a href="#"><b>Purchase Return </b><span class=" badge bg-orange">{{$sum_month['purchase_return_bill_no']}}</span><span class="pull-right"><b>Rs.{{$sum_month['purchase_return_total']}}</b></span>
                        </a>
                    </li>
                    <li>
                        <a href="#"><b>Total Purchases </b><span class="pull-right"><b>Rs. {{$sum_month['purchase_total_sub']}}</b></span>
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
                  <h5 class="widget-user-desc">{{$fiscal_year}}</h5>
                </div>
                <div class="box-footer no-padding">
                  <ul class="nav nav-stacked">
                    <li>
                        <a href="#"><b>Purchase</b><span class=" badge bg-green">{{$sum_year['purchase_bill_no']}}</span><span class="pull-right"><b>Rs. {{$sum_year['purchase_total']}}</b></span>
                        </a>
                    </li>
                    <li>
                         <a href="#"><b>Purchase Return </b><span class=" badge bg-orange">{{$sum_year['purchase_return_bill_no']}}</span><span class="pull-right"><b>Rs.{{$sum_year['purchase_return_total']}}</b></span>
                        </a>
                    </li>
                    <li>
                        <a href="#"><b>Total Purchases </b><span class="pull-right"><b>Rs. {{$sum_year['purchase_total_sub']}}</b></span>
                        </a>
                    </li>

                  </ul>
                </div>
              </div>
           <!-- /.widget-user -->
        </div>
    </div>
    <!-- /.row -->