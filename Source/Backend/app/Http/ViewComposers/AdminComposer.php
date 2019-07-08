<?php


namespace App\Http\ViewComposers;

use App\Models\Role;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class AdminComposer {


    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        if (Auth::check()){
            $name_role = Role::find(Auth::user())->first()->name_role;
            $view->with('name_role', $name_role);
        }
    }


}
