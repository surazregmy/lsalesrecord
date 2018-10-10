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
        <div class="box-body" id = 'salesresult'>
        
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

@section('pagespecificscripts')

<script type="text/javascript">
  $(document).ready(function() {
    var dateObj = new Date();
	var month = dateObj.getMonth() + 1; //months from 1-12
	var day = dateObj.getDate();
	var year = dateObj.getFullYear();
	var Day = dateObj.getDay();
	//console.log(dateObj);	
  	var nepalidate = calendarFunctions.getBsMonthByAdDate(year, month, day);
	var nmonth = calendarFunctions.getBsMonthByAdDate(year, month, day);
	var nyear = calendarFunctions.getBsYearByAdDate(year,month,day); 
	var month_last_date = calendarFunctions.getBsMonthDays(nyear,nmonth); 
	var month_begin_date = calendarFunctions.getAdDateByBsDate(nyear,nmonth,1);
	var month_end_date = calendarFunctions.getAdDateByBsDate(nyear,nmonth,month_last_date);
	console.log("Month");
	console.log(month_begin_date);
	console.log(month_end_date);
	// this is for week 

	var week_begin_date=new Date() ;
	var week_end_date  = dateObj;
	switch(Day){
		case 0:
      week_begin_date.setDate(week_begin_date.getDate()-0); 
			break;
		case 1:
      week_begin_date.setDate(week_begin_date.getDate()-1); 
			break;
		case 2:
      week_begin_date.setDate(week_begin_date.getDate()-2); 
			break;
		case 3:
			week_begin_date.setDate(week_begin_date.getDate()-3); 
			break;
		case 4:
      week_begin_date.setDate(week_begin_date.getDate()-4); 
			break;
		case 5:
      week_begin_date.setDate(week_begin_date.getDate()-5); 
			break;
		case 6:
      week_begin_date.setDate(week_begin_date.getDate()-6); 
			break;
			
			
	}

	console.log("week");
	console.log(week_begin_date);
	console.log(week_end_date);
	
	//this is for year
	var fiscal_month_last_date = calendarFunctions.getBsMonthDays(nyear+1,3); 
	var fiscal_year_begin_date = calendarFunctions.getAdDateByBsDate(nyear,4,1);  // Shrawan of last yea
	var fiscal_year_end_date = calendarFunctions.getAdDateByBsDate(nyear+1,3,fiscal_month_last_date);	 // Ashar
	
	console.log("Year");
	console.log(fiscal_year_begin_date);
	console.log(fiscal_year_end_date);

  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

  $.ajax({
                    type : "POST",
                    url :  '/saleSummary',
                    data: {
                      _token: CSRF_TOKEN,
                      today_date : dateObj, 
                      week_begin_date: week_begin_date,
                      week_end_date:week_end_date,
                      month_begin_date:month_begin_date,
                      month_end_date:month_end_date,
                      fiscal_year_begin_date:fiscal_year_begin_date,
                      fiscal_year_end_date:fiscal_year_end_date
                      },
                    dataType: 'JSON',
                    success : function(msg){
                      alert("success");
                      // console.log(msg);
                      $('#salesresult').html(msg);
                    },
                    error: function (request, status, error) {
                        alert(request.responseText);
                        $('#salesresult').html(request.responseText); //it works for now
                    }
          });



		
});	
</script>
@endsection
