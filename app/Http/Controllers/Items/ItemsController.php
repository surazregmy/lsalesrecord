<?php

namespace App\Http\Controllers\Items;
use Storage;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item\Item;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;




class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $load_status = 1;
    

    public function __construct()
    {
        $this->middleware('auth');
    }
    
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
            'i_quantity'=>'required|numeric',
            'i_cur_cp'=>'required|numeric',
            'i_cur_sp'=>'required|numeric',
            'i_cur_dp'=>'required|numeric',
            'i_low_flag'=>'required|integer'
        ],[
            'item_name.required'=>'Item name is required',
            'i_category.required'=>"Item Category is required",
            'i_quantity.required'=>"Item Quantity is required",
            'i_cur_cp.required'=>"Current Cost Price is required",
            'i_cur_sp.required'=>"Current Selling Price is required",
            'i_cur_dp.required'=>"Current Discount Price is required",
            'i_low_flag.required'=>"Low Flag is required",
            'i_quantity.numeric' =>'Item Quantity should be a number',
            'i_cur_cp.numeric' =>'Current Cost Price should be a number',
            'i_cur_sp.numeric' =>'Current Selling Price should be a number',
            'i_cur_dp.numeric' =>'Current Discount Price should be a number',
            'i_low_flag.integer' =>'Low Flag should be a number',
        ]);
        
        $item = new Item;
        $item->item_name = $request->input('item_name');
        $item->i_category = $request->input('i_category');
        $item->i_quantity = $request->input('i_quantity');
        $item->i_cur_cp = $request->input('i_cur_cp');
        $item->i_cur_sp = $request->input('i_cur_sp');
        $item->i_cur_dp = $request->input('i_cur_dp');
        $item->i_low_flag = $request->input('i_low_flag');
        $log_user = Auth:: user();
        // DB::transaction(function () use($item) {
        //     $item->save();
        //     $log_user = Auth:: user();
        //     $values = ['Items Insertion','Item','NULL','NULL','NULL','ADD',$log_user->name];
        //     DB::select('call insert_into_log(?,?,?,?,?,?,?)',$values);
           
        // });
        DB::beginTransaction();        
        try {
            $item->save();
            $log_user = Auth:: user();
            $values = ['Items Insertion','Item','NULL',$item->item_name,'NULL','NULL','ADD',$log_user->name];
            DB::select('call insert_into_log(?,?,?,?,?,?,?,?)',$values);
            DB::table('log_table')->where('user1',NULL)->orwhere('user1','')->update(['user1'=>$log_user->name]);
            DB:: commit();
        }
        catch (\Exception $e){
            DB:: rollback();
            return redirect('/items')->with('error','Item name repeated');  
         }
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
            'i_quantity'=>'required|numeric',
            'i_cur_cp'=>'required|numeric',
            'i_cur_sp'=>'required|numeric',
            'i_cur_dp'=>'required|numeric',
            'i_low_flag'=>'required|integer'
        ],[
            'item_name.required'=>'Item name is required',
            'i_category.required'=>"Item Category is required",
            'i_quantity.required'=>"Item Quantity is required",
            'i_cur_cp.required'=>"Current Cost Price is required",
            'i_cur_sp.required'=>"Current Selling Price is required",
            'i_cur_dp.required'=>"Current Discount Price is required",
            'i_low_flag.required'=>"Low Flag is required",
            'i_quantity.numeric' =>'Item Quantity should be a number',
            'i_cur_cp.numeric' =>'Current Cost Price should be a number',
            'i_cur_sp.numeric' =>'Current Selling Price should be a number',
            'i_cur_dp.numeric' =>'Current Discount Price should be a number',
            'i_low_flag.integer' =>'Low Flag should be a number',
        ]);
        
        $item =Item :: find($id);
        $item->item_name = $request->input('item_name');
        $item->i_category = $request->input('i_category');
        $item->i_quantity = $request->input('i_quantity');
        $item->i_cur_cp = $request->input('i_cur_cp');
        $item->i_cur_sp = $request->input('i_cur_sp');
        $item->i_cur_dp = $request->input('i_cur_dp');
        $item->i_low_flag = $request->input('i_low_flag');
        $log_user = Auth:: user();
        DB::beginTransaction();        
        try {
            $item->save();
            DB::table('log_table')->where('user1',NULL)->orwhere('user1','')->update(['user1'=>$log_user->name]);
            DB:: commit();
        }
        catch (\Exception $e){
            DB:: rollback();
            return redirect('/items')->with('error','Item name repeated');  
        }
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
        $log_user = Auth:: user();
        DB::beginTransaction();
        try {
            $item->delete();
            $values = ['Items Deletion','Item','NULL',$item->item_name,'NULL','NULL','DELETE',$log_user->name];
            DB::select('call insert_into_log(?,?,?,?,?,?,?,?)',$values);
            DB::table('log_table')->where('user1',NULL)->orwhere('user1','')->update(['user1'=>$log_user->name]);
            DB:: commit();
        }
        catch (\Exception $e){
            DB:: rollback();
            return redirect('/items')->with('error','Item Can not be deleted');  
        }  
        return redirect('/items')->with('success','Item Deleted');
    }

    public function loadFromExcel(Request $request)
    {
        
        $this->validate($request,[
            'xls_file' => 'required|mimes:xls,xlsx'
        ],
        [
            'xls_file.required' => 'File can not be empty'
        ]
    );

        if($request -> hasFile('xls_file')){
            
            
            $filenameWithExt = $request->file('xls_file')->getClientOriginalName();
            $pathl = $request->file('xls_file')->getRealPath();

            
            Storage::disk('uploads')->put($filenameWithExt, file_get_contents($pathl));
            $path2 = storage_path('app\uploads'.'\\'.$filenameWithExt);
            
           
            try{
                DB::beginTransaction();
                Excel:: load($request->file('xls_file')->getRealPath(), function($reader){
                    foreach ($reader->toArray() as $key => $row) {
                    $data['item_name'] = $row['item_name'] ;
                    $data['i_category'] = $row['i_category'];
                    $data['i_quantity'] = $row['i_quantity'];
                    $data['i_pre_cp'] = $row['i_pre_cp'];
                    $data['i_pre_sp'] = $row['i_pre_sp'];
                    $data['i_cur_cp'] = $row['i_cur_cp'];
                    $data['i_cur_sp'] = $row['i_cur_sp'];
                    $data['i_pre_dp'] = $row['i_pre_dp'];
                    $data['i_cur_dp'] = $row['i_cur_dp'];
                    $data['i_low_flag'] = $row['i_low_flag'];
                    $data['i_date_of_change_of_price'] = $row['i_date_of_change_of_price'];
                    $data['created_at'] = $row['created_at'];
                    $data['updated_at'] = $row['updated_at'];
                    
                    if(!empty($data)) {
                        try{
                             DB::table('items')->insert($data);
                        }
                        catch (\Illuminate\Database\QueryException $e){
                            $this->load_status = 0;
                            DB:: rollback();
                            break;
                            
                         }
                        
                    }

                }
                    
            });
                DB::commit();
            }
            catch(\Exception $e){
                DB:: rollback();
               $load_status = 0;
                
            }
            
        }
        if($this->load_status == 1){
            $log_user = Auth:: user();
            $values = ['Items Insertion from Excel','Item','NULL','NULL','NULL','NULL','Add',$log_user->name];
            DB::select('call insert_into_log(?,?,?,?,?,?,?,?)',$values);
            return redirect('/items')->with('success','Items Loaded from Excel Successful');
        }
        elseif($this->load_status == 0){
            // echo 'failed';
            return redirect('/items')->with('error','Item name Repeated');
        }

    }
}
