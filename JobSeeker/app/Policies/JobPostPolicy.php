<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Jobpost;
use Illuminate\Auth\Access\Response;

class JobPostPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function create(User $user)
    {
        return $user->role === 'recruter'
            ? Response::allow()
            : Response::deny('Anda tidak diizinkan membuat job post.');
    }

    public function update(User $user, Jobpost $jobpost)
    {
        return $user->isAdmin() || $user->id === $jobpost->user_id
            ? Response::allow()
            : Response::deny('Anda tidak diizinkan mengedit jobpost ini.');
    }

    public function delete(User $user, Jobpost $jobpost)
    {
        return $user->isAdmin() || $user->id === $jobpost->user_id
            ? Response::allow()
            : Response::deny('Anda tidak diizinkan menghapus jobpost ini.');
    }
}
