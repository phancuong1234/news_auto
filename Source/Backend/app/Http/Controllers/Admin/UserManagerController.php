<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserManagerController extends Controller
{
    public function AdminManager()
    {
        $userAdmin = User::where('id_role', config('setting.role.admin'))->get();

        return view('admin_page.users.indexadmin',compact('userAdmin'));
    }
    
    public function ModManager()
    {
        $userMod = User::where('id_role',config('setting.role.mod'))->paginate(config('setting.paginate'));
       
        return view('admin_page.users.indexMod',compact('userMod'));
    }

    public function ViewerManager()
    {
        $viewer = User::where('id_role',config('setting.role.user'))->paginate(config('setting.paginate'));
        
        return view('admin_page.users.indexViewer',compact('viewer'));
    }

    public function getSearchViewerAjax($text){
        if(isset($text))
        {
            $list_viewer = User::where('username', 'LIKE', "%{$text}%")
                ->where('id_role',config('setting.role.user'))
                ->paginate(config('setting.paginate'));

            return view('ajax.admin.user.searchviewer', compact('list_viewer'));
        }
    }

    public function getSearchAjax($text)
    {
        if(isset($text))
        {
            $list_mod = User::where('username', 'LIKE', "%{$text}%")
                ->where('id_role',config('setting.role.mod'))
                ->paginate(config('setting.paginate'));

            return view('ajax.admin.user.search', compact('list_mod'));
        }
    }
}
