<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table="comment";
    public function users(){
    	return $this->belongsTo('App\User','users_id','id');
    }
    public function news(){
    	return $this->belongsTo('App\News','news_id','id');
    }
}
