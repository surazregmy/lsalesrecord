<?php

namespace App\Http\Controllers\Prbills;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item\Item;
use App\Debtor\Debtor;
use App\Helper\NepaliCalender;
use App\Helper\Conversion;
use App\Services\NepaliDateFormat;
use Carbon\carbon;
use App\Prbill\Prbill;
use App\PrbillItem\PrbillItem;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Validation\Rule;

class PrbillsController extends Controller
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
        $prbills = Prbill :: all();
        $data = array(
            'heading' => 'PRbills',
            'subheading' => 'Purchase Return bills List',
            'prbills'=>$prbills   
        );
        return view('prbill.list')->with($data);
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
            'heading' => 'PRbills',
            'subheading' => 'Purchase Return bills List',
            'items'=>$items,
            'debtors' => $debtors,
            'log_user' => $log_user
        );
        return view('prbill.add')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request,[
            'item1'=>'required|numeric',
            'quantity1'=>'required|numeric',
            'rate1'=>'required|numeric',
            'total1'=>'required|numeric',
            'total_amount'=>'required|numeric',
            'd_id'=>'required',
            'prbill_original_id'=> 'required',
            'date_of_purchase'=>'required',
            'entered_by'=>'required',
            'prbill_generated_id'=>'unique'
        ]); 
        $date_of_purchase_n= $request->input('date_of_purchase');
        $finanacialyear =  NepaliDateFormat :: returnFinacialYear($date_of_purchase_n);
        $gen_pbill_id = str_pad($request->input('prbill_original_id'),5,'0',STR_PAD_LEFT);
        $request['prbill_generated_id'] = $finanacialyear.'-'.$gen_pbill_id;

        $messages = [
            'prbill_generated_id.unique' => 'Bill No repeated',
        ];
        $d_id = $request->input('d_id');
        $prbill_original_id = $request->input('prbill_original_id');
        $validator =  Validator::make($request->all(), [
                'prbill_generated_id' =>  // Look at the query/ Don;t know it requires the field from request
                 Rule::unique('prbills')->where(function($query) use ($d_id, $prbill_original_id){
                        return $query->where('debtor_id',$d_id);
                 }),
            ],
            $messages
            );
        if ($validator->fails()) {
            return redirect('prbills/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $addPrbillsave = Prbill::addPrbill($request);
        // return $addPbillsave;
        if(!is_null($request->input('save'))){
            if($addPrbillsave['prbill_add_status']== 0)
                return redirect('/prbills/create')->with('error','Error in Creating PBill')
                ->withInput();  
            elseif($addPrbillsave['prbill_add_status'] == 1)
                return redirect('/prbills/'.$addPrbillsave["inserted_id"].'/edit')->with('success','Pbill created successfully');  
        }elseif(!is_null($request->input('save_and_exit'))){
            if($addPrbillsave['prbill_add_status']== 0)
                return redirect('/prbills/create')->with('error','Error in Creating PBill');  
            elseif($addPrbillsave['prbill_add_status'] == 1)
                return redirect('/prbills')->with('success','Pbill created successfully');  
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
        $prbill = Prbill::find($id);
        $data = array(
            'heading'=>'PRbills',
            'subheading'=>'Purchase Returns bills Show',
            'prbill' => $prbill
        );
        return view('prbill.show')->with($data);
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
        $prbill = Prbill::find($id);
        $data = array(
            'heading'=>'PRbills',
            'subheading'=>'Purchase Return bills Edit',
            'prbill' => $prbill,
            'items'=>$items,
            'debtors' => $debtors,
            'log_user' => $log_user
        );
        return view('prbill.edit')->with($data);
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
            'prbill_original_id'=> 'required',
            'date_of_purchase'=>'required',
            'entered_by'=>'required',
            'prbill_generated_id' =>'unique'
        ]); 

        $date_of_purchase_n= $request->input('date_of_purchase');
        $finanacialyear =  NepaliDateFormat :: returnFinacialYear($date_of_purchase_n);
        $gen_pbill_id = str_pad($request->input('prbill_original_id'),5,'0',STR_PAD_LEFT);
        $request['prbill_generated_id'] = $finanacialyear.'-'.$gen_pbill_id;
        
        $messages = [
            'prbill_generated_id.unique' => 'Bill No repeated',
        ];
        $d_id = $request->input('d_id');
        $prbill_original_id = $request->input('prbill_original_id');
        $prbill_old_id = $request->input('prbill_old_id');
        $validator =  Validator::make($request->all(), [
                'prbill_generated_id' =>  // Look at the query/ Don;t know it requires the field from request
                 Rule::unique('prbills')->ignore($prbill_old_id,'prbill_generated_id')
                 ->where(function($query) use ($d_id, $prbill_original_id){
                        return $query->where('debtor_id',$d_id);
                 }),
            ],
            $messages
            );
        if ($validator->fails()) {
            return redirect('prbills/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        if(!is_null($request->input('update'))){
            $prbill_update = Prbill::updatePrbill($request, $id);
            if($prbill_update['prbill_update_status'] == 0)
                return redirect('/prbills/'.$prbill_update["updated_id"].'/edit')
                ->with('error','Pbill Updated Unsuccessful');
            elseif($prbill_update['prbill_update_status'] == 1)
                return redirect('/prbills/'.$prbill_update["updated_id"].'/edit')
                ->with('success','Pbill Updated successfully');  
             
        }elseif(!is_null($request->input('update_and_exit'))){
            $prbill_update = Prbill::updatePrbill($request, $id);
            if($prbill_update['prbill_update_status'] == 0)
                return redirect('/prbills/'.$prbill_update["updated_id"].'/edit')->with('error','Pbill Updated Unsuccessful');  
            elseif($prbill_update['prbill_update_status'] == 1)
                return redirect('/prbills')->with('success','Pbill Updated successfully');  
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
            $prbill = Prbill::find($id);
            PrbillItem :: where('prbill_id',$id)->delete();
            $prbill->delete();
        });
        return redirect('/prbills')->with('success','Prbill Deleted');
    }

    public function printprbill($id)
    {
        $prbill = Prbill::find($id);
        $data = array(
            'heading'=>'PRbills',
            'subheading'=>'Purchase Returs bills Show',
            'prbill' => $prbill
        );
        return view('prbill.print')->with($data); 
    }
    public function getPrbillsOfDebtor($debtor_id){
        $debtor = Debtor::find($debtor_id);
        $prbills = $debtor->prbill;
        $data = array(
                'prbills' => $prbills
        );
        return view('prbill.invoices')->with($data);
    }
}
