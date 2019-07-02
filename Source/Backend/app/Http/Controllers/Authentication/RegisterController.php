<?php

namespace App\Http\Controllers\Authentication;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('authentication.register');
    }

    public function store(Request $request){
        $input = $request->all();
        $passNotEncrypt = $input['password'];
        $input['password'] = Hash::make($input['password']);
        $input['id_role'] = config('setting.role.user');
        $status = User::create($input);
        if($status){
            if (Auth::attempt(['username' => $input['username'], 'password' => $passNotEncrypt])){

                return redirect()->route('home.index')->with('messageSuccess', trans('messages.user.register.success'));
            }
        } else {

            return redirect()->route('register.index')->with('messageFail', trans('messages.user.register.fail'));
        }

    }
}
