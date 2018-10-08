<?php

namespace App\Srbill;

use Illuminate\Database\Eloquent\Model;

use App\Helper\Conversion;
use App\Services\NepaliDateFormat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\SrbillItem\SrbillItem;
use App\Item\Item;

class Srbill extends Model
{
    public $primaryKey ='srbill_id';

    public function creditor(){
        return $this->belongsTo('App\Creditor\Creditor','creditor_id');
    }
    public function srbillitem(){
        return $this->hasMany('App\SrbillItem\SrbillItem','srbill_id','srbill_id');
    }
    public static function addSrbill($request){
        // echo "<pre>";
        // print_r($request->all());
        // die;
        $srbill_add_status = 0;
        $inserted_id = 0;
        $date_of_sale_n= $request->input('date_of_sale');
        $date_of_purchase_e = NepaliDateFormat :: returnCarbonDate($date_of_sale_n);
        $srbill = new Srbill;
        $srbill->srbill_original_id = $request->input('srbill_original_id');
        $srbill->creditor_id = $request->input('c_id');
        $srbill->sr_date_of_ret= $date_of_purchase_e;
        $srbill->sr_date_of_ret_n= $request->input('date_of_sale');
        $srbill->sr_entered_by = $request->input('entered_by');
        $srbill->sr_total_amount = $request->input('tot_amt');
        $srbill->comment = $request->input('comment');
        $srbill->srbill_generated_id = $request->input('srbill_generated_id');
       
        DB::beginTransaction();
        try{
            $srbill->save();
            $inserted_id = $srbill->srbill_id;  // get the id of the inserted pbill
            for ($i=1; $i < count($_POST) -8; $i+=5) { 
                $one_row = array_slice($_POST,$i,5);
                if (!(in_array(null, $one_row))) {
                       $k = array_keys($one_row);
    
                    $data = array(
                            'srbill_id'=> $inserted_id,
                            'item_id' =>$one_row[$k[0]],
                            'quantity' =>$one_row[$k[1]],
                             'rate' =>$one_row[$k[2]],
                             'discount'=>$one_row[$k[3]],
                             'total' =>$one_row[$k[4]]
                        );
                        DB::table('srbill_items')->insert($data);   
                 }
                 

            }
            DB::commit();
            $srbill_add_status = 1;
            

        }catch(Exception $e){
            $srbill_add_status = 0;
            DB:: rollback();

        }
        return array(
            'srbill_add_status'=>$srbill_add_status,
            'inserted_id'=>$inserted_id);
    }

    public static function updateSrbill($request,$id){
        // echo "<pre>";
        // print_r($request->all());
        // die;
        $srbill_update_status = 0;
        $updated_id = 0;
        $date_of_sale_n= $request->input('date_of_sale');
        $date_of_purchase_e = NepaliDateFormat :: returnCarbonDate($date_of_sale_n);
        $srbill = Srbill::find($id);
        $srbill->srbill_original_id = $request->input('srbill_original_id');
        $srbill->creditor_id = $request->input('c_id');
        $srbill->sr_date_of_ret= $date_of_purchase_e;
        $srbill->sr_date_of_ret_n= $request->input('date_of_sale');
        $srbill->sr_entered_by = $request->input('entered_by');
        $srbill->sr_total_amount = $request->input('tot_amt');
        $srbill->comment = $request->input('comment');
        $srbill->srbill_generated_id = $request->input('srbill_generated_id');
       
        DB::beginTransaction();
        try{
            $srbill->save();
            $updated_id = $srbill->srbill_id;  // get the id of the inserted pbill
            SrbillItem :: where('srbill_id',$updated_id)->delete();

            for ($i=2; $i < count($_POST) -8; $i+=5) { 
                $one_row = array_slice($_POST,$i,5);
                if (!(in_array(null, $one_row))) {
                       $k = array_keys($one_row);
    
                    $data = array(
                            'srbill_id'=> $updated_id,
                            'item_id' =>$one_row[$k[0]],
                            'quantity' =>$one_row[$k[1]],
                             'rate' =>$one_row[$k[2]],
                             'discount'=>$one_row[$k[3]],
                             'total' =>$one_row[$k[4]]
                        );
                        DB::table('srbill_items')->insert($data);   
                 }
                 

            }
            DB::commit();
            $srbill_update_status = 1;
            

        }catch(Exception $e){
            $srbill_update_status = 0;
            DB:: rollback();

        }
        return array(
            'srbill_update_status'=>$srbill_update_status,
            'updated_id'=>$updated_id);
    }
}
