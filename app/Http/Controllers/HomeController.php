<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Category;
use App\User;
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
    	$user=Auth::user();
    	$user->name = $req->name;
    	if($req->checkpassword == "on"){
    		$user->password = bcrypt($req->password);
    	}
    	$user->save();
    	return redirect('account')->with('notify','Change Account is successfully');
    }
}
