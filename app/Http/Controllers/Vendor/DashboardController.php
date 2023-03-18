<?php

namespace App\Http\Controllers\Vendor;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('vendor.dashboard');
    }

    public function profile()
    {
        $user=User::find(auth()->user()->id);
        return view('vendor.profile',compact('user'));
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
                 $user->password=Hash::make($request->password);
         }
        $user->save();
        return redirect()->back()->with('success','Profile Image Updated Successfully');

    }

}
