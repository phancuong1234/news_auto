<?php

namespace App\Http\Controllers\Authentication;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()){
            return redirect()->route('dashboard.index');
        }
        else {
            return view('authentication.login');
        }
    }

    public function store(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        if(Auth::attempt(['username' => $username, 'password' => $password]))
        {
            if(auth()->user()->id_role == config('setting.role.admin'))
            {

                return redirect()->route('dashboard.index')->with('alert','Login success');
            } else {

                return redirect()->route('home-page')->with('alert','Login success');
            }
        } else {

            return redirect()->route('login.index')->with('alert','Username or Password is invalid');
        }
    }

    public function create()
    {

        Auth::logout();

        return redirect()->route('login.index');
    }
}
