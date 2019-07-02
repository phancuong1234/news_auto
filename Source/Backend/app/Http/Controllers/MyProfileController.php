<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use App\Http\Controllers\Controller;
use App\Traits\Upload;

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
}
