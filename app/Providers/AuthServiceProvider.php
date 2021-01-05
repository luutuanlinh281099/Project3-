<?php

namespace App\Providers;

use App\Product;
use App\Services\PermissionGateAndPolicyAccess;
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

        Gate::define('category', function ($user) {
            return $user->checkPermissionAccess('category');
        });
        Gate::define('brand', function ($user) {
            return $user->checkPermissionAccess('brand');
        });
        Gate::define('menu', function ($user) {
            return $user->checkPermissionAccess('menu');
        });
        Gate::define('slider', function ($user) {
            return $user->checkPermissionAccess('slider');
        });
        Gate::define('product', function ($user) {
            return $user->checkPermissionAccess('product');
        });
        Gate::define('user', function ($user) {
            return $user->checkPermissionAccess('user');
        });
        Gate::define('role', function ($user) {
            return $user->checkPermissionAccess('role');
        });
        Gate::define('setting', function ($user) {
            return $user->checkPermissionAccess('setting');
        });
        Gate::define('order', function ($user) {
            return $user->checkPermissionAccess('order');
        });
        Gate::define('ship', function ($user) {
            return $user->checkPermissionAccess('ship');
        });
        Gate::define('new', function ($user) {
            return $user->checkPermissionAccess('new');
        });
        Gate::define('permission', function ($user) {
            return $user->checkPermissionAccess('permission');
        });
    }
}
