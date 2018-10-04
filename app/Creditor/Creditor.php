<?php

namespace App\Creditor;

use Illuminate\Database\Eloquent\Model;

class Creditor extends Model
{
    protected $primaryKey = 'creditor_id';
    public function sbill(){
        return $this->hasMany('App\Sbill\Sbill','creditor_id','creditor_id');
    }
}
