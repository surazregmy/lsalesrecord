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
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
            
    </div>
    <!-- /.box-footer-->
    </div>
</div>s