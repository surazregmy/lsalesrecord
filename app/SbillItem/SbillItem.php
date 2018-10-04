<?php

namespace App\SbillItem;

use Illuminate\Database\Eloquent\Model;

class SbillItem extends Model
{

    public function creditor(){
        return $this->belongsToMany('App\Sbill\Sbill','sbill_id');
    }

    public function item(){
        return $this->hasMany('App\Item\Item','item_id','item_id');
    }
}
