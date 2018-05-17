<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class CategoryController extends Controller
{
    public function getListCategory(){
    	$category = Category::all();
    	return view('admin.category.list', compact('category'));
    }
    public function getAddCategory(){
    	return view('admin.category.add');
    }
    public function postAddCategory(Request $request){
    	$this->validate($request,
    		[
    			'name'=>'required'
    		],
    		[
    			'name.required'=>'Category Name is not Empty'
    		]
    	);
    	$category = new Category;
    	$category->category_name = $request->name;
    	$category->category_slug = changeTitle($request->name);
    	$category->save();
    	return redirect('admin/category/add')->with('notify','Add Category is successfully');
    }
    public function getDeleteCategory($id){
    	$category = Category::find($id);
    	$category->delete();
    	return redirect('admin/category/list')->with('notify','Delete Category is successfully');
    }
    public function getEditCategory($id){
    	$category=Category::find($id);
    	return view('admin.category.edit',compact('category'));
    }
    public function postEditCategory($id, Request $request){
    	$category = Category::find($id);
    	$this->validate($request,
    		[
    			'name'=>'required'
    		],
    		[
    			'name.required'=>'Category Name is not Empty'
    		]);
    	
    	$category->category_name = $request->name;
    	$category->category_slug = changeTitle($request->name);
    	$category->save();
    	return redirect('admin/category/edit/'.$id)->with('notify','Edit Category is successfully');
    }

}
