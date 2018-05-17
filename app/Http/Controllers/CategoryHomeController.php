<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Type;
use App\News;
use App\Comment;
class CategoryHomeController extends Controller
{
   function __construct(){
   		$category = Category::all();
   		view()->share('category',$category);
   }
   public function getListCategory($id){
   		$type = Type::find($id);
   		$news = News::where('type_id',$id)->paginate(10);
   		return view('layout.category',compact('type','news'));
   }
   public function getDetailNews($id){
   		$news = News::find($id);
   		$news_hot = News::where('highlight',1)->take(5)->orderBy('id','desc')->get();
   		$news_release = News::where('type_id',$news->type_id)->orderBy('id','desc')->take(5)->get();
   		return view('layout.detail', compact('news','news_hot','news_release'));
   }
}
