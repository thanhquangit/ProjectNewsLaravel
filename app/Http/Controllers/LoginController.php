<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function getLogin(){
    	return view('admin.login.login');
    }
    public function postLogin(Request $request){
    	$this->validate($request,
    		[
    			'email'=>'required|email',
    			'password'=>'required|min:6|max:20'
    		],
    		[
    			'email.required'=>'Email is not empty',
    			'email.email'=>'Email Khong dung dinh dang',
    			'password.required'=>'Mat khau khong duic de trong',
    			'password.min'=>'Mat khau phai toi thieu 6 ky tu',
    			'password.max'=>'Mat khau dai toi da 20 ky tu'
    		]);

    	if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
    		return redirect('admin/category/list');
    	}
    	else{
    		return redirect('admin/login')->with('notify','Error');
    	}
    }
}
