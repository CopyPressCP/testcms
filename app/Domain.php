<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    protected $primaryKey = 'domain_id';

    public function articles(){
        return $this->hasMany('App\Article');
    }
}
