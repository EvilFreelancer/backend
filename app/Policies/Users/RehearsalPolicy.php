<?php

namespace App\Policies\Users;

use App\Models\Band;
use App\Models\User;
use App\Models\Rehearsal;
use Illuminate\Auth\Access\HandlesAuthorization;

class RehearsalPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can book the rehearsal.
     *
     * User can book rehearsal on behalf of a band only if he is
     * the admin of that band
     *
     * @param User $user
     * @param Band $band
     * @return bool
     */
    public function createOnBehalfOfBand(User $user, Band $band): bool
    {
        return $band->admin_id === $user->id;
    }

    /**
     * Determine whether the user can delete the rehearsal.
     *
     * @param User $user
     * @param Rehearsal $rehearsal
     * @return mixed
     */
    public function delete(User $user, Rehearsal $rehearsal)
    {
        return $user->id === $rehearsal->user_id;
    }
}
