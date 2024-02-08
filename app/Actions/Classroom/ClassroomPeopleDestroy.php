<?php

namespace App\Actions\Classroom;

use App\Models\Classroom;
use Illuminate\Http\RedirectResponse;

class ClassroomPeopleDestroy
{

    public function __invoke(string $user_id ,Classroom $classroom)
    {
        if ($user_id== $classroom->user_id){
            return redirect()
                ->route('classrooms.people',$classroom->id)
                ->with('error','Cant remove user!');
        }

        $classroom->users()->detach($user_id);
    }

}
