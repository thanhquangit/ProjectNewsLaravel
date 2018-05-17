<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
class UsersController extends Controller
{
    public function getListUser(){
    	$users = User::all();
    	return view('admin.users.list', compact('users'));
    }
    public function getAddUser(){
    	return view('admin.users.add');
    }

    public function postAddUser(Request $request){
    	$users = new User;
    	$users->name = $request->name;
    	$users->email = $request->email;
    	$users->password = bcrypt($request->password);
    	$users->level = $request->level;
    	$users->save();
    	return redirect('admin/users/add')->with('notify','Add Users is sucessfully');
    }
    public function getEditUser($id){
    	$users = User::find($id);
    	return view('admin.users.edit', compact('users'));
    }
    public function postEditUser($id, Request $request){
    	$users = User::find($id);
    	$users->level = $request->level;
    	$users->save();
    	return redirect('admin/users/edit/'.$id)->with('notify','Edit User is sucessfully');
    }
    public function getDeleteUser($id){
        $users = User::find($id);
        $users->delete();
        return redirect('admin/users/list')->with('notify','Delete users is sucessfully');
    }
}
