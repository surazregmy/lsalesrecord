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
        <div class="box-body" id = "purchaseresult">
      
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
  var dt = new Date(); 
  console.log(dt);
	var month = dateObj.getMonth() + 1; //months from 1-12
	var day = dateObj.getDate();
	var year = dateObj.getFullYear();
	var Day = dateObj.getDay();
	//console.log(dateObj);	
  var n_date = calendarFunctions.getBsDateByAdDate(year, month, day);
  console.log(n_date);
  var nepali_date_toady = n_date.bsYear + '-'+ n_date.bsMonth + '-'+ n_date.bsDate;
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
	var week_actual_end_date = dateObj;
	var week_end_date  = dateObj;
	switch(Day){
		case 0:
			week_begin_date.setDate(week_begin_date.getDate()-0); 
      console.log(week_begin_date);
			week_actual_end_date.setDate(week_actual_end_date.getDate()+6); 
			break;
		case 1:
			week_begin_date.setDate(week_begin_date.getDate()-1); 
			week_actual_end_date.setDate(week_actual_end_date.getDate()+5); 
			break;
		case 2:
			week_begin_date.setDate(week_begin_date.getDate()-2); 
			week_actual_end_date.setDate(week_actual_end_date.getDate()+4);

			break;
		case 3:
			week_begin_date.setDate(week_begin_date.getDate()-3); 
			week_actual_end_date.setDate(week_actual_end_date.getDate()+3); 
			break;
		case 4:
			week_begin_date.setDate(week_begin_date.getDate()-4); 
			week_actual_end_date.setDate(week_actual_end_date.getDate()+2); 
			break;
		case 5:
			week_begin_date.setDate(week_begin_date.getDate()-5); 
			week_actual_end_date.setDate(week_actual_end_date.getDate()+1); 
			console.log("I am in case 5");
			break;
		case 6:
			week_begin_date.setDate(week_begin_date.getDate()-6);
			week_actual_end_date.setDate(week_actual_end_date.getDate()+0);  
			break;	
	}

  console.log("week");
	console.log(week_begin_date);
	console.log(week_end_date);
	console.log(week_actual_end_date);
	var wbmonth = week_begin_date.getUTCMonth() + 1; //months from 1-12
	var wemonth = week_end_date.getUTCMonth() + 1; //months from 1-12
	var nweek_begin_date = calendarFunctions.getBsDateByAdDate(week_begin_date.getUTCFullYear(),wbmonth,week_begin_date.getUTCDate());
	var nweek_end_date = calendarFunctions.getBsDateByAdDate(week_actual_end_date.getUTCFullYear(),wemonth,week_actual_end_date.getUTCDate());	
	
	var nyear = nweek_begin_date.bsYear; 
	var nweek_b_date_m = nweek_begin_date.bsMonth; 
	var nweek_b_date_d = nweek_begin_date.bsDate;
	var nweek_e_date_m = nweek_end_date.bsMonth; 
	var nweek_e_date_d = nweek_end_date.bsDate;
	console.log(nweek_begin_date);
	console.log(nweek_end_date);
	console.log(nweek_b_date_m+'-'+nweek_b_date_d);
	console.log(nweek_e_date_m+'-'+nweek_e_date_d);
	var fiscal_year;
	if(nweek_b_date_m < 4){
		fiscal_year = 	(nyear-1) + '-'+ nyear;
	}
	else{
		fiscal_year = nyear+'-'+ (nyear+1);
	}
	console.log(fiscal_year);	
	
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
                    url :  'saleSummary',
                    data: {
                      _token: CSRF_TOKEN,
                      today_date : dt, 
                      nepali_date_toady : nepali_date_toady,
                      nmonth:nmonth,
                      week_begin_date: week_begin_date,
                      week_end_date:week_end_date,
                      month_begin_date:month_begin_date,
                      month_end_date:month_end_date,
                      fiscal_year_begin_date:fiscal_year_begin_date,
                      fiscal_year_end_date:fiscal_year_end_date,
                      // for show 
                      nweek_begin_md : nweek_b_date_m+'-'+nweek_b_date_d, 
                      nweek_end_md : nweek_e_date_m+'-'+nweek_e_date_d,
                      fiscal_year : fiscal_year,


                      },
                    dataType: 'JSON',
                    success : function(msg){
                      // alert("success");
                      // console.log(msg);
                      $('#salesresult').html(msg);
                    },
                    error: function (request, status, error) {
                        // alert(request.responseText);
                        $('#salesresult').html(request.responseText); //it works for now
                    }
          });

          $.ajax({
                    type : "POST",
                    url :  'purchaseSummary',
                    data: {
                      _token: CSRF_TOKEN,
                      today_date : dt, 
                      nepali_date_toady : nepali_date_toady,
                      nmonth:nmonth,
                      week_begin_date: week_begin_date,
                      week_end_date:week_end_date,
                      month_begin_date:month_begin_date,
                      month_end_date:month_end_date,
                      fiscal_year_begin_date:fiscal_year_begin_date,
                      fiscal_year_end_date:fiscal_year_end_date,
                      // for show 
                      nweek_begin_md : nweek_b_date_m+'-'+nweek_b_date_d, 
                      nweek_end_md : nweek_e_date_m+'-'+nweek_e_date_d,
                      fiscal_year : fiscal_year,


                      },
                    dataType: 'JSON',
                    success : function(msg){
                      // alert("success");
                      // console.log(msg);
                      $('#purchaseresult').html(msg);
                    },
                    error: function (request, status, error) {
                        // alert(request.responseText);
                        $('#purchaseresult').html(request.responseText); //it works for now
                    }
          });



		
});	
</script>
@endsection
