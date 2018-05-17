<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = "type";
    public function news(){
    	return $this->hasMany('App\News','type_id','id');
    }
    public function category(){
    	return $this->belongsTo('App\Category','category_id','id');
    }
}
