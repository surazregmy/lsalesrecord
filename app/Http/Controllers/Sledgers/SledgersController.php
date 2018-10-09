<?php

namespace App\Http\Controllers\Sledgers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Creditor\Creditor;



class SledgersController extends Controller
{
    public function prepareLedgerforCreditor($id){
        $creditor = Creditor::find($id);
        $sbills = $creditor->sbill;
        $srbills = $creditor->srbill;
        $sreceipts = $creditor->sreceipt;

        $data = array(
            'sbills'=>$sbills,
            'srbills'=>$srbills,
            'sreceipts'=>$sreceipts,
        );
        return view('Sledger.sledger')->with($data);
    }
}
