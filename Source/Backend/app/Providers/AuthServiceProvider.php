<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
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
        //
    }
}
