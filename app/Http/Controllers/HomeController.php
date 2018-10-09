<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sbill\Sbill;

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
        return view('home')->with($data);
    }
}
