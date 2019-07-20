<?php

namespace App\Providers;
use App\Models\Conformidades;
use App\User;

use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        
        //Política de Acesso para conformidades
        \App\Models\Conformidades::class => \App\Policies\ConformidadesPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(Gate $gate)
           
    {
        $this->registerPolicies($gate);

        //Definir acesso de usuários as conformidades
        
        /**
        $this->app[Gate::class]->define('conformidades-update', function(User $user, Conformidades $conformidades){
        
           return $user->id == $conformidades->user_id; 
            
            
        });
         * 
         */
    }
}
