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
use Validator;
use Illuminate\Validation\Rule;
use PDF;


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
            'pbills'=>$pbills ,
            'brname'=>'listPbills' 
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
            'log_user' => $log_user,
            'brname'=>'addPbills' 
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
        
        $this->validate($request,[
            'item1'=>'required|numeric',
            'quantity1'=>'required|numeric',
            'rate1'=>'required|numeric',
            'total1'=>'required|numeric',
            'total_amount'=>'required|numeric',
            'd_id'=>'required',
            'pbill_original_id'=> 'required',
            'date_of_purchase'=>'required',
            'entered_by'=>'required',
            'pbill_generated_id'=>'unique'
        ]); 

        $date_of_purchase_n= $request->input('date_of_purchase');
        $finanacialyear =  NepaliDateFormat :: returnFinacialYear($date_of_purchase_n);
        $gen_pbill_id = str_pad($request->input('pbill_original_id'),5,'0',STR_PAD_LEFT);
        $request['pbill_generated_id'] = $finanacialyear.'-'.$gen_pbill_id;

        $messages = [
            'pbill_generated_id.unique' => 'Bill No repeated',
        ];
        $d_id = $request->input('d_id');
        $pbill_original_id = $request->input('pbill_original_id');
        $validator =  Validator::make($request->all(), [
                'pbill_generated_id' =>  // Look at the query/ Don;t know it requires the field from request
                 Rule::unique('pbills')->where(function($query) use ($d_id, $pbill_original_id){
                        return $query->where('debtor_id',$d_id);
                 }),
            ],
            $messages
            );
        if ($validator->fails()) {
            return redirect('pbills/create')
                        ->withErrors($validator)
                        ->withInput();
        }


        $addPbillsave = Pbill::addPbill($request);
        // return $addPbillsave;
        if(!is_null($request->input('save'))){
            if($addPbillsave['pbill_add_status']== 0)
                return redirect('/pbills/create')->with('error','Error in Creating PBill')->withInput();  
            elseif($addPbillsave['pbill_add_status'] == 1)
                return redirect('/pbills/'.$addPbillsave["inserted_id"].'/edit')->with('success','Pbill created successfully');  
        }elseif(!is_null($request->input('save_and_exit'))){
            if($addPbillsave['pbill_add_status']== 0)
                return redirect('/pbills/create')->withErrors('Error in Creating PBill')->withInput();  
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
            'pbill' => $pbill,
            'brname'=>'showPbills' 
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
            'log_user' => $log_user,
            'brname'=>'editPbills' 
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
            'pbill_original_id'=> 'required',
            'date_of_purchase'=>'required',
            'entered_by'=>'required',
            'pbill_generated_id'=>'unique'
        ]); 
        $date_of_purchase_n= $request->input('date_of_purchase');
        $finanacialyear =  NepaliDateFormat :: returnFinacialYear($date_of_purchase_n);
        $gen_pbill_id = str_pad($request->input('pbill_original_id'),5,'0',STR_PAD_LEFT);
        $request['pbill_generated_id'] = $finanacialyear.'-'.$gen_pbill_id;
        
        $messages = [
            'pbill_generated_id.unique' => 'Bill No repeated',
        ];
        $d_id = $request->input('d_id');
        $pbill_generated_id = $request->input('pbill_generated_id');
        $pbill_old_id = $request->input('pbill_old_id');
        $validator =  Validator::make($request->all(), [
                'pbill_generated_id' =>  // Look at the query/ Don;t know it requires the field from request
                 Rule::unique('pbills')->ignore($pbill_old_id,'pbill_generated_id')
                 ->where(function($query) use ($d_id, $pbill_generated_id){
                        return $query->where('debtor_id',$d_id);
                 }),
            ],
            $messages
            );
        if ($validator->fails()) {
            return redirect('pbills/'.$id.'/edit')
                        ->withErrors($validator)
                        ->withInput();
        }

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
            'brname'=>'home',
            'pbill' => $pbill
        );
        return view('pbill.print')->with($data); 
    }
    public function generatePdf($id)
    {
        $pbill = Pbill::find($id);
        $data = array(
            'heading'=>'Pbills',
            'subheading'=>'Pbills Show',
            'brname'=>'home',
            'pbill' => $pbill
        );
        // return view('pbill.generate', $data);

        $pdf = PDF::loadView('pbill.generate', $data);
        set_time_limit(300);
        return $pdf->download('invoice.pdf');

    }

    public function getPbillsOfDebtor($debtor_id){
        $debtor = Debtor::find($debtor_id);
        $pbills = $debtor->pbill;
        $data = array(
                'pbills' => $pbills
        );
        return view('pbill.invoices')->with($data);
    }
}
