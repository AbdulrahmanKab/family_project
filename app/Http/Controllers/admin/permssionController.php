<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class permssionController extends Controller
{
    public function index(){
        $users = User::select('name','id','email')->get();
        return view('admin.permissions.index',compact('users'));
    }
    public function getPermission($id){
        $user =User::findOrFail($id)->getAllPermissions()->toArray();
        return \response()->json(['data'=>$user]);
    }

    public function setPermission(Request $request){
        try {
            $user = User::findOrFail($request->input('id'));
            $user->revokePermissionTo('view_person');
            $user->revokePermissionTo('add_person');
            $user->revokePermissionTo('edit_person');
            $user->revokePermissionTo('super_admin');
            $user->revokePermissionTo('delete_person');
            if ($request->has('view_person')){
                $user->givePermissionTo('view_person');
            }
            if ($request->has('add_person')){
                $user->givePermissionTo('add_person');

            }

            if ($request->has('edit_person')){
                $user->givePermissionTo('edit_person');
            }
            if ($request->has('delete_person')){
                $user->givePermissionTo('delete_person');
            }

            if ($request->has('super_admin')){
                $user->givePermissionTo('super_admin');
            }

        }catch (ModelNotFoundException $exception){

        }


    }
    public function rules(){
        return["name" =>'required',"email" =>'required|email',"password" =>'required'];
    }
    public function addUser(Request $request){
        $validator = Validator::make($request->all(), $this->rules());
        if ($validator->fails())
        {
            return \response()->json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ), 400);

        }
        $user = User::create([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'password'=>\Hash::make($request->input('password')),
        ]);
        $users = User::select('name','id','email')->get();
        return view('admin.permission.pagination_data',compact('users'));
    }
    public function delete($id){
        $user = User::findOrFail($id);
        $user->delete();
        return \response()->json([]);
    }
    public function changepass(Request $request){
        if ($request->input('change_password') == $request->input('confirm')){

            $user = User::findOrFail($request->input('change_id'));
            $user->password = \Hash::make($request->input('change_password'));
            $user->update();
            return \response()->json(['code'=>'200']);
        }
        else{
            return \response()->json(['code'=>'404','data'=>'password must be equals']);
        }


    }

}
