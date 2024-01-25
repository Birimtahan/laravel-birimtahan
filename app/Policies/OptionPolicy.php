<?php

namespace App\Policies;

use App\Models\Section;
use App\Models\Option;
use App\Models\User;

class OptionPolicy
{
    /**
     * Determine whether the user can create models.
     */
    public function create(User $user, Section $section): bool
    {
        return $section->exam->user_id === $user->id;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Option $option): bool
    {
        return $option->section->exam->user_id === $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Option $option): bool
    {
        return $option->section->exam->user_id === $user->id;
    }
}
