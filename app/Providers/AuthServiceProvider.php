<?php

namespace App\Providers;

use App\Models\HeaderTransaction;
use App\Models\Keyboard;
use App\Models\KeyboardCategory;
use App\Policies\CustomerPolicy;
use App\Policies\ManagerPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Keyboard::class => ManagerPolicy::class,
        KeyboardCategory::class => ManagerPolicy::class,
        HeaderTransaction::class => CustomerPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
