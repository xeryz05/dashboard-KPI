<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Veitem;
use Illuminate\Auth\Access\HandlesAuthorization;

class VeItemPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function view(User $user, Veitem $veItem)
    {
        return $user->departement_id === $veItem->departement_id;
    }
}
