<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sbill\Sbill;
use App\Srbill\Srbill;
use App\Pbill\Pbill;
use App\Prbill\Prbill;
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
        $data = array(
            'heading' => 'Salesrecord',
            'subheading' => 'Dashboard',
            'brname' => 'home',
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

        $sum_day =  $this->genSalesSummary($today_date);
       
       
        $sum_week =  $this->genSalesSummary($week_begin_date,$week_end_date);
        $sum_month =  $this->genSalesSummary($month_begin_date,$month_end_date);
        $sum_year =  $this->genSalesSummary($year_begin_date,$year_end_date);


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
// Not called by index but onload from jquery, Bit of confusing DUDE!!!
    function purchasesSummary(Request $request ){
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

        $sum_day =  $this->genPurchasesSummary($today_date);
       
       
        $sum_week =  $this->genPurchasesSummary($week_begin_date,$week_end_date);
        $sum_month =  $this->genPurchasesSummary($month_begin_date,$month_end_date);
        $sum_year =  $this->genPurchasesSummary($year_begin_date,$year_end_date);


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
        return view('dashboard.purchases')->with($data);

    }
    public function genSalesSummary($startdate, $enddate = NULL){

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

    public function genPurchasesSummary($startdate, $enddate = NULL){

        $purchase_bill_no = 0;
        $purchase_total = 0;
        $purchase_return_bill_no = 0;
        $purchase_return_total = 0;
        $purchase_total_sub = 0;

        if(is_null($enddate)){
            $pbills = Pbill::all()
                        ->where('p_date_of_purchase','=',$startdate);
        }
        else{
            $pbills = Pbill::all()
                        ->where('p_date_of_purchase','>=',$startdate)
                        ->where('p_date_of_purchase','<=',$enddate);
        }
        foreach($pbills as $pbill){
            $purchase_bill_no = $purchase_bill_no + 1;
            $purchase_total = $pbill->p_total_amount +  $purchase_total;
        }

        if(is_null($enddate)){
            $prbills = Prbill::all()
                        ->where('pr_date_of_purchase','=',$startdate);
        }
        else{
            $pbills = Prbill::all()
                        ->where('pr_date_of_purchase','>=',$startdate)
                        ->where('pr_date_of_purchase','<=',$enddate);
        }
        foreach($pbills as $pbill){
            $purchase_return_bill_no = $purchase_return_bill_no + 1;
            $purchase_return_total = $pbill->pr_total_amount +  $purchase_return_total;
        }   

        $sum_array = array(
            'purchase_bill_no' => $purchase_bill_no,
            'purchase_total'=>$purchase_total,
            'purchase_return_bill_no' =>$purchase_return_bill_no,
            'purchase_return_total'=>$purchase_return_total,
            'purchase_total_sub'=> $purchase_total - $purchase_return_total
        );
        
       return $sum_array;
    }

    public function generateCustomDateRangesSalesSummary(Request $request){

        $this->validate($request,[
            'efromDate'=>'required',
        ],[
            'efromDate.required'=>'From Date is Required',
        ]);
        
        $sd = substr($request->input('efromDate'),0,15);
        $ed = substr($request->input('etoDate'),0,15);
        $nepali_date_range = $request->input('nepali_date_range');
        $efromDate  = $request -> input('efromDate');
        $etoDate  = $request -> input('etoDate');

        $start_date = Carbon::parse($sd, 'UTC')->toDateString();
        $end_date = Carbon::parse($ed, 'UTC')->toDateString();

        $sum_custom_dates =  $this->genSalesSummary($start_date,$end_date);
        $data = array(
            'heading' => 'Salesrecord',
            'subheading' => 'Dashboard',
            'brname' => 'home',
            'sum_day' => $sum_custom_dates,
            'nepali_date_range'=>$nepali_date_range,
            'efromDate' => $efromDate,
            'etoDate' => $etoDate,
        );
        return view('sbill.salesreportresult')->with($data);
        
    }

    public function generateCustomDateRangesSalesSummaryDetail($salestype, $star, $end = NULL){
        $sd = substr($star,0,15);
        $startdate = Carbon::parse($sd, 'UTC')->toDateString();
        $enddate;

        if($end != null){
            $ed = substr($end,0,15);
            $enddate = Carbon::parse($ed, 'UTC')->toDateString();
        }
       
        switch($salestype){
            case "CashSales":
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
                $data = array(
                    'heading' => 'Salesrecord',
                    'subheading' => 'Dashboard',
                    'brname' => 'home',
                    'type'=>"Cash Sales",
                   'sbills'=>$sbills,
                );
                return view('sbill.detailsalesreport')->with($data);
                break;
            case "CreditSales":
                //Sales clear
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
                // Sdbills
                if(is_null($enddate)){
                    $sdbills = Sbill::all()
                                ->where('sbill_type','credit')
                                ->where('status','due')
                                ->where('s_date_of_sale','=',$startdate);
                }
                else{
                    $sdbills = Sbill::all()
                                ->where('sbill_type','credit')
                                ->where('status','due')
                                ->where('s_date_of_sale','>=',$startdate)
                                ->where('s_date_of_sale','<=',$enddate);
                }
                $data = array(
                    'heading' => 'Salesrecord',
                    'subheading' => 'Dashboard',
                    'brname' => 'home',
                    'type1'=>"Credit Clear Sales",
                    'type2'=>"Credit Due Sales",
                    'sbills'=>$sbills,
                    'sdbills'=>$sdbills,
                );
                return view('sbill.detailcreditsalesreport')->with($data);
                break;
            case "HalfPaid":
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

                if(is_null($enddate)){
                    $sdbills = Sbill::all()
                                ->where('sbill_type','halfpaid')
                                ->where('status','due')
                                ->where('s_date_of_sale','=',$startdate);
                }
                else{
                    $sdbills = Sbill::all()
                                ->where('sbill_type','halfpaid')
                                ->where('status','due')
                                ->where('s_date_of_sale','>=',$startdate)
                                ->where('s_date_of_sale','<=',$enddate);
                }
                $data = array(
                    'heading' => 'Salesrecord',
                    'subheading' => 'Dashboard',
                    'brname' => 'home',
                    'type1'=>"Half Paid Clear Sales",
                    'type2'=>"Half Paid Due Sales",
                    'sbills'=>$sbills,
                    'sdbills'=>$sdbills,
                );
                return view('sbill.detailcreditsalesreport')->with($data);
                break;
            case "SalesReturn":
                if(is_null($enddate)){
                    $srbills = SRbill::all()
                                ->where('sr_date_of_ret','=',$startdate);
                }
                else{
                    $srbills = Srbill::all()
                                ->where('sr_date_of_ret','>=',$startdate)
                                ->where('sr_date_of_ret','<=',$enddate);
                }
                $data = array(
                    'heading' => 'Salesrecord',
                    'subheading' => 'Dashboard',
                    'brname' => 'home',
                    'type'=>"Sales Return",
                    'srbills'=>$srbills,
                );
                return view('srbill.detailsalesretrunreport')->with($data);
                break;
        }
        
    }

    public function getSalesBill($salestype, $star, $end = NULL){
        $sd = substr($star,0,15);
        $startdate = Carbon::parse($sd, 'UTC')->toDateString();
        $enddate;

        if($end != null){
            $ed = substr($end,0,15);
            $enddate = Carbon::parse($ed, 'UTC')->toDateString();
        }
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

        return $sbills;
    }

    public function generateCustomDateRangesPurchagesSummary(Request $request){
        
    }

    
}
