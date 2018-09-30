<?php

namespace App\PrbillItem;

use Illuminate\Database\Eloquent\Model;

class PrbillItem extends Model
{
    //
    // public $primaryKey ='pbillitem_id';
    public function debtor(){
        return $this->belongsToMany('App\Prbill\Prbill','prbill_id');
    }

    public function item(){
        return $this->hasMany('App\Item\Item','item_id','item_id');
    }

}
