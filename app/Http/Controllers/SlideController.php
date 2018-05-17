<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
class SlideController extends Controller
{
    public function getListSlide(){
    	$slide=Slide::all();
    	return view('admin.slide.list',compact('slide'));
    }
    public function getAddSlide(){
    	return view('admin.slide.add');
    }
    public function postAddSlide(Request $request){
    	$slide = new Slide;
    	$slide->name = $request->name;
    	$slide->link = $request->link;
    	$slide->content = $request->content;
    	if($request->hasFile('image')){
    	 	$file = $request->file('image');
    	 	$duoi = $file->getClientOriginalExtension();
    	 	if($duoi != 'jpeg' && $duoi != 'jpg' && $duoi != 'png'){
    	 		return redirect('admin/slide/add')->with('notify','File bạn chọn không phải hình ảnh');
    	 	}
    	 	$name=$file->getClientOriginalName();
    	 	$Hinh = str_random(4)."_".$name;
    	 	// Kiem tra file ton tai hay k
    	 	while(file_exists("upload/slide".$Hinh)){
    	 		$Hinh = str_random(4)."_".$name;
    	 	}
    	 	$file->move("upload/slide",$Hinh);
    	 	$slide->image = $Hinh;
    	 }
    	 else{
    	 	$slide->image= "";
    	 }
    	 $slide->save();
    	 return redirect('admin/slide/add')->with('notify','Add Slide is successfully');
    }
    public function getEditSlide($id){
    	$slide=Slide::find($id);
    	return view('admin.slide.edit',compact('slide'));
    }
    public function postEditSlide($id, Request $request){
    	$slide = Slide::find($id);
    	$slide->name = $request->name;
    	$slide->link = $request->link;
    	$slide->content = $request->content;
    	 if($request->hasFile('image')){
    	 	$file = $request->file('image');
    	 	$duoi = $file->getClientOriginalExtension();
    	 	if($duoi != 'jpeg' && $duoi != 'jpg' && $duoi != 'png'){
    	 		return redirect('admin/slide/edit/'.$id)->with('notify','File bạn chọn không phải hình ảnh');
    	 	}
    	 	$name=$file->getClientOriginalName();
    	 	$Hinh = str_random(4)."_".$name;
    	 	// Kiem tra file ton tai hay k
    	 	while(file_exists("upload/slide".$Hinh)){
    	 		$Hinh = str_random(4)."_".$name;
    	 	}
    	 	$file->move("upload/slide",$Hinh);
    	 	unlink("upload/slide/".$slide->image);
    	 	$slide->image = $Hinh;
    	 }
    	 $slide->save();
    	 return redirect('admin/slide/edit/'.$id)->with('notify','Bạn đã sua tin tức thành công');
    }
    public function getDeleteSlide($id){
    	$slide= Slide::find($id);
    	$slide->delete();
    	return redirect('admin/slide/list')->with('notify','Delete slide is successfully');
    }
}
