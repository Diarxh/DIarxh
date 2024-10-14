<?php

namespace App\Policies;

use App\Models\User;

class UserDashboardPolicy
{
    /**
     * Create a new policy instance.
     */
    public function viewAny(User $user)
    {
        return $user->hasRole('guru');
    }

    public function __construct()
    {
        //
    }
}