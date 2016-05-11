<?php

namespace App\Policies;

use App\User;
use App\Sign;
use Illuminate\Auth\Access\HandlesAuthorization;

class SignPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given user can delete the given sign.
     *
     * @param  User  $user
     * @param  Sign  $sign
     * @return bool
     */
    public function destroy(User $user, Sign $sign)
    {
        return $user->id === $sign->user_id;
    }
}
