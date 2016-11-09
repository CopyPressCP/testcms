<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $primaryKey = 'client_id';
    protected $fillable = ['first_name'];

    public function campaigns(){
        return $this->hasMany('App\Campaign');
    }

    public function users(){
        return $this->hasMany('App\User');
    }
}
