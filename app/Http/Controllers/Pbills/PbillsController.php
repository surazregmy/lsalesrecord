<?php

namespace App\Http\Controllers\Pbills;


use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item\Item;
use App\Debtor\Debtor;
use App\Helper\NepaliCalender;
use App\Helper\Conversion;
use App\Services\NepaliDateFormat;
use Carbon\carbon;
use App\Pbill\Pbill;
use App\PbillItem\PbillItem;
use Illuminate\Support\Facades\DB;


class PbillsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pbills = Pbill :: all();
        $data = array(
            'heading' => 'Pbills',
            'subheading' => 'Pbills List',
            'pbills'=>$pbills   
        );
        return view('pbill.list')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $log_user = Auth:: user();
        $debtors = Debtor :: all();
        $items = Item :: all();  // fetches all the data        
        $data = array(
            'heading' => 'Pbills',
            'subheading' => 'Pbills List',
            'items'=>$items,
            'debtors' => $debtors,
            'log_user' => $log_user
        );
        return view('pbill.add')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // echo '<pre>';
        // print_r($_POST);
        // die;

        $this->validate($request,[
            'item1'=>'required|numeric',
            'quantity1'=>'required|numeric',
            'rate1'=>'required|numeric',
            'total1'=>'required|numeric',
            'total_amount'=>'required|numeric',
            'd_id'=>'required',
            'bill_no'=> 'required',
            'date_of_purchase'=>'required',
            'entered_by'=>'required'
        ]); 
        $addPbillsave = Pbill::addPbill($request);
        // return $addPbillsave;
        if(!is_null($request->input('save'))){
            if($addPbillsave['pbill_add_status']== 0)
                return redirect('/pbills/create')->with('error','Error in Creating PBill');  
            elseif($addPbillsave['pbill_add_status'] == 1)
                return redirect('/pbills/'.$addPbillsave["inserted_id"].'/edit')->with('success','Pbill created successfully');  
        }elseif(!is_null($request->input('save_and_exit'))){
            if($addPbillsave['pbill_add_status']== 0)
                return redirect('/pbills/create')->with('error','Error in Creating PBill');  
            elseif($addPbillsave['pbill_add_status'] == 1)
                return redirect('/pbills')->with('success','Pbill created successfully');  
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pbill = Pbill::find($id);
        $data = array(
            'heading'=>'Pbills',
            'subheading'=>'Pbills Show',
            'pbill' => $pbill
        );
        return view('pbill.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $log_user = Auth:: user();
        $debtors = Debtor :: all();
        $items = Item :: all();  // fetches all the data   
        $pbill = Pbill::find($id);
        $data = array(
            'heading'=>'Pbills',
            'subheading'=>'Pbills Edit',
            'pbill' => $pbill,
            'items'=>$items,
            'debtors' => $debtors,
            'log_user' => $log_user
        );
        return view('pbill.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'item1'=>'required|numeric',
            'quantity1'=>'required|numeric',
            'rate1'=>'required|numeric',
            'total1'=>'required|numeric',
            'total_amount'=>'required|numeric',
            'd_id'=>'required',
            'bill_no'=> 'required',
            'date_of_purchase'=>'required',
            'entered_by'=>'required'
        ]); 
        
        if(!is_null($request->input('update'))){
            $pbill_update = Pbill::updatePbill($request, $id);
            if($pbill_update['pbill_update_status'] == 0)
                return redirect('/pbills/'.$pbill_update["updated_id"].'/edit')->with('error','Pbill Updated Unsuccessful');  
            elseif($pbill_update['pbill_update_status'] == 1)
                return redirect('/pbills/'.$pbill_update["updated_id"].'/edit')->with('success','Pbill Updated successfully');  
             
        }elseif(!is_null($request->input('update_and_exit'))){
            $pbill_update = Pbill::updatePbill($request, $id);
            if($pbill_update['pbill_update_status'] == 0)
                return redirect('/pbills/'.$pbill_update["updated_id"].'/edit')->with('error','Pbill Updated Unsuccessful');  
            elseif($pbill_update['pbill_update_status'] == 1)
                return redirect('/pbills')->with('success','Pbill Updated successfully');  
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::transaction(function () use ($id) {
            $pbill = Pbill::find($id);
            PbillItem :: where('pbill_id',$id)->delete();
            $pbill->delete();
        });
        return redirect('/pbills')->with('success','Pbill Deleted');
    }

    public function printpbill($id)
    {
        $pbill = Pbill::find($id);
        $data = array(
            'heading'=>'Pbills',
            'subheading'=>'Pbills Show',
            'pbill' => $pbill
        );
        return view('pbill.print')->with($data); 
    }
}
