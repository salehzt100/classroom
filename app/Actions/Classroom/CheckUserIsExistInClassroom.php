<?php

namespace App\Actions\Classroom;

use App\Models\Classroom;

class CheckUserIsExistInClassroom
{
    public function __invoke(Classroom $classroom, $user_id)
    {

        $exists = $classroom->users()
            ->where('id', '=', $user_id)
            ->exists();

        if ($exists) {
            throw new \Exception('this user joined in this classroom');
        }

        return true;

    }
}
