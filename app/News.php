<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table="news";
    public function comment(){
    	return $this->hasMany('App\Comment','news_id','id');
    }
    public function type(){
    	return $this->belongsTo('App\Type','type_id','id');
    }
}
