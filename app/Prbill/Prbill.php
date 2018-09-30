<?php

namespace App\Prbill;

use Illuminate\Database\Eloquent\Model;

use App\Helper\Conversion;
use App\Services\NepaliDateFormat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\PrbillItem\PrbillItem;




class Prbill extends Model

{
    public $primaryKey ='prbill_id';

    public function debtor(){
        return $this->belongsTo('App\Debtor\Debtor','debtor_id');
    }
    public function prbillitem(){
        return $this->hasMany('App\PrbillItem\PrbillItem','prbill_id','prbill_id');
    }

    public static function addPrbill($request){
        $prbill_add_status = 0;
        $inserted_id = 0;
        $date_of_purchase_n= $request->input('date_of_purchase');
        $date_of_purchase_e = NepaliDateFormat :: returnCarbonDate($date_of_purchase_n);
        $prbill = new Prbill;
        $prbill->prbill_original_id = $request->input('prbill_original_id');
        $prbill->prbill_generated_id = $request->input('prbill_generated_id');
        $prbill->debtor_id = $request->input('d_id');
        $prbill->pr_date_of_purchase = $date_of_purchase_e;
        $prbill->pr_date_of_purchase_n= $request->input('date_of_purchase');
        $prbill->pr_entered_by = $request->input('entered_by');
        $prbill->pr_total_amount = $request->input('total_amount');
        DB::beginTransaction();
        try{
            $prbill->save();
            $inserted_id = $prbill->prbill_id;  // get the id of the inserted prbill
            $total_amount = 0;
            for ($i=1; $i < count($_POST)-7; $i+=4) { 
                $one_row = array_slice($_POST,$i,4);
                if (!(in_array(null, $one_row))) {
                       $k = array_keys($one_row);
    
                    $data = array(
                            'prbill_id'=> $inserted_id,
                            'item_id' =>$one_row[$k[0]],
                            'quantity' =>$one_row[$k[1]],
                             'rate' =>$one_row[$k[2]],
                             'total' =>$one_row[$k[3]]
                        );
                        DB::table('prbill_items')->insert($data);
                        $total_amount = $total_amount + $one_row[$k[3]];
                 }

            }
            $prbill = Prbill::find($inserted_id);
            $prbill->pr_total_amount = $total_amount;
            $prbill->save();
            DB::commit();
            $prbill_add_status = 1;

        }catch(\Exception $e){
            $prbill_add_status = 0;
            DB:: rollback();

        }
        return array(
            'prbill_add_status'=>$prbill_add_status,
            'inserted_id'=>$inserted_id);
    }

    public static function updatePrbill($request,$id){
        
        // echo '<pre>';   
        // print_r($_POST);    
        // die;
        $prbill_update_status = 0;
        $updated_id = 0;
        $date_of_purchase_n= $request->input('date_of_purchase');
        $date_of_purchase_e = NepaliDateFormat :: returnCarbonDate($date_of_purchase_n);
        $prbill = Prbill:: find($id);
        $prbill->prbill_original_id = $request->input('prbill_original_id');
        $prbill->prbill_generated_id = $request->input('prbill_generated_id');
        $prbill->debtor_id = $request->input('d_id');
        $prbill->pr_date_of_purchase = $date_of_purchase_e;
        $prbill->pr_date_of_purchase_n= $request->input('date_of_purchase');
        $prbill->pr_entered_by = $request->input('entered_by');
        $prbill->pr_total_amount = $request->input('total_amount');

        DB::beginTransaction();
        try{
            $prbill->save();
            $updated_id = $prbill->prbill_id;  // get id of updated prbill
            PrbillItem :: where('prbill_id',$updated_id)->delete();

            $total_amount = 0;
            for ($i=2; $i < count($_POST)-7; $i+=4) { 
                $one_row = array_slice($_POST,$i,4);
                if (!(in_array(null, $one_row))) {
                       $k = array_keys($one_row);
    
                    $data = array(
                            'prbill_id'=> $updated_id,
                            'item_id' =>$one_row[$k[0]],
                            'quantity' =>$one_row[$k[1]],
                             'rate' =>$one_row[$k[2]],
                             'total' =>$one_row[$k[3]]
                        );
                        $total_amount = $total_amount + $one_row[$k[3]]; // total amount
                        

                        // echo '<pre>';
                        // print_r($data);
                        DB::table('prbill_items')->insert($data);
                        // echo 'done';
                 }
            }
            $prbill->pr_total_amount = $total_amount;
            $prbill->save();
            DB::commit();
            $prbill_update_status = 1;

        }catch(\Exception $e){
            $prbill_update_status = 0;
            DB:: rollback();

        }
        return array(
            'prbill_update_status'=>$prbill_update_status,
            'updated_id' => $updated_id
            );
    }
   
}
