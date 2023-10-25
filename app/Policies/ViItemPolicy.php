<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Viitem;
use Illuminate\Auth\Access\HandlesAuthorization;

class ViItemPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function view(User $user, Viitem $viItem)
    {
        return $user->departement_id === $viItem->departement_id;
    }
}
