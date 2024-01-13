<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ClassroomPeopleController extends Controller
{
    public function index(Classroom $classroom):Renderable
    {

        return View::make('classrooms.people',compact('classroom'));
    }

    public function destroy(Request $request,Classroom $classroom)
    {
        $request->validate([
            'user_id'=>'required'
        ]);
        $user_id=$request->input('user_id');
        if ($user_id== $classroom->user_id){
            return redirect()
                ->route('classrooms.people',$classroom->id)
                ->with('error','Cant remove user!');
        }
        $classroom->users()->detach($request->input('user_id'));

        return redirect()
            ->route('classrooms.people',$classroom->id)
            ->with('success','user removed!');
    }

}
