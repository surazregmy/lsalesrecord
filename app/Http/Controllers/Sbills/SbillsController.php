<?php

namespace App\Http\Controllers\Sbills;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item\Item;
use App\Creditor\Creditor;
use App\Helper\NepaliCalender;
use App\Helper\Conversion;
use App\Services\NepaliDateFormat;
use Carbon\carbon;
use App\Sbill\Sbill;
use App\SbillItem\SbillItem;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Validation\Rule;

class SbillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $sbills = Sbill :: orderBy('sbill_id','desc')->get();
        $data = array(
            'heading' => 'Sbills',
            'subheading' => 'Sbills List',
            'sbills'=>$sbills ,
            'brname'=>'listPbills' 
        );
        return view('sbill.list')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $log_user = Auth::user();
        $items = Item :: all();  // fetches all the data    
        $creditors = Creditor::all();    
        $data = array(
            'heading' => 'Sbills',
            'subheading' => 'Sbills List',
            'items'=>$items,
            'creditors'=>$creditors,
            'log_user'=>$log_user,
            'brname'=>'addPbills'
        );
        return view('sbill.add')->with($data);
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
            'c_id'=>'required',
            'sbill_original_id'=> 'required',
            'sbill_type'=>'required',
            'date_of_sale'=>'required',
            'entered_by'=>'required',
            'sub_total'=>'required',
            'tot_amt'=>'required',
            'sbill_generated_id'=>'unique' // only for generating and appending
        ]); 

        $date_of_sale_n= $request->input('date_of_sale');
        $finanacialyear =  NepaliDateFormat :: returnFinacialYear($date_of_sale_n);
        $gen_sbill_id = str_pad($request->input('sbill_original_id'),5,'0',STR_PAD_LEFT);
        $request['sbill_generated_id'] = $finanacialyear.'-'.$gen_sbill_id;

        $messages = [
            'sbill_generated_id.unique' => 'SBill No repeated',
        ];
        $c_id = $request->input('c_id');
        $sbill_original_id = $request->input('sbill_original_id');
        $validator =  Validator::make($request->all(), [
                'sbill_generated_id' =>  // Look at the query/ Don;t know it requires the field from request
                 Rule::unique('sbills')->where(function($query) use ($c_id, $sbill_original_id){
                        return $query->where('creditor_id',$c_id);
                 }),
            ],
            $messages
            );
        if ($validator->fails()) {
            return redirect('sbills/create')
                        ->withErrors($validator)
                        ->withInput();
        }
        $addSbillsave = Sbill::addSbill($request);
        if(!is_null($request->input('save'))){
            if($addSbillsave['sbill_add_status']== 0)
                return redirect('/sbills/create')->with('error','Error in Creating PBill')->withInput();  
            elseif($addSbillsave['sbill_add_status'] == 1)
                return redirect('/sbills/'.$addSbillsave["inserted_id"].'/edit')->with('success','Pbill created successfully');  
        }elseif(!is_null($request->input('save_and_exit'))){
            if($addSbillsave['sbill_add_status']== 0)
                return redirect('/sbills/create')->withErrors('Error in Creating PBill')->withInput();  
            elseif($addSbillsave['sbill_add_status'] == 1)
                return redirect('/sbills')->with('success','Pbill created successfully');  
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
        $sbill = Sbill::find($id);
        $data = array(
            'heading'=>'Sbills',
            'subheading'=>'Sbills Show',
            'sbill' => $sbill,
            'brname'=>'showPbills' 
        );
        return view('sbill.show')->with($data);
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
        $creditors = Creditor :: all();
        $items = Item :: all();  // fetches all the data   
        $sbill = Sbill::find($id);
        $data = array(
            'heading'=>'Sbills',
            'subheading'=>'Sbills Edit',
            'sbill' => $sbill,
            'items'=>$items,
            'creditors' => $creditors,
            'log_user' => $log_user,
            'brname'=>'editPbills' 
        );
        return view('sbill.edit')->with($data);
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
        $sbill = Sbill::find($id);
        $this->validate($request,[
            'item1'=>'required|numeric',
            'quantity1'=>'required|numeric',
            'rate1'=>'required|numeric',
            'total1'=>'required|numeric',
            'c_id'=>'required',
            'sbill_original_id'=> 'required',
            'sbill_type'=>'required',
            'date_of_sale'=>'required',
            'entered_by'=>'required',
            'sub_total'=>'required',
            'tot_amt'=>'required',
            'sbill_generated_id'=>'unique' // only for generating and appending
        ]); 
        $date_of_sale_n= $request->input('date_of_sale');
        $finanacialyear =  NepaliDateFormat :: returnFinacialYear($date_of_sale_n);
        $gen_sbill_id = str_pad($request->input('sbill_original_id'),5,'0',STR_PAD_LEFT);
        $request['sbill_generated_id'] = $finanacialyear.'-'.$gen_sbill_id;

        $messages = [
            'sbill_generated_id.unique' => 'SBill No repeated',
        ];
        $c_id = $request->input('c_id');
        $sbill_original_id = $request->input('sbill_original_id');
        $sbill_old_id = $sbill->sbill_generated_id;

        $validator =  Validator::make($request->all(), [
                'sbill_generated_id' =>  // Look at the query/ Don;t know it requires the field from request
                 Rule::unique('sbills')->ignore($sbill_old_id,'sbill_generated_id')
                 ->where(function($query) use ($c_id, $sbill_original_id){
                        return $query->where('creditor_id',$c_id);
                 }),
            ],
            $messages
            );
        if ($validator->fails()) {
            return redirect('sbills/'.$id.'/edit')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $sbill_update = Sbill::updateSbill($request, $id);
        if(!is_null($request->input('save'))){
            if($sbill_update['sbill_update_status']== 0)
                return redirect('/sbills/'.$sbill_update["updated_id"].'/edit')->with('error','Error in Updating SBill')->withInput();  
            elseif($sbill_update['sbill_update_status'] == 1)
                return redirect('/sbills/'.$sbill_update["updated_id"].'/edit')->with('success','Sbill updated successfully');  
        }elseif(!is_null($request->input('save_and_exit'))){
            if($sbill_update['sbill_update_status']== 0)
                return redirect('/sbills/'.$sbill_update["updated_id"].'/edit')->withErrors('Error in Creating PBill')->withInput();  
            elseif($sbill_update['sbill_update_status'] == 1)
                return redirect('/sbills')->with('success','Pbill created successfully');  
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
            $sbill = Sbill::find($id);
            SbillItem :: where('sbill_id',$id)->delete();
            $sbill->delete();
        });
        return redirect('/sbills')->with('success','Sbill Deleted');
    }
}
