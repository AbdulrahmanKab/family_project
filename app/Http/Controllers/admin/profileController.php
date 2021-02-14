<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class profileController extends Controller
{
    public function index(){
        return view('admin.profile.index');
    }
    public function update(Request $request){
        $user = auth()->user();
        if ($request->hasFile('image')){
                $image= $request->file('image');
                $imageName= time().".".$image->getClientOriginalExtension();
                $path = public_path('/uploads/');
                $image->move($path,$imageName);
                $user->image = $imageName;
        }
        $user->name= $request->input('name');
        $user->email= $request->input('email');
        if ($request->hasFile('password')){
        $user->password = \Hash::make($request->input('password'));

        }
        $user->save();
        return response()->json(['status'=>true,'data'=>$user]);
    }
}
