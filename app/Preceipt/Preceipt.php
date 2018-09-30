<?php

namespace App\Preceipt;

use Illuminate\Database\Eloquent\Model;

class Preceipt extends Model
{
    public $primaryKey ='p_rec_id';
    public $timestamps = true;
    
    public function debtor(){
        return $this->belongsTo('App\Debtor\Debtor','debtor_id');
    }
}
