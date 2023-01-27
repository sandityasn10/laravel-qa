<?php

namespace App\Policies;

use App\Models\User;
use App\Models\question;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuestionPolicy
{
    use HandlesAuthorization;


    public function update(User $user, question $question)
    {
        return $user->id === $question->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\question  $question
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, question $question)
    {
        return $user->id === $question->user_id && $question->answers < 1;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\question  $question
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, question $question)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\question  $question
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, question $question)
    {
        //
    }
}
