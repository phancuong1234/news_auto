<?php

namespace App\Http\Controllers\Authentication;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;

class LoginController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            if(auth()->user()->active == config('setting.is_active.active'))
            {
                return redirect()->route('home-page');
            }
            else
            {
                Auth::logout();
                return redirect()->route('login.index')->with('alert',trans('messages.login.lock-user'));
            }
        }else{
            return view('authentication.login');
        }

    }

    public function store(LoginRequest $request)
    {
        $username = $request->username;
        $password = $request->password;
       
        if(Auth::attempt(['username' => $username, 'password' => $password]))
        {   
            if(auth()->user()->active == config('setting.is_active.active'))
            {
                if(auth()->user()->id_role == config('setting.role.admin') || auth()->user()->id_role == config('setting.role.editor') || auth()->user()->id_role == config('setting.role.mod'))
                {
                    return redirect()->route('dashboard.index')->with('alert',trans('messages.login.success'));
                } else {

                    return redirect()->route('home-page')->with('alert',trans('messages.login.success'));
                }
            }
            else {
                Auth::logout();
                return redirect()->route('login.index')->with('alert',trans('messages.login.lock-user'));
            }
        } else {

            return redirect()->route('login.index')->with('alert',trans('messages.login.wrong-pass'));
        }
    }
    public function create()
    {
        Auth::logout();
        return redirect()->route('login.index');
    }
}
