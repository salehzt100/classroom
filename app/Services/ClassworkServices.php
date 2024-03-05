<?php

namespace App\Services;

use App\Events\ClassworkCreated;
use App\Models\Classroom;
use App\Models\Classwork;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;

class ClassworkServices
{

    public function all(Request $request,Classroom $classroom ) :Paginator
    {

        $classworks = $classroom->classworks()
            ->filter($request->query())
            ->withCount([
                'users as assigned_count' => fn($query) => $query->where('classwork_user.status', '=', 'assigned'),
                'users as turnedin_count' => fn($query) => $query->where('classwork_user.status', '=', 'submitted'),
                'users as graded_count' => fn($query) => $query->where('classwork_user.status', '=', 'graded'),

            ])
            ->where(function ($query) {
                $query->whereHas('users', function ($query) {
                    $query->where('id', Auth::id());
                })
                    ->orWhereHas('classroom.teachers', function ($query) {
                        $query->where('id', '=', Auth::id());
                    });

            })
            ->latest('published_at')
            ->simplePaginate(3)->fragment('classworks');

        return $classworks;

    }

    public function store(Request $request,Classroom $classroom, $type):void
    {

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'topic_id' => ['nullable', 'integer', 'exists:topics,id'],
            'options_grade' => [Rule::requiredIf(fn() => $type == Classwork::TYPE_ASSIGNMENT), 'numeric', 'min:0'],
            'options_due' => ['nullable', 'date', 'after:published_at']
        ]);

        $request->merge([
            'options' => $request->input('options')
        ]);
        $request->merge([
            'user_id' => Auth::id(),
            'type' => $type,
        ]);


        DB::transaction(function () use ($request, $classroom) {

            $classwork = $classroom->classworks()->create(request()->all());


            $classwork->users()->attach($request->students);

            event(new ClassworkCreated($classwork));
            //ClassworkCreated::dispatch($classwork);

        });


    }

    public function update(Request $request,Classroom $classroom,Classwork $classwork):void
    {


        $type = $classwork->type;


        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'topic_id' => ['nullable', 'integer', 'exists:topics,id'],
            'options.grade' => [Rule::requiredIf(fn() => $type == Classwork::TYPE_ASSIGNMENT), 'numeric', 'min:0'],
            'options.due' => ['nullable', 'date', 'after:published_at']
        ]);

        $request->merge([
            'options' => $request->input('options')
        ]);


        DB::transaction(function () use ($request, $classwork) {

            $classwork->update(request()->all());

            $classwork->users()->sync($request->input('students'));


        });


    }


}
