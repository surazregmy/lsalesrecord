<?php

namespace App\Http\Controllers\debtors;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Debtor\Debtor;

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
            'heading' => 'Debtors',
            'subheading' => 'Debtors List',
            'debtors'=>$debtors
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
            'heading' => 'Debtors',
            'subheading' => 'Debtors Add',
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
            'd_name'=>'required',
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
        $data = array(
            'heading' => 'Debtors',
            'subheading' => 'Debtors Show',
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
            'heading' => 'Debtor',
            'subheading' => 'Debtor Edit',
            'debtor'=>$debtor
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
        $this->validate($request,[
            'd_name'=>'required',
            'd_address'=>'required',
            'd_prim_phone'=>'required'
        ]);

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
        $debtor-> delete();
        return redirect('/debtors')->with('success','Debtor Deleted');
    }
}
