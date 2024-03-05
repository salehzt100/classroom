<?php

namespace App\Http\Controllers;

use App\Actions\Classroom\CheckUserIsExistInClassroom;
use App\Actions\Classroom\GetClassroomWithoutGlobalScope;
use App\Actions\Classroom\JoinClassroom;
use App\Http\Requests\JoinRequest;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class JoinClassroomController extends Controller
{
    public function create(GetClassroomWithoutGlobalScope $get_classroom, CheckUserIsExistInClassroom $exists, string $id):Renderable | RedirectResponse
    {

        $classroom = $get_classroom($id);

        try {
            $exists( $classroom, Auth::id());

        } catch (Exception $e) {
            return redirect()->route('classrooms.show', $id);
        }
        return view('classrooms.join', compact('classroom'));
    }

    public function store(JoinRequest $request, GetClassroomWithoutGlobalScope $get_classroom,JoinClassroom $join,string $id) :RedirectResponse
    {

        $classroom = $get_classroom($id);

        try {

            $join($request,$classroom);

        } catch (\Exception $e) {
            return redirect()->route('classrooms.show', $id);
        }

        return redirect()->route('classrooms.show', $id);

    }


}
