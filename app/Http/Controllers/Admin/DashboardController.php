<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
    public function profile()
    {
        $user=User::find(auth()->user()->id);
        return view('admin.profile',compact('user'));
    }
    public function User_update(Request $request,$id)
    {
        $this->validate($request,[
            'name'=>'nullable',
            'password'=>'nullable|confirmed'
        ]);
         $user=User::find($id);
         if($request->hasfile('image'))
         {
             $image = $request->file('image');
             $extension = $image->getClientOriginalExtension();
             $image_name = time().'.'.$extension;
             $image->move('img/user/',$image_name);
             $user->image ='/img/user/'.$image_name;
         }else{
             $user->name=$request->name;
             if($request->password!=NULL)
                 $user->password=$request->password;
         }
        $user->save();
        return redirect()->back()->with('success','Profile Image Updated Successfully');

    }
}
