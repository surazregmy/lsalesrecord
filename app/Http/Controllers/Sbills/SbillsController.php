<?php

namespace App\Http\Controllers\Sbills;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item\Item;
use App\Creditor\Creditor;

class SbillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
