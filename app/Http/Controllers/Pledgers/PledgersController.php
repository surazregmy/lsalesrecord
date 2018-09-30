<?php

namespace App\Http\Controllers\Pledgers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Debtor\Debtor;
use App\Pbill\Pbill;
use App\Prbill\Prbill;
use App\Preceipt\Preceipt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;


class PledgersController extends Controller
{
    public function prepareLedgerforDebtor($id){
       $debtor = Debtor::find($id);
       $pbills = $debtor->pbill;
       $prbills = $debtor->prbill;
       $preceipts = $debtor->preceipt;
       // Temp table not good 
    //    Schema::dropIfExists('pledgers');
    //    Schema::create('pledgers', function (Blueprint $table) {
    //     $table->string('Particulars');
    //     $table->integer('bill_id');
    //     $table->float('debit_rs');
    //     $table->float('credit_rs');
    //     $table->date('date_of_transaction');
    //      });
    //      DB::insert('insert into `pledgers` select pbill_original_id,pbill_id,0,p_total_amount,
    //      p_date_of_purchase FROM pbills WHERE debtor_id = ?', [$id]);
    //      DB::insert('insert into `pledgers` select prbill_original_id,prbill_id,pr_total_amount,0,
    //      pr_date_of_purchase FROM prbills WHERE debtor_id = ?', [$id]);
    //      DB::insert('insert into `pledgers` select p_rec_no,p_rec_id,0,p_rec_amount,
    //      p_rec_date_of_pay FROM preceipts WHERE debtor_id = ?', [$id]);
       $data = array(
           'pbills'=>$pbills,
           'prbills'=>$prbills,
           'preceipts'=>$preceipts,
       );
       return view('Pledger.pledger')->with($data);
    }
}
