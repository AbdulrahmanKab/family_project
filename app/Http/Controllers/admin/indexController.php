<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\person;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class indexController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()){
            $persons = person::OrderBy('id','desc')->select('id','first_name','photo','family_name','region')->paginate(20);
            return view('admin.paginate',compact('persons'));
        }
        $persons = person::OrderBy('id','desc')->select('id','first_name','photo','family_name','region')->paginate(20);
       return view('admin.index',compact('persons'));
    }
    public function create(Request $request){
 $validation = [
     'first_name'=>'required',
     'second_name'=>'required',
     'third_name'=>'required',
     'family_name'=>'required',
     'mother_name'=>'required',
     'family_mother'=>'required',
     'famous_name'=>'required',
     'birthday'=>'required',
     'mother_nationality'=>'required',
     'gender'=>'required',
     'country'=>'required',
     'brief'=>'required',
     'city'=>'required',
     'region'=>'required',

     'mobile'=>'required',
     'phone'=>'required',
     'description'=>'required',
     'his_job'=>'required',
 ];
        if ($request->has("id_dead")){
            $validation+= [ 'dead_date'=>'required',
                'dead_country'=>'required',
                'dead_place'=>'required',
                'dead_reason'=>'required',];
        }
    $request->validate($validation);
    $person = new person();
    $person->first_name =$request->input('first_name');
    $person->second_name=$request->input('second_name');
    $person->third_name=$request->input('third_name');
    $person->family_name=$request->input('family_name');
    $person->mother_name=$request->input('mother_name');
    $person->mother_family=$request->input('family_mother');
    $person->famous_name=$request->input('famous_name');
    $person->birthday= date('Y-m-d',strtotime($request->input('birthday')));
    $person->mother_national=$request->input('mother_nationality');
    $person->gender=$request->input('gender');
    $person->country=$request->input('country');
    $person->briefness=$request->input('brief');
    $person->city=$request->input('city');
    $person->region=$request->input('region');
    $person->dead_date=date('Y-m-d',strtotime($request->input('dead_date')));
    $person->dead_region=$request->input('dead_place');
    $person->dead_country=$request->input('dead_country');
    $person->dead_reason=$request->input('dead_reason');
    $person->mobile=$request->input('mobile');
    $person->phone=$request->input('phone');
    $person->description=$request->input('description');
    $person->his_job=$request->input('his_job');
    if($request->hasFile('photo')){
        $image  = $request->file('photo');
        $imageName = time().".".$image->getClientOriginalExtension();
        $path = public_path('/uploads/');
        $image->move($path,$imageName);
        $person->photo = $imageName;
    }
    $person->save();
        return response()->json(['status'=>true]);
    }
    public function show($id){
        try{
            $person = person::findOrFail($id);
            return response()->json(['data' => $person, 'status' => true]);
        }catch (ModelNotFoundException $exception){
            return response()->json(['status' => false]);
        }
    }

    public function update(Request $request,$id){
        $validation_update =[
            'first_name'=>'required',
            'second_name'=>'required',
            'third_name'=>'required',
            'family_name'=>'required',
            'mother_name'=>'required',
            'family_mother'=>'required',
            'famous_name'=>'required',
            'birthday'=>'required',
            'mother_nationality'=>'required',
            'gender'=>'required',
            'country'=>'required',
            'brief'=>'required',
            'city'=>'required',
            'region'=>'required',

            'mobile'=>'required',
            'phone'=>'required',
            'description'=>'required',
            'his_job'=>'required',
        ];
        if ($request->has("id_dead")){
            $validation_update+= [ 'dead_date'=>'required',
                'dead_country'=>'required',
                'dead_place'=>'required',
                'dead_reason'=>'required',];
        }
        $request->validate($validation_update);
        try{
            $person = person::findOrFail($id);
            $person->first_name =$request->input('first_name');
            $person->second_name=$request->input('second_name');
            $person->third_name=$request->input('third_name');
            $person->family_name=$request->input('family_name');
            $person->mother_name=$request->input('mother_name');
            $person->mother_family=$request->input('family_mother');
            $person->famous_name=$request->input('famous_name');
            $person->birthday= date('Y-m-d',strtotime($request->input('birthday')));
            $person->mother_national=$request->input('mother_nationality');
            $person->gender=$request->input('gender');
            $person->country=$request->input('country');
            $person->briefness=$request->input('brief');
            $person->city=$request->input('city');
            $person->region=$request->input('region');
            $person->dead_date=date('Y-m-d',strtotime($request->input('dead_date')));
            $person->dead_region=$request->input('dead_place');
            $person->dead_country=$request->input('dead_country');
            $person->dead_reason=$request->input('dead_reason');
            $person->mobile=$request->input('mobile');
            $person->phone=$request->input('phone');
            $person->description=$request->input('description');
            $person->his_job=$request->input('his_job');
            if($request->hasFile('photo')){
                $image  = $request->file('photo');
                $imageName = time().".".$image->getClientOriginalExtension();
                $path = public_path('/uploads/');
                $image->move($path,$imageName);
                $person->photo = $imageName;
            }
            $person->update();
            return response()->json(['status' => true]);
        }catch (ModelNotFoundException $exception){
            return response()->json(['status' => false]);
        }

    }
    public function addSon(Request $request){
        $validation_update =[
            'first_name'=>'required',
            'second_name'=>'required',
            'third_name'=>'required',
            'family_name'=>'required',
            'mother_name'=>'required',
            'family_mother'=>'required',
            'famous_name'=>'required',
            'birthday'=>'required',
            'mother_nationality'=>'required',
            'gender'=>'required',
            'country'=>'required',
            'brief'=>'required',
            'city'=>'required',
            'region'=>'required',

            'mobile'=>'required',
            'phone'=>'required',
            'description'=>'required',
            'his_job'=>'required',
        ];
        if ($request->has("id_dead")){
            $validation_update+= [ 'dead_date'=>'required',
                'dead_country'=>'required',
                'dead_place'=>'required',
                'dead_reason'=>'required',];
        }
        $request->validate($validation_update);
        try{
            $parent = person::findOrFail($request->input("parent_id"));
        }catch (ModelNotFoundException $exception){
            return response()->json(['status'=>false]);
        }
        $person = new person();
        $person->first_name =$request->input('first_name');
        $person->second_name=$request->input('second_name');
        $person->third_name=$request->input('third_name');
        $person->family_name=$request->input('family_name');
        $person->mother_name=$request->input('mother_name');
        $person->mother_family=$request->input('family_mother');
        $person->famous_name=$request->input('famous_name');
        $person->birthday= date('Y-m-d',strtotime($request->input('birthday')));
        $person->mother_national=$request->input('mother_nationality');
        $person->gender=$request->input('gender');
        $person->country=$request->input('country');
        $person->briefness=$request->input('brief');
        $person->city=$request->input('city');
        $person->region=$request->input('region');
        $person->dead_date=date('Y-m-d',strtotime($request->input('dead_date')));
        $person->dead_region=$request->input('dead_place');
        $person->dead_country=$request->input('dead_country');
        $person->dead_reason=$request->input('dead_reason');
        $person->mobile=$request->input('mobile');
        $person->phone=$request->input('phone');
        $person->description=$request->input('description');
        $person->his_job=$request->input('his_job');
        if($request->hasFile('photo')){
            $image  = $request->file('photo');
            $imageName = time().".".$image->getClientOriginalExtension();
            $path = public_path('/uploads/');
            $image->move($path,$imageName);
            $person->photo = $imageName;
        }

        $person->parent_id = $parent->id;
        $person->save();
        return response()->json(['status'=>true]);

    }
    public function delete($id){
        try {
            $person = person::findOrFail($id);
            $person->delete();
            return response()->json(['status'=>true]);
        }
        catch (ModelNotFoundException $exception){
            return response()->json(['status'=>false]);
        }
    }

    public function tree($id){

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
    }

    public function  trees(){
        $z = person::WhereNull('parent_id')->first(['photo as head','id',\DB::raw("CONCAT(first_name,' ',second_name,' ',third_name,' ',family_name) AS contents")]);
        if($z){
            $y =  person::Where('parent_id',$z->id)->get(['photo as head','id',\DB::raw("CONCAT(first_name,' ',second_name,' ',third_name,' ',family_name) AS contents")]);
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
                $s['children'] = person::Where('parent_id', $s->id)->get(['photo as head','id', \DB::raw("CONCAT(first_name,' ',second_name,' ',third_name,' ',family_name) AS contents")]);
                if ($s['children'] and count($s['children']) > 0) {
                    self::getChildren($s['children']);
                }
            }
            return $x;
        }

    }

}
