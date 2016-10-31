<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $primaryKey = 'article_id';

    public function campaigns(){
        return $this->belongsTo('App\Campaign','campaign_id','campaign_id');
    }

    public function domains(){
        return $this->belongsTo('App\Domain','domain_id','domain_id');
    }
}
