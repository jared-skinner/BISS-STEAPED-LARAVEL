<?php

namespace App\Repositories;

use App\User;
use App\Sign;

class SignRepository
{
    /**
     * Get all of the signs for a given user.
     *
     * @param  User  $user
     * @return Collection
     */
    public function forUser(User $user)
    {
        return Sign::where('user_id', $user->id)
                    ->orderBy('created_at', 'asc')
                    ->get();
    }
}
