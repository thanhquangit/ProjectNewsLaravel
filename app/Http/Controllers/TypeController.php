<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Type;
use App\Category;
class TypeController extends Controller
{
    public function getListType(){
    	$type = Type::all();
    	return view('admin.type.list', compact('type'));
    }
    public function getAddType(){
    	$category = Category::all();
    	return view('admin.type.add', compact('category'));
    }
    public function postAddType(Request $request){
    	$this->validate($request,
    		[
    			'name'=>'required',
    			'category'=>'required'
    		],
    		[
    			'name.required'=>'Type Name is not Empty',
    			'category.required'=>'Category Name is not Empty'
    		]);
    	$type = new Type;
    	$type->type_nname = $request->name;
    	$type->type_slug = changeTitle($request->name);
    	$type->category_id = $request->category;
    	$type->save();
    	return redirect('admin/type/add')->with('notify','Add Type is successfully');
    }
    public function getEditType($id){
    	$type=Type::find($id);
    	$category = Category::all();
    	return view('admin.type.edit', compact('type','category'));
    }
    public function postEditType($id, Request$request){
    	$this->validate($request,
    		[
    			'name'=>'required',
    			'category'=>'required'
    		],
    		[
    			'name.required'=>'Type Name is not Empty',
    			'category.required'=>'Category is not Empty'
    		]);
    	$type=Type::find($id);
    	$type->type_nname=$request->name;
    	$type->type_slug=changeTitle($request->name);
    	$type->category_id = $request->category;
    	$type->save();
    	return redirect('admin/type/edit/'.$id)->with('notify','Edit Type is successfully');
    }
    public function getDeleteType($id){
    	$type=Type::find($id);
    	$type->delete();
    	return redirect('admin/type/list')->with('notify','Delete type is successfully');
    }
}
