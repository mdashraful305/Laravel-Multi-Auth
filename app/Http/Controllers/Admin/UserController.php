<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users=User::all();
        return view('admin.user.index',compact('users'));
    }

    public function create()
    {
        $role=Role::all();
        return view('admin.user.create',compact('role'));
    }

    public function store(Request $request){

        $this->validate($request,[
            'name'=>'required',
            'username'=>'required|unique:users',
            'email'=>'required|unique:users',
            'password'=>'required',

        ]);
        $user=new User();
        $user->username=$request->username;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->role_id=$request->role;
        $user->password=Hash::make($request->password);
        $user->save();
        return redirect()->route('admin.user.index')->with('success','User Created Successfully');
    }

    public function edit($id)
    {
        $user=User::find($id);
        $role=Role::all();
        return view('admin.user.edit',compact('user','role'));
    }

    public function update($id,Request $request)
    {
        $user=User::find($id);
        $user->name=$request->name;
        $user->role_id=$request->role;
        if($request->password!=NULL)
             $user->password=Hash::make($request->password);
        $user->save();
        return redirect()->route('admin.user.index')->with('success','User Updated Successfully');
    }

    public function destroy($id)
    {
        $user=User::find($id);
        $user->delete();
        return redirect()->route('admin.user.index')->with('success','User Deleted Successfully');
    }
}
