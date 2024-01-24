<?php

namespace App\Policies;

use App\Models\Exam;
use App\Models\User;

class ExamPolicy
{
    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Exam $exam): bool
    {
        return $exam->user_id === $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Exam $exam): bool
    {
        return $exam->user_id === $user->id;
    }
}
