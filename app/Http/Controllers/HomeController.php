<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Category;
class HomeController extends Controller
{
    public function index(){
    	$slide = Slide::orderBy('id','desc')->take(3)->get();
    	$category = Category::all();
    	return view('layout.index', compact('slide','category'));
    }
}
