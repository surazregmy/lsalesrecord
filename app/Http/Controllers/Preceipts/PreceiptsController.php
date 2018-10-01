<?php

namespace App\Http\Controllers\Preceipts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Preceipt\Preceipt;
use App\Debtor\Debtor;
use Auth;
use App\Helper\NepaliCalender;
use App\Helper\Conversion;
use App\Services\NepaliDateFormat;
use Validator;
use Illuminate\Validation\Rule;

class PreceiptsController extends Controller
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
        $preceipts = Preceipt:: all();
        $data = array(
            'heading' => 'Purchse Receipts',
            'subheading' => 'Purchase Receipts List',
            'preceipts' => $preceipts,
            'brname' => 'listPreceipts'
        );
        return view('preceipt.list')->with($data);
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
        $data = array(
            'heading' => 'Purchse Receipts',
            'subheading' => 'Purchase Receipts Add',
            'debtors'=>$debtors,
            'log_user' => $log_user ,
            'brname' => 'addPreceipts'            
        );
        return view('preceipt.add')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $log_user = Auth:: user();
        $this->validate($request,[
            'p_rec_no'=>'required',
            'd_id'=>'required',
            'p_rec_date'=>'required',
            'p_rec_amount'=>'required',
            'p_rec_gen_no'=>'unique'
        ]);

        $p_rec_date_of_pay_n= $request->input('p_rec_date');
        $finanacialyear =  NepaliDateFormat :: returnFinacialYear($p_rec_date_of_pay_n);
        $gen_p_rec_no = str_pad($request->input('p_rec_no'),5,'0',STR_PAD_LEFT);
        $request['p_rec_gen_no'] = $finanacialyear.'-'.$gen_p_rec_no;

        $messages = [
            'p_rec_gen_no.unique' => 'Receipt No repeated',
        ];
        $d_id = $request->input('d_id');
        $preceipt_id = $request->input('p_rec_no');
        $validator =  Validator::make($request->all(), [
                'p_rec_gen_no' =>  // Look at the query/ Don;t know it requires the field from request
                 Rule::unique('preceipts')->where(function($query) use ($d_id, $preceipt_id){
                        return $query->where('debtor_id',$d_id);
                 }),
            ],
            $messages
            );
        if ($validator->fails()) {
            return redirect('preceipts/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $p_rec_date_of_pay_n = $request->input('p_rec_date');
        $p_rec_date_of_pay =  NepaliDateFormat :: returnCarbonDate($p_rec_date_of_pay_n);
        $preceipt = new Preceipt;
        $preceipt->p_rec_no = $request->input('p_rec_no');
        $preceipt->p_rec_gen_no = $request->input('p_rec_gen_no');
        $preceipt->debtor_id = $request->input('d_id');
        $preceipt->p_rec_date_of_pay = $p_rec_date_of_pay;
        $preceipt->p_rec_date_of_pay_n = $p_rec_date_of_pay_n;
        $preceipt->p_rec_amount = $request->input('p_rec_amount');
        $preceipt->p_rec_entered_by = $log_user->name;
        $preceipt->save();
        return redirect('/preceipts')->with('success','Purchase Receipt created Succesfully'); 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $preceipt = Preceipt::find($id);
        $data = array(
            'heading' => 'Purchse Receipt',
            'subheading' => 'Purchase Receipts Show',
            'preceipt' => $preceipt,
            'brname' => 'showPreceipts'            
        );
        return view('preceipt.show')->with($data);
       
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
        $preceipt = Preceipt::find($id);
        $debtors = Debtor :: all();
        $data = array(
            'heading' => 'Purchse Receipts',
            'subheading' => 'Purchase Receipts Edit',
            'debtors'=>$debtors, 
            'log_user'=>$log_user,
            'preceipt'=>$preceipt,
            'brname' => 'editPreceipts'            
        );
        return view('preceipt.edit')->with($data);

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

        $log_user = Auth:: user();
        $this->validate($request,[
            'p_rec_no'=>'required',
            'd_id'=>'required',
            'p_rec_date'=>'required',
            'p_rec_amount'=>'required',
            'p_rec_gen_no'=>'unique'
        ]);

        $p_rec_date_of_pay_n= $request->input('p_rec_date');
        $finanacialyear =  NepaliDateFormat :: returnFinacialYear($p_rec_date_of_pay_n);
        $gen_p_rec_no = str_pad($request->input('p_rec_no'),5,'0',STR_PAD_LEFT);
        $request['p_rec_gen_no'] = $finanacialyear.'-'.$gen_p_rec_no;
        
        $messages = [
            'p_rec_gen_no.unique' => 'Receipt No repeated',
        ];
        $d_id = $request->input('d_id');
        $preceipt_id = $request->input('p_rec_no');
        $preceipt_old_id = $request->input('p_rec_old_id');
        $validator =  Validator::make($request->all(), [
                'p_rec_gen_no' =>  // Look at the query/ Don;t know it requires the field from request
                 Rule::unique('preceipts')->ignore($preceipt_old_id,'p_rec_gen_no')
                 ->where(function($query) use ($d_id, $preceipt_id){
                        return $query->where('debtor_id',$d_id);
                 }),
            ],
            $messages
            );
        if ($validator->fails()) {
            return redirect('preceipts/'.$id.'/edit')
                        ->withErrors($validator)
                        ->withInput();
        }

        $log_user = Auth:: user();
        $p_rec_date_of_pay_n = $request->input('p_rec_date');
        $p_rec_date_of_pay =  NepaliDateFormat :: returnCarbonDate($p_rec_date_of_pay_n);
        $preceipt = Preceipt:: find($id);
        $preceipt->p_rec_no = $request->input('p_rec_no');
        $preceipt->p_rec_gen_no = $request->input('p_rec_gen_no');
        $preceipt->debtor_id = $request->input('d_id');
        $preceipt->p_rec_date_of_pay = $p_rec_date_of_pay;
        $preceipt->p_rec_date_of_pay_n = $p_rec_date_of_pay_n;
        $preceipt->p_rec_amount = $request->input('p_rec_amount');
        $preceipt->p_rec_entered_by = $log_user->name;
        $preceipt->save();
        return redirect('/preceipts')->with('success','Purchase Receipt Updated Succesfully'); 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $preceipt  = Preceipt::find($id);
        $preceipt->delete();
        return redirect('/preceipts')->with('success',"Pbill deleted successful");
    }
    public function getPreceiptsOfDebtor($debtor_id){
        $debtor = Debtor::find($debtor_id);
        $preceipts = $debtor->preceipt;
        $data = array(
                'preceipts' => $preceipts
        );
        return view('preceipt.receipts')->with($data);
    }
}
