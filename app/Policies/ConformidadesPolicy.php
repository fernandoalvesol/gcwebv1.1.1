<?php

namespace App\Policies;

use App\User;
use App\Models\Conformidades;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConformidadesPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    
    public function conformidadesUpdate(User $user, Conformidades $conformidades){
        
        return $user->id == $conformidades->user_id;
        
    }
}
