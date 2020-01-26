<div class="row" style="margin-left:0px; margin-right:0px"> 
    <div class="box">
        <div class="box-header with-border">
            <section class="content-header">
                <h4 class="text-center" style="float:center">Sales Report</h4>
            </section>         
        </div>
    <div class="box-body">
        <div class="col-md-12">
          <!-- Widget: user widget style 1 -->
            <div class="box box-widget">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header text-center" style="padding-bottom: 1px;background-color:#C3C1B8">
                <h3 class="widget-user-username">Custom Date</h3>
              <h5 class="widget-user-desc">{{$nepali_date_range}}</h5>
              </div>
              <div class="box-footer no-padding">
                <ul class="nav nav-stacked">
                  <li>
                  <a href="/generateCustomDateRangesSalesSummaryDetail/CashSales/{{$efromDate}}/{{$etoDate}}"><b>Cash Sales </b><span class=" badge bg-green">{{$sum_day['cash_bill_no']}}</span>
                      <span class="pull-right"><b>Rs. {{$sum_day['cash_total']}}</b></span>
                    </a>
                  </li>
                  <li>
                    <a href="/generateCustomDateRangesSalesSummaryDetail/CreditSales/{{$efromDate}}/{{$etoDate}}"><div><b>Credit Sales</b></div>
                    <div>&nbsp Cleared <span class=" badge bg-blue">{{$sum_day['credit_clear_bill_no']}}</span>
                        <span class=" pull-right"><b> Rs.{{$sum_day['credit_clear_total']}} </b></span></div>
                    <div>&nbsp Due <span class=" badge bg-red">{{$sum_day['credit_due_bill_no']}}</span>
                    <span class=" pull-right "><b> Rs.{{$sum_day['credit_due_total']}}</b></span></div></a>
                  </li>
                  <li>
                    <a href="/generateCustomDateRangesSalesSummaryDetail/HalfPaid/{{$efromDate}}/{{$etoDate}}"><div><b>Half Paid</b></div>
                    <div>&nbsp Cleared <span class=" badge bg-blue"><b>{{$sum_day['hp_clear_bill_no']}}</b></span>
                        <span class=" pull-right"><b>Rs.{{$sum_day['hp_clear_total']}}</b></span></div>
                    <div>&nbsp Due <span class=" badge bg-red">{{$sum_day['hp_due_bill_no']}}</span>
                    <span class=" pull-right "><b> Rs. {{$sum_day['hp_due_total']}} </b></span></div></a>
                  </li>
                  <li>
                  <a href="/generateCustomDateRangesSalesSummaryDetail/SalesReturn/{{$efromDate}}/{{$etoDate}}"><b>Sales Return </b><span class=" badge bg-orange">{{$sum_day['sr_bill_no']}}</span>
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
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
            
    </div>
    <!-- /.box-footer-->
    </div>
</div>