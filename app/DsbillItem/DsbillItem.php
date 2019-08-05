<?php

namespace App\DsbillItem;

use Illuminate\Database\Eloquent\Model;

class DsbillItem extends Model
{
    public function dsbill(){
        return $this->belongsToMany('App\Dsbill\Dsbill','sbill_id');
    }

    public function item(){
        return $this->hasMany('App\Item\Item','item_id','item_id');
    }
}
