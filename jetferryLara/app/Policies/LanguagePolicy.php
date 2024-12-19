<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Language;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class LanguagePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Language $language): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user, Language $language): bool
    {
        if ($user->role == 'admin') {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Language $language): bool
    {
        if ($user->role == 'admin') {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Language $language): bool
    {
        if ($user->role == 'admin') {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Language $language): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Language $language): bool
    {
        return false;
    }
}
