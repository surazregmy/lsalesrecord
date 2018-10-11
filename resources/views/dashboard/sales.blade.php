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
                    <a href="#"><b>Cash Sales </b><span class=" badge bg-green">{{$sum_day['cash_bill_no']}}</span>
                        <span class="pull-right"><b>Rs. {{$sum_day['cash_total']}}</b></span>
                      </a>
                    </li>
                    <li>
                      <a href="#"><div><b>Credit Sales</b></div>
                      <div>&nbsp Cleared <span class=" badge bg-blue">{{$sum_day['credit_clear_bill_no']}}</span>
                          <span class=" pull-right"><b> Rs.{{$sum_day['credit_clear_total']}} </b></span></div>
                      <div>&nbsp Due <span class=" badge bg-red">{{$sum_day['credit_due_bill_no']}}</span>
                      <span class=" pull-right "><b> Rs.{{$sum_day['credit_due_total']}}</b></span></div></a>
                    </li>
                    <li>
                      <a href="#"><div><b>Half Paid</b></div>
                      <div>&nbsp Cleared <span class=" badge bg-blue"><b>{{$sum_day['hp_clear_bill_no']}}</b></span>
                          <span class=" pull-right"><b>Rs.{{$sum_day['hp_clear_total']}}</b></span></div>
                      <div>&nbsp Due <span class=" badge bg-red">{{$sum_day['hp_due_bill_no']}}</span>
                      <span class=" pull-right "><b> Rs. {{$sum_day['hp_due_total']}} </b></span></div></a>
                    </li>
                    <li>
                    <a href="#"><b>Sales Return </b><span class=" badge bg-orange">{{$sum_day['sr_bill_no']}}</span>
                        <span class="pull-right"><b>Rs. {{$sum_day['sr_total']}}</b></span>
                      </a>
                    </li>
                    <li>
                      <a href="#"><b>Total Sales </b><span class="pull-right"><b>Rs. {{$sum_day['total_sales']}}</b></span>
                      </a>
                    </li>
                     <li>
                      <a href="#"><b>Total Profit </b><span class="pull-right"><b>Rs. {{$sum_day['total_profit']}}</b></span>
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
                      <a href="#"><b>Cash Sales </b><span class=" badge bg-green">{{$sum_week['cash_bill_no']}}</span>
                          <span class="pull-right"><b>Rs.{{$sum_week['cash_total']}}</b></span>
                      </a>
                    </li>
                    <li>
                      <a href="#"><div><b>Credit Sales</b></div>
                      <div>&nbsp Cleared <span class=" badge bg-blue">{{$sum_week['credit_clear_bill_no']}}</span>
                          <span class=" pull-right"><b> Rs.{{$sum_week['credit_clear_total']}} </b></span></div>
                      <div>&nbsp Due <span class=" badge bg-red">{{$sum_week['credit_clear_bill_no']}}</span>
                      <span class=" pull-right "><b> Rs.{{$sum_week['credit_clear_total']}}</b></span></div></a>
                    </li>
                    <li>
                      <a href="#"><div><b>Half Paid</b></div>
                      <div>&nbsp Cleared <span class=" badge bg-blue"><b>{{$sum_week['hp_clear_bill_no']}}</b></span>
                          <span class=" pull-right"><b>{$sum_week['hp_clear_total']}}</b></span></div>
                      <div>&nbsp Due <span class=" badge bg-red">{{$sum_week['hp_due_bill_no']}}</span>
                      <span class=" pull-right "><b> Rs.{{$sum_week['hp_due_total']}}</b></span></div></a>
                    </li>
                    <li>
                      <a href="#"><b>Sales Return </b><span class=" badge bg-orange">{{$sum_week['sr_bill_no']}}</span>
                          <span class="pull-right"><b>Rs. {{$sum_week['sr_bill_total']}}</b></span>
                      </a>
                    </li>
                    <li>
                      <a href="#"><b>Total Sales </b><span class="pull-right"><b>Rs. {{$sum_week['total_sales']}}</b></span>
                      </a>
                    </li>
                     <li>
                      <a href="#"><b>Total Profit </b><span class="pull-right"><b>Rs. {{$sum_day['total_profit']}}</b></span>
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
                      <a href="#"><b>Cash Sales </b><span class=" badge bg-green">{{$sum_month['cash_bill_no']}}</span>
                          <span class="pull-right"><b>Rs.{{$sum_month['cash_total']}}</b></span>
                      </a>
                    </li>
                    <li>
                      <a href="#"><div><b>Credit Sales</b></div>
                      <div>&nbsp Cleared <span class=" badge bg-blue">{{$sum_month['credit_clear_bill_no']}}</span>
                          <span class=" pull-right"><b> Rs.{{$sum_month['credit_clear_total']}} </b></span></div>
                      <div>&nbsp Due <span class=" badge bg-red">{{$sum_month['credit_due_bill_no']}}</span>
                      <span class=" pull-right "><b> Rs. {{$sum_month['credit_due_total']}} </b></span></div></a>
                    </li>
                    <li>
                      <a href="#"><div><b>Half Paid</b></div>
                      <div>&nbsp Cleared <span class=" badge bg-blue"><b>{{$sum_month['hp_clear_bill_no']}}</b>
                          </span><span class=" pull-right"><b>Rs. {{$sum_month['hp_clear_total']}}</b></span></div>
                      <div>&nbsp Due <span class=" badge bg-red">{{$sum_month['hp_due_bill_no']}}</span>
                      <span class=" pull-right "><b> Rs. {{$sum_month['hp_due_total']}} </b></span></div></a>
                    </li>
                    <li>
                      <a href="#"><b>Sales Return </b><span class=" badge bg-orange">Rs. {{$sum_month['sr_bill_no']}}</span>
                          <span class="pull-right"><b>Rs. {{$sum_month['sr_bill_total']}}</b></span>
                      </a>
                    </li>
                    <li>
                      <a href="#"><b>Total Sales </b><span class="pull-right"><b>Rs. {{$sum_month['total_sales']}}</b></span>
                      </a>
                    </li>
                     <li>
                      <a href="#"><b>Total Profit </b><span class="pull-right"><b>Rs. {{$sum_month['total_profit']}}</b></span>
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
                      <a href="#"><b>Cash Sales </b><span class=" badge bg-green">{{$sum_year['cash_bill_no']}}</span>
                          <span class="pull-right"><b>Rs. {{$sum_year['cash_total']}}</b></span>
                      </a>
                    </li>
                    <li>
                      <a href="#"><div><b>Credit Sales</b></div>
                      <div>&nbsp Cleared <span class=" badge bg-blue">{{$sum_year['credit_clear_bill_no']}}</span>
                          <span class=" pull-right"><b> Rs. {{$sum_year['credit_clear_total']}} </b></span></div>
                      <div>&nbsp Due <span class=" badge bg-red">{{$sum_year['credit_due_bill_no']}}</span>
                      <span class=" pull-right "><b> Rs. {{$sum_year['credit_due_total']}} </b></span></div></a>
                    </li>
                    <li>
                      <a href="#"><div><b>Half Paid</b></div>
                      <div>&nbsp Cleared <span class=" badge bg-blue"><b>{{$sum_year['hp_clear_bill_no']}}</b></span>
                          <span class=" pull-right"><b>Rs. {{$sum_year['hp_clear_total']}}</b></span></div>
                      <div>&nbsp Due <span class=" badge bg-red">{{$sum_year['hp_due_bill_no']}}</span>
                      <span class=" pull-right "><b> Rs. {{$sum_year['hp_due_total']}} </b></span></div></a>
                    </li>
                    <li>
                      <a href="#"><b>Sales Return </b><span class=" badge bg-orange">{{$sum_year['sr_bill_no']}}</span>
                          <span class="pull-right"><b>Rs. {{$sum_year['sr_bill_total']}}</b></span>
                      </a>
                    </li>
                    <li>
                      <a href="#"><b>Total Sales </b><span class="pull-right"><b>Rs. {{$sum_year['total_sales']}}</b></span>
                      </a>
                    </li>
                     <li>
                      <a href="#"><b>Total Profit </b><span class="pull-right"><b>Rs. {{$sum_year['total_profit']}}</b></span>
                      </a>
                    </li>

                  </ul>
                </div>
              </div>
           <!-- /.widget-user -->
        </div>
    </div>
    <!-- /.row -->