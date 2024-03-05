<?php

namespace App\Actions\Classroom;

use App\Http\Requests\JoinRequest;
use App\Models\Classroom;
use App\Models\Scopes\UserClassroomScope;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class JoinClassroom
{
    public function __invoke(JoinRequest $request,Classroom $classroom)
    {

        $classroom->join(Auth::id(), $request->input('role', 'student'));

    }
}
