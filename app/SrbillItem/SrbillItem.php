<?php

namespace App\SrbillItem;

use Illuminate\Database\Eloquent\Model;

class SrbillItem extends Model
{
    public function srbill(){
        return $this->belongsToMany('App\Srbill\Srbill','srbill_id');
    }

    public function item(){
        return $this->hasMany('App\Item\Item','item_id','item_id');
    }
}
