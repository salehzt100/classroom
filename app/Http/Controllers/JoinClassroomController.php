<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Scopes\UserClassroomScope;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JoinClassroomController extends Controller
{
    public function create($id)
    {

        $classroom = Classroom::withoutGlobalScope(UserClassroomScope::class)
            ->active()
            ->findOrFail($id);

        try {
            $this->exists($id, Auth::id());

        } catch (Exception $e) {
            return redirect()->route('classrooms.show', $id);
        }
        return view('classrooms.join', compact('classroom'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'role' => 'in:student,teacher'
        ]);

        $classroom = Classroom::withoutGlobalScope(UserClassroomScope::class)
            ->active()
            ->findOrFail($id);

        try {

            $classroom->join(Auth::id(), $request->input('role', 'student'));

        } catch (\Exception $e) {
            return redirect()->route('classrooms.show', $id);
        }


        return redirect()->route('classrooms.show', $id);

    }


    protected function exists($classroom, $user_id)
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
