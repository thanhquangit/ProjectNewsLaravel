<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Type;
class AjaxController extends Controller
{
    public function getTypeByCategory($idCategory){
    	$type = Type::where('category_id',$idCategory)->get();
    	foreach($type as $t){
    		echo "<option value='".$t->id."'>".$t->type_nname."</option>";
    	}
    }
}
