<?php

namespace App\Policies;

use App\Models\Classroom;
use App\Models\Classwork;
use App\Models\Scopes\UserClassroomScope;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ClassworkPolicy
{

    public function before(User $user, $ability)
    {
//        if ($user->super_admin)
//        {
//            return true;
//        }
    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user, Classroom $classroom): bool
    {
        return $user
            ->classrooms()
            ->wherePivot('classroom_id', '=', $classroom->id)
            ->exists();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Classwork $classwork): bool
    {
        $isTeacher = $user
            ->classrooms()
            ->wherePivot('role', '=', 'teacher')
            ->exists();

        $isAssigned = $user
            ->classworks()
            ->wherePivot('classwork_id', '=', $classwork->id)
            ->exists();
        return $isTeacher || $isAssigned;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user, Classroom $classroom): Response
    {
        $result = $user
            ->classrooms()
            ->withoutGlobalScope(UserClassroomScope::class)
            ->wherePivot('classroom_id', '=', $classroom->id)
            ->wherePivot('role', '=', 'teacher')
            ->exists();

        return $result
            ? Response::allow()
            : Response::deny("you aren't a teacher in this classroom");

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Classwork $classwork): bool
    {
        return $classwork->user_id == $user->id;

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Classwork $classwork): bool
    {
        return $classwork->user_id == $user->id;

    }

    /**
     * Determine whether the user can restore the model.
     */

}
