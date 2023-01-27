<?php

namespace App\Providers;

use App\Models\User;
use App\Models\question;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('update-question',function(User $user, question $question){
            return $user->id === $question->user_id;
        });
        Gate::define('delete-question',function(User $user, question $question){
            return $user->id === $question->user_id;
        });
    }
}
