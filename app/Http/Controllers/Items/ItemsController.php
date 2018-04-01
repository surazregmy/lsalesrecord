<?php

namespace App\Http\Controllers\Items;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item\Item;



class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item :: all();  // fetches all the data        
        $data = array(
            'heading' => 'Items',
            'subheading' => 'Items List',
            'items'=>$items
        );
        return view('Item.list')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'heading' => 'Items',
            'subheading' => 'Add Items',
        );
        return view('Item/AddItem')->with($data);
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
            'item_name'=>'required',
            'i_category'=>'required',
            'i_quantity'=>'required|integer',
            'i_cur_cp'=>'required|numeric',
            'i_cur_sp'=>'required|numeric',
            'i_cur_dp'=>'required|numeric',
            'i_low_flag'=>'required|integer'
        ]);
        
        $item = new Item;
        $item->item_name = $request->input('item_name');
        $item->i_category = $request->input('i_category');
        $item->i_quantity = $request->input('i_quantity');
        $item->i_cur_cp = $request->input('i_cur_cp');
        $item->i_cur_sp = $request->input('i_cur_sp');
        $item->i_cur_dp = $request->input('i_cur_dp');
        $item->i_low_flag = $request->input('i_low_flag');
        $item->save();
        return redirect('/items')->with('success','Item created Succesfully');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item =  Item:: find($id);
        $data = array(
            'heading' => 'Items',
            'subheading' => 'Show Item',
            'item'=>$item
        );
        return view('Item.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $item =  Item:: find($id);
        $data = array(
            'heading' => 'Items',
            'subheading' => 'Edit Item',
            'item'=>$item
        );
        return view('Item.edit')->with($data);    
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
            'item_name'=>'required',
            'i_category'=>'required',
            'i_quantity'=>'required|integer',
            'i_cur_cp'=>'required|numeric',
            'i_cur_sp'=>'required|numeric',
            'i_cur_dp'=>'required|numeric',
            'i_low_flag'=>'required|integer'
        ]);
        
        $item =Item :: find($id);
        $item->item_name = $request->input('item_name');
        $item->i_category = $request->input('i_category');
        $item->i_quantity = $request->input('i_quantity');
        $item->i_cur_cp = $request->input('i_cur_cp');
        $item->i_cur_sp = $request->input('i_cur_sp');
        $item->i_cur_dp = $request->input('i_cur_dp');
        $item->i_low_flag = $request->input('i_low_flag');
        $item->save();
        return redirect('/items')->with('success','Item Updated Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item:: find($id);
        $item->delete();
        return redirect('/items')->with('succcess','Item Deleted');
    }
}
