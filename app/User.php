<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $primaryKey = 'user_id';

    public function roles(){
        return $this->belongsToMany('App\Role','user_roles','user_id','role_id');
    }

    public function clients(){
        return $this->belongsTo('App\Client','client_id','client_id');
    }

    public function campaigns(){
        return $this->belongsToMany('App\Campaign','campaign_users','user_id','campaign_id');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
