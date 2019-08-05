<?php

namespace App\Http\Controllers\debtors;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Debtor\Debtor;
use Validator;
use Illuminate\Validation\Rule;

class DebtorsController extends Controller
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
        $debtors = Debtor :: all();
        $data = array(
            'heading' => 'Suppliers',
            'subheading' => 'Suplliers List',
            'debtors'=>$debtors,
            'brname' => 'listSuppliers'
        );
        return view('debtor.list')->with($data);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'heading' => 'Suppliers',
            'subheading' => 'Suppliers Add',
            'brname' => 'addSuppliers'
        );
        return view('debtor.add')->with($data);
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
            'd_name'=>'required|unique:debtors,debtor_name',
            'd_address'=>'required',
            'd_prim_phone'=>'required'
        ]);

        $debtor = new Debtor;
        $debtor->debtor_name = $request->input('d_name');
        $debtor->d_address = $request->input('d_address');
        $debtor->d_prim_phone = $request->input('d_prim_phone');
        $debtor->d_sec_phone = $request->input('d_sec_phone');

        $debtor->save();
        return redirect('/debtors')->with('success','Debtor created Succesfully');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $debtor = Debtor::find($id);
        $data = array(
            'heading' => 'Suppliers',
            'subheading' => 'Suppliers Show',
            'debtor' => $debtor,
            'brname' => 'showSuppliers'
            
        );
        return view('debtor.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $debtor =  Debtor:: find($id);
        $data = array(
            'heading' => 'Suppliers',
            'subheading' => 'Suppliers Edit',
            'debtor'=>$debtor,
            'brname' => 'editSuppliers'
            
        );
        return view('Debtor.edit')->with($data); 
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
        $debtor =  Debtor:: find($id);
        $this->validate($request,[
            'd_name'=>'required',
            'd_address'=>'required',
            'd_prim_phone'=>'required'
        ]);

        $messages = [
            'd_name.unique' => 'Debtors repeated',
        ];
        $d_name = $debtor->debtor_name;
        $validator =  Validator::make($request->all(), [
                'd_name' =>  // Look at the query/ Don;t know it requires the field from request
                    Rule::unique('debtors','debtor_name')->ignore($d_name,'debtor_name')
            ],  
            $messages
            );
        if ($validator->fails()) {
            return redirect('debtors/'.$id.'/edit')
                        ->withErrors($validator)
                        ->withInput();
        }


        $debtor =  Debtor:: find($id);
        $debtor->debtor_name = $request->input('d_name');
        $debtor->d_address = $request->input('d_address');
        $debtor->d_prim_phone = $request->input('d_prim_phone');
        $debtor->d_sec_phone = $request->input('d_sec_phone');

        $debtor->save();
        return redirect('/debtors')->with('success','Debtor Updated Succesfully');  

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $debtor = Debtor:: find($id);
        $pbill_count = count($debtor->pbill);
        $prbill_count = count($debtor->prbill);
        if($pbill_count == 0 && $prbill_count == 0){
            $debtor-> delete();
            return redirect('/debtors')->with('success','Debtor Deleted');
        }
        else{
            return redirect('/debtors')->with('error','Debtor can not be deleted with existing bills');
        }
    }

    public function saveNotes(Request $request)
    {
       $id = $request->input('d_id');
        $debtor = Debtor::find($id);
        $debtor->d_note = $request->input('d_note');
        $debtor->save();
        return redirect('/debtors/'.$id);
        
    }
}
