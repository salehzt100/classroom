<?php

namespace App\Http\Controllers;

use App\Actions\Classroom\ClassroomPeopleDestroy;
use App\Http\Requests\Classroom\ClassroomPeopleDestroyRequest;
use App\Models\Classroom;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ClassroomPeopleController extends Controller
{
    public function index(Classroom $classroom): Renderable
    {

        return View::make('classrooms.people', compact('classroom'));
    }

    public function destroy(ClassroomPeopleDestroyRequest $request, ClassroomPeopleDestroy $destroy, Classroom $classroom)
    {

        $user_id = $request->input('user_id');

        $destroy($user_id, $classroom);

        return redirect()
            ->route('classrooms.people', $classroom->id)
            ->with('success', 'user removed!');
    }

}
