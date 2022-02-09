<?php

namespace App\Policies;

use App\Models\HeaderTransaction;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CustomerPolicy
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

    public function customer(User $user) {
        return $user->is_manager === false;
    }

    public function transaction(User $user, HeaderTransaction $transaction) {
        return $user->id === $transaction->user_id;
    }
}
