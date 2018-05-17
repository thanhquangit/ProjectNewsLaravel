<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Category;
use App\Type;
use App\Comment;
class NewsController extends Controller
{
    public function getListNews(){
    	$news = News::all();
    	return view('admin.news.list', compact('news'));
    }
    public function getAddNews(){
    	$category = Category::all();
    	$type=Type::all();
    	return view('admin.news.add',compact('category','type'));
    }
    public function postAddNews(Request $request){
    	$this->validate($request,
    		[
    		],
    		[]);
    	$news = new News;
    	$news->title = $request->name;
    	$news->slug = changeTitle($request->name);
    	$news->summary = $request->summary;
    	$news->content = $request->content;
    	$news->type_id = $request->type;
    	$news->highlight = $request->highlight;
    	if($request->hasFile('image')){
    	 	$file = $request->file('image');
    	 	$duoi = $file->getClientOriginalExtension();
    	 	if($duoi != 'jpeg' && $duoi != 'jpg' && $duoi != 'png'){
    	 		return redirect('admin/news/add')->with('notify','File bạn chọn không phải hình ảnh');
    	 	}
    	 	$name=$file->getClientOriginalName();
    	 	$Hinh = str_random(4)."_".$name;
    	 	// Kiem tra file ton tai hay k
    	 	while(file_exists("upload/tintuc".$Hinh)){
    	 		$Hinh = str_random(4)."_".$name;
    	 	}
    	 	$file->move("upload/tintuc",$Hinh);
    	 	$news->image = $Hinh;
    	 }
    	 else{
    	 	$news->image= "";
    	 }
    	 $news->save();
    	 return redirect('admin/news/add')->with('notify','Add News is successfully');
    }
    public function getEditNews($id){
    	$news=News::find($id);
    	$category =Category::all();
    	$type=Type::all();
    	return view('admin.news.edit', compact('news', 'category','type'));
    }
    public function postEditNews($id, Request $request){
    	 $news = News::find($id);
    	 $news->title = $request->title;
    	 $news->slug = changeTitle($request->title);
    	 $news->type_id = $request->type;
    	 $news->summary = $request->summary;
    	 $news->content = $request->content;
    	 $news->highlight = $request->highlight;
    	 if($request->hasFile('image')){
    	 	$file = $request->file('image');
    	 	$duoi = $file->getClientOriginalExtension();
    	 	if($duoi != 'jpeg' && $duoi != 'jpg' && $duoi != 'png'){
    	 		return redirect('admin/news/edit/'.$id)->with('notify','File bạn chọn không phải hình ảnh');
    	 	}
    	 	$name=$file->getClientOriginalName();
    	 	$Hinh = str_random(4)."_".$name;
    	 	// Kiem tra file ton tai hay k
    	 	while(file_exists("upload/tintuc".$Hinh)){
    	 		$Hinh = str_random(4)."_".$name;
    	 	}
    	 	$file->move("upload/tintuc",$Hinh);
    	 	unlink("upload/tintuc/".$news->image);
    	 	$news->image = $Hinh;
    	 }
    	 $news->save();
    	 return redirect('admin/news/edit/'.$id)->with('notify','Bạn đã sua tin tức thành công');
    }
    public function getDeleteNews($id){
    	$news = News::find($id);
    	$news->delete();
    	return redirect('admin/news/list')->with('notify','Delete News is successfully');
   	}
   	public function getDeleteComment($idcomment, $idnews){
    	$comment=Comment::find($idcomment);
    	$comment->delete();
        return redirect('admin/news/edit/'.$idnews)->with('notify','Xóa comment Thành Công');
    }
}
