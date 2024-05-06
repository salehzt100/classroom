<?php

namespace App\Http\Controllers;

use App\Actions\classwork\GetComments;
use App\Actions\classwork\GetSubmissions;
use App\Enums\ClassworkTypes;
use App\Models\Classroom;
use App\Models\Classwork;
use App\Services\ClassworkServices;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class ClassworkController extends Controller
{

    public function index(Request $request, Classroom $classroom): Renderable
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


        // ->lazy()


        return View::make('classworks.index', [
            'classroom' => $classroom,
            'classworks' => $classworks
        ]);
    }


    public function create(Request $request, Classroom $classroom): Renderable
    {
        $this->authorize('create', [Classwork::class, $classroom]);


        $type = $this->getType($request);


        $topics = $classroom->topics;

        $classwork = new Classwork();


        return View::make('classworks.create', compact('classroom', 'classwork', "topics", 'type'));
    }


    public function store(Request $request,ClassworkServices $classwork_handlers ,Classroom $classroom): RedirectResponse
    {
        $this->authorize('create', [Classwork::class, $classroom]);

        $type = $this->getType($request);

        $classwork_handlers->store($request,$classroom,$type);

        return redirect()->route('classrooms.classworks.index', $classroom->id)
            ->with('success', 'Classwork Created!');
    }

    public function show(GetSubmissions $getSubmissions,GetComments $getComments,Classroom $classroom, Classwork $classwork): Renderable
    {
        $this->authorize('view', $classwork);
        $submissions=$getSubmissions($classwork);
        $comments=$getComments($classwork);

        return View::make('classworks.show', compact('classroom', 'classwork', 'comments', 'submissions'));
    }


    public function edit(Request $request, Classroom $classroom, Classwork $classwork): Renderable
    {
        $this->authorize('update', $classwork);

        $assigned = $classwork->users()->pluck('id')->toArray();
        $type = $classwork->type->value;


        return View::make('classworks.edit', compact('classroom', 'classwork', 'type', 'assigned'));
    }


    public function update(Request $request,ClassworkServices $classwork_handlers, Classroom $classroom, Classwork $classwork): RedirectResponse
    {
        $this->authorize('update', $classwork);

        $classwork_handlers->update($request,$classroom,$classwork);

        return Redirect::route('classrooms.classworks.show', [$classroom->id, $classwork->id])->with([
            'success' => 'classwork updated!',
        ]);

    }


    public function destroy(Classroom $classroom, Classwork $classwork): RedirectResponse
    {
        $this->authorize('delete', $classwork);

        $classwork->delete();

        return Redirect::route('classrooms.classworks.index', $classroom->id)
            ->with('success', 'Classwork Deleted!');
    }

    protected function getType()
    {

        $type = ClassworkTypes::from(request('type'));

        $allowedType = [
            Classwork::TYPE_ASSIGNMENT,
            Classwork::TYPE_QUESTION,
            Classwork::TYPE_MATERIAL,
        ];
        if (!in_array($type, $allowedType)) {
            $type = Classwork::TYPE_ASSIGNMENT;
        }
        return $type->value;
    }
}


