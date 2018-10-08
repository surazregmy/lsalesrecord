<?php

namespace App\Http\Controllers\Srbills;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Creditor\Creditor;
use App\Item\Item;

use App\Helper\NepaliCalender;
use App\Helper\Conversion;
use App\Services\NepaliDateFormat;
use Carbon\carbon;
use App\Srbill\Srbill;
use App\SrbillItem\SrbillItem;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Validation\Rule;

class SrbillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $srbills = Srbill :: orderBy('srbill_id','desc')->get();
        $data = array(
            'heading' => 'Srbills',
            'subheading' => 'Srbills List',
            'srbills'=>$srbills ,
            'brname'=>'listPbills' 
        );
        return view('srbill.list')->with($data);
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
            'heading' => 'Sales Return bills',
            'subheading' => 'Pbills List',
            'items'=>$items,
            'creditors' => $creditors,
            'log_user' => $log_user,
            'brname'=>'addPbills' 
        );
        return view('srbill.add')->with($data);
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
            'discount1'=>'required|numeric',
            'total1'=>'required|numeric',
            'c_id'=>'required',
            'srbill_original_id'=> 'required',
            'date_of_sale'=>'required',
            'entered_by'=>'required',
            'tot_amt'=>'required',
            'srbill_generated_id'=>'unique' // only for generating and appending
        ]); 
        $date_of_sale_n= $request->input('date_of_sale');
        $finanacialyear =  NepaliDateFormat :: returnFinacialYear($date_of_sale_n);
        $gen_sbill_id = str_pad($request->input('srbill_original_id'),5,'0',STR_PAD_LEFT);
        $request['srbill_generated_id'] = $finanacialyear.'-'.$gen_sbill_id;
    

        $messages = [
            'srbill_generated_id.unique' => 'SRBill No repeated in Sbill',
        ];
        $c_id = $request->input('c_id');
        $sbill_original_id = $request->input('srbill_original_id');
        $validator =  Validator::make($request->all(), [
            'srbill_generated_id' =>  // Look at the query/ Don;t know it requires the field from request
            Rule::unique('sbills','sbill_generated_id'),
            ],
            $messages
            );
        if ($validator->fails()) {
            return redirect('srbills/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $messages = [
            'srbill_generated_id.unique' => 'SRBill No repeated in SR bill',
        ];
        $c_id = $request->input('c_id');
        $sbill_original_id = $request->input('srbill_original_id');
        $validator =  Validator::make($request->all(), [
            'srbill_generated_id' =>  // Look at the query/ Don;t know it requires the field from request
            Rule::unique('srbills'),
            ],
            $messages
            );
        if ($validator->fails()) {
            return redirect('srbills/create')
                        ->withErrors($validator)
                        ->withInput();
        }
        $addSrbillsave = Srbill::addSrbill($request);
        
        if(!is_null($request->input('save'))){
            if($addSrbillsave['srbill_add_status']== 0)
                return redirect('/srbills/create')->with('error','Error in Creating Srbil')->withInput();  
            elseif($addSrbillsave['srbill_add_status'] == 1)
                return redirect('/srbills/'.$addSrbillsave["inserted_id"].'/edit')->with('success','Srbill created successfully');  
        }elseif(!is_null($request->input('save_and_exit'))){
            if($addSrbillsave['srbill_add_status']== 0)
                return redirect('/srbills/create')->withErrors('Error in Creating Srbill')->withInput();  
            elseif($addSrbillsave['srbill_add_status'] == 1)
                return redirect('/srbills')->with('success','Srbill created successfully');  
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
        //
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
        $srbill = Srbill::find($id);
        $data = array(
            'heading'=>'Sbills',
            'subheading'=>'Sbills Edit',
            'srbill' => $srbill,
            'items'=>$items,
            'creditors' => $creditors,
            'log_user' => $log_user,
            'brname'=>'editPbills' 
        );
        return view('srbill.edit')->with($data);
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
        $srbill = Srbill::find($id);
        $this->validate($request,[
            'item1'=>'required|numeric',
            'quantity1'=>'required|numeric',
            'rate1'=>'required|numeric',
            'discount1'=>'required|numeric',
            'total1'=>'required|numeric',
            'c_id'=>'required',
            'srbill_original_id'=> 'required',
            'date_of_sale'=>'required',
            'entered_by'=>'required',
            'tot_amt'=>'required',
            'srbill_generated_id'=>'unique' // only for generating and appending
        ]); 
        $date_of_sale_n= $request->input('date_of_sale');
        $finanacialyear =  NepaliDateFormat :: returnFinacialYear($date_of_sale_n);
        $gen_sbill_id = str_pad($request->input('srbill_original_id'),5,'0',STR_PAD_LEFT);
        $request['srbill_generated_id'] = $finanacialyear.'-'.$gen_sbill_id;
    
        $srbill_old_id = $srbill->srbill_generated_id;
        $messages = [
            'srbill_generated_id.unique' => 'SRBill No repeated in Sbill',
        ];
        $c_id = $request->input('c_id');
        $srbill_original_id = $request->input('srbill_original_id');
        $validator =  Validator::make($request->all(), [
            'srbill_generated_id' =>  // Look at the query/ Don;t know it requires the field from request
            Rule::unique('sbills','sbill_generated_id')
            ->ignore($srbill_old_id,'sbill_generated_id'),
            ],
            $messages
            );
        if ($validator->fails()) {
            return redirect('srbills/'.$id.'/edit')
                        ->withErrors($validator)
                        ->withInput();
        }

        $messages = [
            'srbill_generated_id.unique' => 'SRBill No repeated in SR bill',
        ];
        $c_id = $request->input('c_id');
        $sbill_original_id = $request->input('srbill_original_id');
        $validator =  Validator::make($request->all(), [
            'srbill_generated_id' =>  // Look at the query/ Don;t know it requires the field from request
            Rule::unique('srbills')
            ->ignore($srbill_old_id,'srbill_generated_id'),            
            ],
            $messages
            );
        if ($validator->fails()) {
            return redirect('srbills/'.$id.'/edit')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $srbill_update = Srbill::updateSrbill($request, $id);
        if(!is_null($request->input('save'))){
            if($srbill_update['srbill_update_status']== 0)
                return redirect('/srbills/'.$sbrill_update["updated_id"].'/edit')->with('error','Error in Updating SrBill')->withInput();  
            elseif($srbill_update['srbill_update_status'] == 1)
                return redirect('/srbills/'.$srbill_update["updated_id"].'/edit')->with('success','Srbill updated successfully');  
        }elseif(!is_null($request->input('save_and_exit'))){
            if($srbill_update['srbill_update_status']== 0)
                return redirect('/srbills/'.$srbill_update["updated_id"].'/edit')->withErrors('Error in updating Srbill')->withInput();  
            elseif($srbill_update['srbill_update_status'] == 1)
                return redirect('/srbills')->with('success','Srbill  updated successfully');  
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
            $srbill = Srbill::find($id);
            SrbillItem :: where('srbill_id',$id)->delete();
            $srbill->delete();
        });
        return redirect('/srbills')->with('success','Srbill Deleted');
    }
}
