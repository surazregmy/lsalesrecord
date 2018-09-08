<?php

namespace App\Debtor;

use Illuminate\Database\Eloquent\Model;

class Debtor extends Model
{
    protected $primaryKey = 'debtor_id';
    public function pbill(){
        return $this->hasMany('App\Pbill\Pbill','debtor_id','debtor_id');
    }
}
