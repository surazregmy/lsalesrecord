<?php

namespace App\Sbill;

use Illuminate\Database\Eloquent\Model;

use App\Helper\Conversion;
use App\Services\NepaliDateFormat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\SbillItem\SbillItem;
use App\Item\Item;

class Sbill extends Model
{
    public $primaryKey ='sbill_id';

    public function creditor(){
        return $this->belongsTo('App\Creditor\Creditor','creditor_id');
    }
    public function sbillitem(){
        return $this->hasMany('App\SbillItem\SbillItem','sbill_id','sbill_id');
    }

    public static function addSbill($request){
        // echo "<pre>";
        // print_r($request->all());
        // die;
        $sbill_add_status = 0;
        $inserted_id = 0;
        $date_of_sale_n= $request->input('date_of_sale');
        $date_of_purchase_e = NepaliDateFormat :: returnCarbonDate($date_of_sale_n);
        $sbill = new Sbill;
        $sbill->sbill_original_id = $request->input('sbill_original_id');
        $sbill->sbill_type = $request->input('sbill_type');
        $sbill->creditor_id = $request->input('c_id');
        $sbill->s_date_of_sale= $date_of_purchase_e;
        $sbill->s_date_of_sale_n= $request->input('date_of_sale');
        $sbill->s_entered_by = $request->input('entered_by');
        $sbill->s_sub_total_amount = $request->input('sub_total');
        $sbill->s_fin_discount_amount = $request->input('dis_amt');
        $sbill->s_fin_total_amount = $request->input('tot_amt');
        $sbill->s_paid_amount = $request->input('paid_amount');
        $sbill->s_rem_amount = $request->input('rem_amount');
        $sbill->profit_amount = $request->input('sub_total');
        $sbill->comment = $request->input('comment');
        $sbill->sbill_generated_id = $request->input('sbill_generated_id');
       
        if($request->input('sbill_type') == 'halfpaid'){
            $no_of_params = 12;
        }else{
            $no_of_params = 10;
        }
        // echo $no_of_params;
        // die;
        DB::beginTransaction();
        try{
            $sbill->save();
            $inserted_id = $sbill->sbill_id;  // get the id of the inserted pbill
            $total_amount = 0;
            $total_cost = 0;
            for ($i=1; $i < count($_POST) -$no_of_params; $i+=5) { 
                $one_row = array_slice($_POST,$i,5);
                if (!(in_array(null, $one_row))) {
                       $k = array_keys($one_row);
    
                    $data = array(
                            'sbill_id'=> $inserted_id,
                            'item_id' =>$one_row[$k[0]],
                            'quantity' =>$one_row[$k[1]],
                             'rate' =>$one_row[$k[2]],
                             'discount'=>$one_row[$k[3]],
                             'total' =>$one_row[$k[4]]
                        );
                        DB::table('sbill_items')->insert($data);
                        $tmp_item = Item::find($one_row[$k[0]]);
                        $cost = $tmp_item->i_cur_cp;
                        $total_cost =$total_cost + $cost * $one_row[$k[1]];
                      
                 }
                 

            }
            $sbill = sbill::find($inserted_id);
            $sbill->profit_amount = $sbill->s_fin_total_amount -  $total_cost;
            $sbill->save();
            DB::commit();
            $sbill_add_status = 1;
            

        }catch(\Exception $e){
            $sbill_add_status = 0;
            DB:: rollback();

        }
        return array(
            'sbill_add_status'=>$sbill_add_status,
            'inserted_id'=>$inserted_id);
    }

    public static function updateSbill($request,$id){
        // echo "<pre>";
        // print_r($request->all());
        // die;
        $sbill_update_status = 0;
        $inserted_id = 0;
        $date_of_sale_n= $request->input('date_of_sale');
        $date_of_purchase_e = NepaliDateFormat :: returnCarbonDate($date_of_sale_n);
        $sbill = Sbill::find($id);
        $sbill->sbill_original_id = $request->input('sbill_original_id');
        $sbill->sbill_type = $request->input('sbill_type');
        $sbill->status = $request->input('status');
        $sbill->date_status = $request->input('status_date');
        $sbill->creditor_id = $request->input('c_id');
        $sbill->s_date_of_sale= $date_of_purchase_e;
        $sbill->s_date_of_sale_n= $request->input('date_of_sale');
        $sbill->s_entered_by = $request->input('entered_by');
        $sbill->s_sub_total_amount = $request->input('sub_total');
        $sbill->s_fin_discount_amount = $request->input('dis_amt');
        $sbill->s_fin_total_amount = $request->input('tot_amt');
        $sbill->s_paid_amount = $request->input('paid_amount');
        $sbill->s_rem_amount = $request->input('rem_amount');
        $sbill->profit_amount = $request->input('sub_total');
        $sbill->comment = $request->input('comment');
        $sbill->sbill_generated_id = $request->input('sbill_generated_id');
       
        if($request->input('sbill_type') == 'halfpaid'){
            $no_of_params = 12;
        }else{
            $no_of_params = 10;
        }
        // echo $no_of_params;
        // die;
        DB::beginTransaction();
        try{
            $sbill->save();
            $updated_id = $sbill->sbill_id;  // get the id of the update pbill
            SbillItem :: where('sbill_id',$updated_id)->delete();

            $total_cost = 0;
            for ($i=4; $i < count($_POST) -$no_of_params; $i+=5) { // 2 because method is put
                $one_row = array_slice($_POST,$i,5);
                // echo "<pre>";
                // print_r($one_row);
                if (!(in_array(null, $one_row))) {
                       $k = array_keys($one_row);
    
                    $data = array(
                            'sbill_id'=> $updated_id,
                            'item_id' =>$one_row[$k[0]],
                            'quantity' =>$one_row[$k[1]],
                             'rate' =>$one_row[$k[2]],
                             'discount'=>$one_row[$k[3]],
                             'total' =>$one_row[$k[4]]
                        );
                        DB::table('sbill_items')->insert($data);
                        $tmp_item = Item::find($one_row[$k[0]]);
                        $cost = $tmp_item->i_cur_cp;
                        $total_cost =$total_cost + $cost * $one_row[$k[1]];
                 }
                 

            }
            // die;
            $sbill = sbill::find($updated_id);
            $sbill->profit_amount = $sbill->s_fin_total_amount -  $total_cost;
            $sbill->save();
            DB::commit();
            $sbill_update_status = 1;
            

        }catch(Exception $e){
            $sbill_update_status = 0;
            DB:: rollback();

        }
        return array(
            'sbill_update_status'=>$sbill_update_status,
            'updated_id'=>$updated_id);

    }
}
