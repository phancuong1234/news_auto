<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\ProfileUserRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ModalRequest;
use App\Http\Controllers\Controller;
use App\Traits\Upload;
use Hash;
class MyProfileController extends Controller
{
    use Upload;
    public function index(){
        return view('admin_page.profile.index');
    }

    public function update(ProfileRequest $request, $id){
        $input = $request->all();
        unset($input['_method'],$input['_token']);
        if(count($input) <= 1){
            $input['image'] = $this->saveImg($input['file'],'/images/avatars/');
            $status = User::where('id', $id)->update(['image' => $input['image']]);
        }
        else {
            $status = User::where('id', $id)->update($input);
        }

        if($status){

            return redirect()->route('profile.index')->with('messageSuccess', trans('messages.user.edit.success'));
        } else {

            return redirect()->route('profile.index')->with('messageFail', trans('messages.user.edit.fail'));
        }
    }

    public function ajaxLoad(){
        return view('ajax.profile.loadform');
    }

    public function ChangeProfile(ProfileUserRequest $request , $id){
        $input = $request->all();
        if(isset($input['image'])){
            $input['image'] = $this->saveImg($input['image'],'images/avatars/');
        }

        $create = User::find($id)->update($input);
    }
    public function ChangePass(ModalRequest $request , $id){
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        if(Hash::check($input['oldpass'], Auth::user()->password)){
            $create = User::find($id)->update(['password' => $input['password']]);
            return "success";
        }
        else{
            return "fail";
        }

    }

}
