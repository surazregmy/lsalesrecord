<?php

namespace App\Http\Controllers\Sreceipts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Sreceipt\Sreceipt;
use App\Creditor\Creditor;
use Auth;
use App\Helper\NepaliCalender;
use App\Helper\Conversion;
use App\Services\NepaliDateFormat;
use Validator;
use Illuminate\Validation\Rule;

class SreceiptsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sreceipts = Sreceipt:: orderBy('s_rec_id','desc')->get();
        $data = array(
            'heading' => 'Sales Receipts',
            'subheading' => 'sales Receipts List',
            'sreceipts' => $sreceipts,
            'brname' => 'listPreceipts'
        );
        return view('sreceipt.list')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $log_user = Auth:: user();
        $creditors = Creditor :: all();
        $data = array(
            'heading' => 'Sales Receipts',
            'subheading' => 'Sales Receipts Add',
            'creditors'=>$creditors,
            'log_user' => $log_user ,
            'brname' => 'addPreceipts'            
        );
        return view('sreceipt.add')->with($data);
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
            's_rec_no'=>'required',
            'c_id'=>'required',
            's_rec_date'=>'required',
            's_rec_amount'=>'required',
            's_rec_gen_no'=>'unique'
        ]);

        $s_rec_date_of_pay_n= $request->input('s_rec_date');
        $finanacialyear =  NepaliDateFormat :: returnFinacialYear($s_rec_date_of_pay_n);
        $gen_s_rec_no = str_pad($request->input('s_rec_no'),5,'0',STR_PAD_LEFT);
        $request['s_rec_gen_no'] = $finanacialyear.'-'.$gen_s_rec_no;

        $messages = [
            's_rec_gen_no.unique' => 'Receipt No repeated',
        ];
        $d_id = $request->input('d_id');
        $preceipt_id = $request->input('p_rec_no');
        $validator =  Validator::make($request->all(), [
                's_rec_gen_no' =>  // Look at the query/ Don;t know it requires the field from request
                 Rule::unique('sreceipts')
            ],
            $messages
            );
        if ($validator->fails()) {
            return redirect('sreceipts/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $s_rec_date_of_pay_n = $request->input('s_rec_date');
        $s_rec_date_of_pay =  NepaliDateFormat :: returnCarbonDate($s_rec_date_of_pay_n);
        $sreceipt = new Sreceipt;
        $sreceipt->s_rec_no = $request->input('s_rec_no');
        $sreceipt->s_rec_gen_no = $request->input('s_rec_gen_no');
        $sreceipt->creditor_id = $request->input('c_id');
        $sreceipt->s_rec_date_of_pay = $s_rec_date_of_pay;
        $sreceipt->s_rec_date_of_pay_n = $s_rec_date_of_pay_n;
        $sreceipt->s_rec_amount = $request->input('s_rec_amount');
        $sreceipt->s_rec_entered_by = $log_user->name;
        $sreceipt->save();
        return redirect('/sreceipts')->with('success','Sales Receipt created Succesfully'); 

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
        $sreceipt = Sreceipt::find($id);
        $creditors = Creditor :: all();
        $data = array(
            'heading' => 'Sales Receipts',
            'subheading' => 'Sales Receipts Edit',
            'creditors'=>$creditors, 
            'log_user'=>$log_user,
            'sreceipt'=>$sreceipt,
            'brname' => 'editPreceipts'            
        );
        return view('sreceipt.edit')->with($data);
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
        $sreceipt = Sreceipt::find($id);
        $log_user = Auth:: user();
        $this->validate($request,[
            's_rec_no'=>'required',
            'c_id'=>'required',
            's_rec_date'=>'required',
            's_rec_amount'=>'required',
            's_rec_gen_no'=>'unique'
        ]);

        $s_rec_date_of_pay_n= $request->input('s_rec_date');
        $finanacialyear =  NepaliDateFormat :: returnFinacialYear($s_rec_date_of_pay_n);
        $gen_s_rec_no = str_pad($request->input('s_rec_no'),5,'0',STR_PAD_LEFT);
        $request['s_rec_gen_no'] = $finanacialyear.'-'.$gen_s_rec_no;

        $messages = [
            's_rec_gen_no.unique' => 'Receipt No repeated',
        ];
        $d_id = $request->input('d_id');
        $preceipt_id = $request->input('p_rec_no');
        $sreceipt_old_id = $sreceipt->s_rec_gen_no;
        $validator =  Validator::make($request->all(), [
                's_rec_gen_no' =>  // Look at the query/ Don;t know it requires the field from request
                 Rule::unique('sreceipts')
                 ->ignore($sreceipt_old_id,'s_rec_gen_no')
            ],
            $messages
            );
        if ($validator->fails()) {
            return redirect('sreceipts/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $s_rec_date_of_pay_n = $request->input('s_rec_date');
        $s_rec_date_of_pay =  NepaliDateFormat :: returnCarbonDate($s_rec_date_of_pay_n);
        $sreceipt->s_rec_no = $request->input('s_rec_no');
        $sreceipt->s_rec_gen_no = $request->input('s_rec_gen_no');
        $sreceipt->creditor_id = $request->input('c_id');
        $sreceipt->s_rec_date_of_pay = $s_rec_date_of_pay;
        $sreceipt->s_rec_date_of_pay_n = $s_rec_date_of_pay_n;
        $sreceipt->s_rec_amount = $request->input('s_rec_amount');
        $sreceipt->s_rec_entered_by = $log_user->name;
        $sreceipt->save();
        return redirect('/sreceipts')->with('success','Sales Receipt created Succesfully'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sreceipt  = Sreceipt::find($id);
        $sreceipt->delete();
        return redirect('/sreceipts')->with('success',"Sreceipt deleted successful");
    }
}
