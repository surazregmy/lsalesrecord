<?php

namespace App\Pbill;

use Illuminate\Database\Eloquent\Model;

use App\Helper\Conversion;
use App\Services\NepaliDateFormat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\PbillItem\PbillItem;




class Pbill extends Model

{
    public $primaryKey ='pbill_id';

    public function debtor(){
        return $this->belongsTo('App\Debtor\Debtor','debtor_id');
    }
    public function pbillitem(){
        return $this->hasMany('App\PbillItem\PbillItem','pbill_id','pbill_id');
    }

    public static function addPbill($request){
        $pbill_add_status = 0;
        $inserted_id = 0;
        $date_of_purchase_n= $request->input('date_of_purchase');
        $date_of_purchase_e = NepaliDateFormat :: returnCarbonDate($date_of_purchase_n);
        $pbill = new Pbill;
        $pbill->pbill_original_id = $request->input('pbill_original_id');
        $pbill->debtor_id = $request->input('d_id');
        $pbill->p_date_of_purchase = $date_of_purchase_e;
        $pbill->p_date_of_purchase_n= $request->input('date_of_purchase');
        $pbill->p_entered_by = $request->input('entered_by');
        $pbill->p_total_amount = $request->input('total_amount');
        $pbill->pbill_generated_id = $request->input('pbill_generated_id');
       

        DB::beginTransaction();
        try{
            $pbill->save();
            $inserted_id = $pbill->pbill_id;  // get the id of the inserted pbill
            $total_amount = 0;
            for ($i=1; $i < count($_POST)-7; $i+=4) { 
                $one_row = array_slice($_POST,$i,4);
                if (!(in_array(null, $one_row))) {
                       $k = array_keys($one_row);
    
                    $data = array(
                            'pbill_id'=> $inserted_id,
                            'item_id' =>$one_row[$k[0]],
                            'quantity' =>$one_row[$k[1]],
                             'rate' =>$one_row[$k[2]],
                             'total' =>$one_row[$k[3]]
                        );
                        DB::table('pbill_items')->insert($data);
                        $total_amount = $total_amount + $one_row[$k[3]];
                 }

            }
            $pbill = Pbill::find($inserted_id);
            $pbill->p_total_amount = $total_amount;
            $pbill->save();
            DB::commit();
            $pbill_add_status = 1;

        }catch(\Exception $e){
            $pbill_add_status = 0;
            DB:: rollback();

        }
        return array(
            'pbill_add_status'=>$pbill_add_status,
            'inserted_id'=>$inserted_id);
    }

    public static function updatePbill($request,$id){
        
        // echo '<pre>';   
        // print_r($_POST);    
        // die;
        $pbill_update_status = 0;
        $updated_id = 0;
        $date_of_purchase_n= $request->input('date_of_purchase');
        $date_of_purchase_e = NepaliDateFormat :: returnCarbonDate($date_of_purchase_n);
        $pbill = Pbill:: find($id);
        $pbill->pbill_original_id = $request->input('pbill_original_id');
        $pbill->debtor_id = $request->input('d_id');
        $pbill->p_date_of_purchase = $date_of_purchase_e;
        $pbill->p_date_of_purchase_n= $request->input('date_of_purchase');
        $pbill->p_entered_by = $request->input('entered_by');
        $pbill->p_total_amount = $request->input('total_amount');
        $pbill->pbill_generated_id = $request->input('pbill_generated_id');

        DB::beginTransaction();
        try{
            $pbill->save();
            $updated_id = $pbill->pbill_id;  // get id of updated pbill
            PbillItem :: where('pbill_id',$updated_id)->delete();

            $total_amount = 0;
            for ($i=2; $i < count($_POST)-8; $i+=4) { 
                $one_row = array_slice($_POST,$i,4);
                if (!(in_array(null, $one_row))) {
                       $k = array_keys($one_row);
    
                    $data = array(
                            'pbill_id'=> $updated_id,
                            'item_id' =>$one_row[$k[0]],
                            'quantity' =>$one_row[$k[1]],
                             'rate' =>$one_row[$k[2]],
                             'total' =>$one_row[$k[3]]
                        );
                
                        
                       $total_amount = $total_amount + $one_row[$k[3]]; // total amount
                        

                        // echo '<pre>';
                        // print_r($data);
                        DB::table('pbill_items')->insert($data);
                        // echo 'done';
                 }
            }
            $pbill->p_total_amount = $total_amount;
            $pbill->save();
            DB::commit();
            $pbill_update_status = 1;

        }catch(\Exception $e){
            $pbill_update_status = 0;
            DB:: rollback();

        }
        return array(
            'pbill_update_status'=>$pbill_update_status,
            'updated_id' => $updated_id
            );
    }
   
}
