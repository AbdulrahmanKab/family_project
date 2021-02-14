<?php

namespace App\Http\Controllers;

use App\messages;
use App\person;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index(){
        return view('index');
    }
    public function tree(){
        return view('tree');
    }

/*    public function tree($id){

        $z = person::WhereNull('parent_id')->first(['image as head','id',\DB::raw("CONCAT(first_name,' ',second_name,' ',third_name,' ',family_name) AS contents")]);
        if($z){
            $y =  person::Where('parent_id',$z->id)->get(['image as head','id',\DB::raw("CONCAT(first_name,' ',second_name,' ',third_name,' ',family_name) AS contents")]);
            if($y and count($y) > 0) {
//                return $z;
                $z['children'] = self::getChildren($y);
            }
        }
//        return $z;
//        $zz = json_decode($zz);
        return view("tree",compact('z'));
    }*/

    public function  trees(){
        $z = person::WhereNull('parent_id')->first(['photo as head','id', 'first_name as contents']);
        if($z){
            $y =  person::Where('parent_id',$z->id)->get(['photo as head','id', 'first_name as contents']);
            if($y and count($y) > 0) {
//                return $z;
                $z['children'] = self::getChildren($y);
            }
        }
        return response()->json(['status'=>true,'data'=>$z]);
    }

    public function  getChildren($x){
        if($x) {
            foreach ($x as $s) {
                $s['children'] = person::Where('parent_id', $s->id)->get(['photo as head','id', 'first_name as contents']);
                if ($s['children'] and count($s['children']) > 0) {
                    self::getChildren($s['children']);
                }
            }
            return $x;
        }

    }
    public function sendContact(Request $request){
        $request->validate(['name'=>'required',
            'last_name'=>'required'
            ,'email'=>['required','regex:/gmail|outlook|hotmail|yahoo/']
            ,'subject'=>'required',
            'message'=>'required'
        ],['email.regex'=>'email must be valid email']);
        $message = new messages();
        $message->name = $request->input('name');
        $message->last_name = $request->input('last_name');
        $message->email = $request->input('email');
        $message->message = $request->input('message');
        $message->subject = $request->input('subject');
        $message->save();

        return response()->json(['status'=>true]);
    }
}
