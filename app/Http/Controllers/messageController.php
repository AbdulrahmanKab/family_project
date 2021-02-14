<?php

namespace App\Http\Controllers;

use App\messages;
use Illuminate\Http\Request;

class messageController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()){
            $content = messages::OrderBy("id",'desc')->paginate(20);
            return view('admin.message.paginate',compact('content'));
        }
        $content = messages::OrderBy("id",'desc')->paginate(20);
        return view('admin.message.index',compact('content'));
    }
    public function delete($id){
        $content= messages::findOrFail($id);
        $content->delete();
        return response()->json(['status'=>true]);
    }
}
