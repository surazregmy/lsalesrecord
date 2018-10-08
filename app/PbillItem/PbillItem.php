<?php

namespace App\PbillItem;

use Illuminate\Database\Eloquent\Model;

class PbillItem extends Model
{
    //
    // public $primaryKey ='pbillitem_id';
    public function pbill(){
        return $this->belongsToMany('App\Pbill\Pbill','pbill_id');
    }

    public function item(){
        return $this->hasMany('App\Item\Item','item_id','item_id');
    }

}
