<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    public function delete(User $currentUser, User $user)
    {
        return $currentUser->id === $user->id;
    }
}
