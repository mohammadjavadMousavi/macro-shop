<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Category' => 'App\Policies\CategoryPolicy',
        'App\Models\Comment' => 'App\Policies\CommentPolicy',
        'App\Models\Product' => 'App\Policies\ProductPolicy',
        'App\Models\Role' => 'App\Policies\RolePolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('create-category', [\App\Policies\CategoryPolicy::class , 'create']);

        Gate::define('read-comment', [\App\Policies\CommentPolicy::class , 'viewAny']);
        Gate::define('update-comment', [\App\Policies\CommentPolicy::class , 'update']);
        Gate::define('delete-comment', [\App\Policies\CommentPolicy::class , 'delete']);

        Gate::define('read-product', [\App\Policies\ProductPolicy::class , 'viewAny']);
        Gate::define('create-product', [\App\Policies\ProductPolicy::class , 'create']);
        Gate::define('update-product', [\App\Policies\ProductPolicy::class , 'update']);
        Gate::define('delete-product', [\App\Policies\ProductPolicy::class , 'delete']);

        Gate::define('read-role', [\App\Policies\RolePolicy::class , 'viewAny']);
        Gate::define('create-role', [\App\Policies\RolePolicy::class , 'create']);
        Gate::define('update-role', [\App\Policies\RolePolicy::class , 'update']);
        Gate::define('delete-role', [\App\Policies\RolePolicy::class , 'delete']);



        Gate::define('read-user', [\App\Policies\UserPolicy::class , 'viewAny']);
        Gate::define('create-user', [\App\Policies\UserPolicy::class , 'create']);
        Gate::define('delete-user', [\App\Policies\UserPolicy::class , 'delete']);



        // Gate::define('view-dashbord', [\App\Policies\PanelPolicy::class , 'viewAny']);
        
    }
}
