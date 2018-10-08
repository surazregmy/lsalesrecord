<?php

namespace App\Sreceipt;

use Illuminate\Database\Eloquent\Model;

class Sreceipt extends Model
{
    public $primaryKey ='s_rec_id';
    public $timestamps = true;
    
    public function creditor(){
        return $this->belongsTo('App\Creditor\Creditor','creditor_id');
    }
}
