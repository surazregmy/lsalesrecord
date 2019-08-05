<?php

namespace App\Http\Controllers\Creditors;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Creditor\Creditor;
use Validator;
use Illuminate\Validation\Rule;

class CreditorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $creditros = Creditor::all();
        $data = array(
            'heading'=>'Customers',
            'subheading'=>'List Customers',
            'creditors'=>$creditros,
            'brname'=>'listCustomers'
        );
        return view('creditor.list')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'heading'=>'Customers',
            'subheading'=>'Add Customers',
            'brname'=>'addCustomers'
        );
        return view('creditor.add')->with($data);
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
            'c_name'=>'required|unique:creditors,creditor_name',
            'c_address'=>'required',
            'c_prim_phone'=>'required'
        ]);

        $creditor = new Creditor;
        $creditor->creditor_name = $request->input('c_name');
        $creditor->c_address = $request->input('c_address');
        $creditor->c_prim_phone = $request->input('c_prim_phone');
        $creditor->c_sec_phone = $request->input('c_sec_phone');
        $creditor->save();
        return redirect('/creditors')->with('success','Customer created Succesfully');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $creditor = Creditor::find($id);
        $data = array(
            'heading' => 'Customers',
            'subheading' => 'Customer Show',
            'creditor' => $creditor,
            'brname' => 'showCustomers  '
            
        );
        return view('creditor.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $creditor = Creditor::find($id);
        $data = array(
            'heading'=>'Customers',
            'subheading'=>'List Customers',
            'creditor'=>$creditor,
            'brname'=>'editCustomers'
        );
        return view('creditor.edit')->with($data);
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
        $creditor =  Creditor:: find($id);
        $this->validate($request,[
            'c_name'=>'required',
            'c_address'=>'required',
            'c_prim_phone'=>'required'
        ]);

        $messages = [
            'c_name.unique' => 'Creditors name repeated',
        ];
        $c_name = $creditor->creditor_name;
        $validator =  Validator::make($request->all(), [
                'c_name' =>  // Look at the query/ Don;t know it requires the field from request
                    Rule::unique('creditors','creditor_name')->ignore($c_name,'creditor_name')
            ],  
            $messages
            );
        if ($validator->fails()) {
            return redirect('creditors/'.$id.'/edit')
                        ->withErrors($validator)
                        ->withInput();
        }



        $creditor->creditor_name = $request->input('c_name');
        $creditor->c_address = $request->input('c_address');
        $creditor->c_prim_phone = $request->input('c_prim_phone');
        $creditor->c_sec_phone = $request->input('c_sec_phone');

        $creditor->save();
        return redirect('/creditors')->with('success','Creditor Updated Succesfully');  

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $creditor = Creditor:: find($id);
        $sbill_count = count($creditor->sbill);
        $srbill_count = count($creditor->srbill);
        if($sbill_count == 0 && $srbill_count == 0){
            $creditor-> delete();
            return redirect('/creditors')->with('success','Creditor Deleted');
        }
        else{
            return redirect('/creditors')->with('error','Creditor can not be deleted with existing bills');
        }
    }

    public function saveNotes(Request $request)
    {
       $id = $request->input('c_id');
        $creditor = Creditor::find($id);
        $creditor->c_note = $request->input('c_note');
        $creditor->save();
        return redirect('/creditors/'.$id);
        
    }
}
