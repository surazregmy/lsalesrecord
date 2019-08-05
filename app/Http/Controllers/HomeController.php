<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sbill\Sbill;
use App\Srbill\Srbill;
use Carbon\carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sbills = Sbill::all()->where('sbill_type','cash');
        $cash_bill_no = 0;
        $cash_total = 0;
        $cash_profit = 0;
        foreach($sbills as $sbill){
            $cash_bill_no++;
            $cash_total = $sbill->s_fin_total_amount +  $cash_total;
            $cash_profit = $sbill->profit_amount +  $cash_profit;
        }

        $credit_clear_bill_no = 0;
        $credit_clear_total = 0;
        $credit_clear_profit = 0;
        $sbills = Sbill::all()->where('sbill_type','credit')->where('status','clear');
        foreach($sbills as $sbill){
            $credit_clear_bill_no++;
            $credit_clear_total = $sbill->s_fin_total_amount +  $cash_total;
            $credit_clear_profit = $sbill->profit_amount +  $cash_profit;
        }

        $credit_due_bill_no = 0;
        $credit_due_total = 0;
        $credit_due_profit = 0;
        $sbills = Sbill::all()->where('sbill_type','credit')->where('status','due');
        foreach($sbills as $sbill){
            $credit_due_bill_no++;
            $credit_due_total = $sbill->s_fin_total_amount +  $cash_total;
            $credit_due_profit = $sbill->profit_amount +  $cash_profit;
        }

        $hp_clear_bill_no = 0;
        $hp_clear_total = 0;
        $hp_clear_profit = 0;
        $sbills = Sbill::all()->where('sbill_type','halfpaid')->where('status','clear');
        foreach($sbills as $sbill){
            $hp_clear_bill_no++;
            $hp_clear_total = $sbill->s_fin_total_amount +  $cash_total;
            $hp_clear_profit = $sbill->profit_amount +  $cash_profit;
        }

        $hp_due_bill_no = 0;
        $hp_due_total = 0;
        $hp_due_profit = 0;
        $sbills = Sbill::all()->where('sbill_type','halfpaid')->where('status','due');
        foreach($sbills as $sbill){
            $hp_due_bill_no++;
            $hp_due_total = $sbill->s_fin_total_amount +  $cash_total;
            $hp_due_profit = $sbill->profit_amount +  $cash_profit;
        }
        
       

        $data = array(
            'heading' => 'Salesrecord',
            'subheading' => 'Dashboard',
            'brname' => 'home',
            'cash_bill_no'=>$cash_bill_no,
            'cash_total'=>$cash_total,
            'cash_profit'=>$cash_profit,

        );
        return view('dashboard.dashboard')->with($data);
    }

    function salesSummary(Request $request ){
        $td =  substr($request->input('today_date'),0,15);
        $wbd = substr($request->input('week_begin_date'),0,15);
        $wed = substr($request->input('week_end_date'),0,15);
        $mbd = substr($request->input('month_begin_date'),0,15);
        $med = substr($request->input('month_end_date'),0,15);
        $ybd = substr($request->input('fiscal_year_begin_date'),0,15);
        $yed = substr($request->input('fiscal_year_end_date'),0,15);

        $today_date = Carbon::parse($td, 'UTC')->toDateString();
        $week_begin_date = Carbon::parse($wbd, 'UTC')->toDateString();
        $week_end_date = Carbon::parse($wed, 'UTC')->toDateString();
        $month_begin_date = Carbon::parse($mbd, 'UTC')->toDateString();
        $month_end_date = Carbon::parse($med, 'UTC')->toDateString();
        $year_begin_date = Carbon::parse($ybd, 'UTC')->toDateString();
        $year_end_date = Carbon::parse($yed, 'UTC')->toDateString();

        $sum_day =  $this->genSummary($today_date);
       
       
        $sum_week =  $this->genSummary($week_begin_date,$week_end_date);
        $sum_month =  $this->genSummary($month_begin_date,$month_end_date);
        $sum_year =  $this->genSummary($year_begin_date,$year_end_date);


        $data = array(
            'nepali_date_toady' => $request->input('nepali_date_toady'),
            'nweek_begin_md' => $request->input('nweek_begin_md'),
            'nweek_end_md' => $request->input('nweek_end_md'),
            'nmonth'=> $request->input('nmonth'),
            'fiscal_year' => $request->input('fiscal_year'),
            'week_begin_date' => $wbd,
            'week_end_date'=>$wed,
            'month_begin_date'=>$mbd,
            'month_end_date' => $med,
            'sum_day' => $sum_day,
            'sum_week' => $sum_week, 
            'sum_month' => $sum_month, 
            'sum_year' => $sum_year
        );
        return view('dashboard.sales')->with($data);

    }
    public function genSummary($startdate, $enddate = NULL){

        // Cash 
        // echo $startdate; 
        // echo $enddate;
        // die;
        $cash_bill_no = 0;
        $cash_total = 0;
        $cash_profit = 0;
        if(is_null($enddate)){
            $sbills = Sbill::all()
                        ->where('sbill_type','cash')
                        ->where('s_date_of_sale','=',$startdate);
        }
        else{
            $sbills = Sbill::all()
                        ->where('sbill_type','cash')
                        ->where('s_date_of_sale','>=',$startdate)
                        ->where('s_date_of_sale','<=',$enddate);
        }
        foreach($sbills as $sbill){
            $cash_bill_no = $cash_bill_no + 1;
            $cash_total = $sbill->s_fin_total_amount +  $cash_total;
            $cash_profit = $sbill->profit_amount +  $cash_profit;
        }
    //    echo "<pre>";
    //    print_r($sbills);
    //    echo '</br>';
    //    echo $cash_bill_no;
    //    die;

        // credit clear
        $credit_clear_bill_no = 0;
        $credit_clear_total = 0;
        $credit_clear_profit = 0;

        if(is_null($enddate)){
            $sbills = Sbill::all()
                        ->where('sbill_type','credit')
                        ->where('status','clear')
                        ->where('s_date_of_sale','=',$startdate);
        }
        else{
            $sbills = Sbill::all()
                        ->where('sbill_type','credit')
                        ->where('status','clear')
                        ->where('s_date_of_sale','>=',$startdate)
                        ->where('s_date_of_sale','<=',$enddate);
        }

        foreach($sbills as $sbill){
            $credit_clear_bill_no++;
            $credit_clear_total = $sbill->s_fin_total_amount +  $cash_total;
            $credit_clear_profit = $sbill->profit_amount +  $cash_profit;
        }

        //credit due
        $credit_due_bill_no = 0;
        $credit_due_total = 0;
        $credit_due_profit = 0;

        if(is_null($enddate)){
            $sbills = Sbill::all()
                        ->where('sbill_type','credit')
                        ->where('status','due')
                        ->where('s_date_of_sale','=',$startdate);
        }
        else{
            $sbills = Sbill::all()
                        ->where('sbill_type','credit')
                        ->where('status','due')
                        ->where('s_date_of_sale','>=',$startdate)
                        ->where('s_date_of_sale','<=',$enddate);
        }

        foreach($sbills as $sbill){
            $credit_due_bill_no++;
            $credit_due_total = $sbill->s_fin_total_amount +  $cash_total;
            $credit_due_profit = $sbill->profit_amount +  $cash_profit;
        }

        //half paid clear
        $hp_clear_bill_no = 0;
        $hp_clear_total = 0;
        $hp_clear_profit = 0;

        if(is_null($enddate)){
            $sbills = Sbill::all()
                        ->where('sbill_type','halfpaid')
                        ->where('status','clear')
                        ->where('s_date_of_sale','=',$startdate);
        }
        else{
            $sbills = Sbill::all()
                        ->where('sbill_type','halfpaid')
                        ->where('status','clear')
                        ->where('s_date_of_sale','>=',$startdate)
                        ->where('s_date_of_sale','<=',$enddate);
        }
        foreach($sbills as $sbill){
            $hp_clear_bill_no++;
            $hp_clear_total = $sbill->s_fin_total_amount +  $cash_total;
            $hp_clear_profit = $sbill->profit_amount +  $cash_profit;
        }

        //halfpaid due
        $hp_due_bill_no = 0;
        $hp_due_total = 0;
        $hp_due_profit = 0;
        if(is_null($enddate)){
            $sbills = Sbill::all()
                        ->where('sbill_type','halfpaid')
                        ->where('status','due')
                        ->where('s_date_of_sale','=',$startdate);
        }
        else{
            $sbills = Sbill::all()
                        ->where('sbill_type','halfpaid')
                        ->where('status','due')
                        ->where('s_date_of_sale','>=',$startdate)
                        ->where('s_date_of_sale','<=',$enddate);
        }
        foreach($sbills as $sbill){
            $hp_due_bill_no++;
            $hp_due_total = $sbill->s_fin_total_amount +  $cash_total;
            $hp_due_profit = $sbill->profit_amount +  $cash_profit;
        }

        // SR bill 
        //halfpaid due
        $sr_bill_no = 0;
        $sr_total = 0;
        if(is_null($enddate)){
            $srbills = SRbill::all()
                        ->where('sr_date_of_ret','=',$startdate);
        }
        else{
            $srbills = Srbill::all()
                        ->where('sr_date_of_ret','>=',$startdate)
                        ->where('sr_date_of_ret','<=',$enddate);
        }
        foreach($srbills as $srbill){
            $sr_bill_no++;
            $sr_total = $srbill->sr_total_amount +  $sr_total;
        }

        $sum_array = array(
            'cash_bill_no' => $cash_bill_no,
            'cash_total'=>$cash_total,
            'cash_profit' =>$cash_profit,
            'credit_clear_bill_no'=>$credit_clear_bill_no,
            'credit_clear_total'=> $credit_clear_total,
            'credit_clear_profit' =>$credit_clear_profit,
            'credit_due_bill_no'=>$credit_due_bill_no,
            'credit_due_total'=> $credit_due_total,
            'credit_due_profit' =>$credit_due_profit,
            'hp_clear_bill_no' =>$hp_clear_bill_no,
            'hp_clear_total' =>$hp_clear_total,
            'hp_clear_profit'  =>$hp_clear_profit,
            'hp_due_bill_no' =>$hp_due_bill_no,
            'hp_due_total' =>$hp_due_total,
            'hp_due_profit'  =>$hp_due_profit,
            'sr_bill_no'=>$sr_bill_no,
            'sr_total'=>$sr_total,

            'total_sales'=>$cash_total + $credit_clear_total + $credit_due_total + 
                            $hp_clear_total+ $hp_due_total-$sr_total,
            'total_profit'=>$cash_profit + $credit_clear_profit + $credit_due_profit + 
                            $hp_clear_profit + $hp_due_profit
        );
        
       return $sum_array;
    }
}
