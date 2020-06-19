<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\DB;
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

        Gate::define('watchOutlay', function ($user, $id) {
        $accessUser = collect(DB::table('powers')->where('name_outlay_id', $id)->where('user_id', $user->id)->pluck('look_outlay'));
          if($accessUser[0] == 1){
            return true;
          }else{
            return false;
          }
        });
        Gate::define('deleteOutlay', function ($user, $id) {
          $accessUser = collect(DB::table('powers')->where('name_outlay_id', $id)->where('user_id', $user->id)->pluck('delete_outlay'));
          if($accessUser[0] == 1){
            return true;
          }else{
            return false;
          }
        });
        Gate::define('updateOutlay', function ($user, $id) {
          $accessUser = collect(DB::table('powers')->where('name_outlay_id', $id)->where('user_id', $user->id)->pluck('update_outlay'));
          if($accessUser[0] == 1){
            return true;
          }else{
            return false;
          }
        });
    }
}
