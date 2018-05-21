<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Category;
use App\User;
use App\Comment;
use App\News;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{

    public function index(){
    	$slide = Slide::orderBy('id','desc')->take(3)->get();
    	$category = Category::all();
    	return view('layout.index', compact('slide','category'));
    }
    public function getRegister(){
    	return view('layout.register');
    }
    public function postRegister(Request $req){
    	$this->validate($req,
    		[
    			'name'=>'required',
    			'email'=>'required|email|unique:users,email',
    			'password'=>'required',
    			'passwordAgain'=>'required|same:password'
    		],
    		[
				'name.required'=>'Ban chua nhap ten',
                'email.required'=>'Ban chua nhập email',
                'email.unique'=>'Email đã tồn tại',
                'email.email'=>'Emailko dung dinh dang',
                'password.required'=>'Bạn chưa nhập mật khẩu',
                'passwordAgain.required'=>' Bạn chưa nhập lại mật khẩu',
                'passwordAgain.same'=>'Mật khẩu nhập lại không khớp'
    		]);
    	$user = new User;
    	$user->name =$req->name;
    	$user->email = $req->email;
    	$user->password=bcrypt($req->password);
    	$user->level = 0;
    	$user->save();
    	return redirect('login')->with('notify','Register is sucessfully');
    }
    public function getLogin(){
    	return view('layout.login');
    }
    public function postLogin(Request $req){
    	$this->validate($req,
    		[
    			'email'=>'required|email',
    			'password'=>'required'
    		],
    		[
    			'email.required'=>'Bạn chưa nhập Email',
    			'email.email'=>'Email của bạn không đúng định dạng',
    			'password.required'=>'Bạn chưa nhập mật khẩu'
    		]);
    	if(Auth::attempt(['email'=>$req->email,'password'=>$req->password]))
            {
               return redirect('/'); 
            }

        else
        	return redirect('login')->with('notify','Dang nhap khong thanh cong');
    }
    public function getLogout(){
    	 Auth::logout();
        return redirect('/login'); 
    }
    public function getAccount(){
    	return view('layout.account');
    }
    public function postAccount(Request $req){
    	$this->validate($req,
    		[
    			'name'=>'required'
    		],
    		[
    			'name.required'=>'Tên không được bỏ trống'
    		]);
    	$user=Auth::user();
    	$user->name = $req->name;
    	if($req->checkpassword == "on"){
    		$this->validate($req,
    		[
    			'password'=>'required',
    			'passwordAgain'=>'required|same:password'
    		],
    		[
    			'password.required'=>'Mật khẩu không được để trống',
    			'passwordAgain.required'=>'Mật khẩu nhập lại không được để trống',
    			'passwordAgain.same'=>'Mật khẩu nhập lại không khớp'
    		]);
    		$user->password = bcrypt($req->password);
    	}
    	$user->save();
    	return redirect('account')->with('notify','Change Account is successfully');
    }
    public function postComment($id,Request $req){
    	$this->validate($req,
    		[
    			'content'=>'required'
    		],
    		[
    			'content.required'=>'Nội dung bình luận không được để trống'
    		]);
    	$comment = new Comment;
    	$comment->content = $req->content;
    	$comment->users_id = Auth::user()->id;
    	$comment->news_id = $id;
    	$comment->save();
    	return redirect('detail/'.$id)->with('notify','Bạn đã bình luận thành công');
    }
    public function postSearch(Request $req){
    	$key = $req->key;
    	$category=Category::all();
    	$news = News::where('title','like',"%$key%")->orWhere('summary','like',"%$key%")->orWhere('content','like',"%$key%")->paginate(10);
    	return view('layout.layout.search',compact('key','news','category'));
    }
}
