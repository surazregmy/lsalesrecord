<?php

namespace App\Item;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //table name 
    protected $table = 'items';
    public $primaryKey ='item_id';
    public $timestamps = true;
}
