<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        //Просмотр
        Gate::define('watchOutlay', function ($user, $id) {
          if($user->id == $id[0]['user_id']){
            return true;
          }else{
            return false;
          }
        });
        Gate::define('deleteOutlay', function ($user, $id) {

          if($user->id == $id[0]['user_id']){
            return true;
          }else{
            return false;
          }
        });
        Gate::define('updateOutlay', function ($user, $id) {
          if($user->id == $id[0]['user_id']){
            return true;
          }else{
            return false;
          }
        });
    }
}
