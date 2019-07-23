<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        //check accont login admin page
        Gate::define('login-admin', function($user){
            return $user->id_role != config("setting.role.user");
        });
        //phân quyền admin
        Gate::define('admin', function($user){
            return $user->id_role == config("setting.role.admin");
        });
        //phân quyền mod
        Gate::define('mod', function($user){
            return $user->id_role == config("setting.role.mod");
        });
        //phân quyền editor
        Gate::define('editor', function($user){
            return $user->id_role != config("setting.role.editor");
        });
        //phân quyền add article (mod)
        Gate::define('add-article', function($user){
            $function = Auth::user()->function;
            $AllowAdd = substr($function,config('setting.function.add'),config('setting.function.cut'));
            return $AllowAdd == config('setting.function.allow');
        });
        //phân quyền edit article (mod)
        Gate::define('edit-article', function($user){
            $function = Auth::user()->function;
            $AllowAdd = substr($function,config('setting.function.edit'),config('setting.function.cut'));
            return $AllowAdd == config('setting.function.allow');
        });
        //phân quyền del article (mod)
            Gate::define('del-article', function($user){
                $function = Auth::user()->function;
                $AllowAdd = substr($function,config('setting.function.del'),config('setting.function.cut'));
                return $AllowAdd == config('setting.function.allow');
        });
    }
}
