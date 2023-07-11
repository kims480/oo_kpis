<?php

namespace App\Policies;

use App\Models\Storm;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StormPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {

    }

    public function view(User $user, Storm $storm): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, Storm $storm): bool
    {
    }

    public function delete(User $user, Storm $storm): bool
    {
    }

    public function restore(User $user, Storm $storm): bool
    {
    }

    public function forceDelete(User $user, Storm $storm): bool
    {
    }
}
