<?php

namespace App\Http\Controllers;

use App\Enums\ClassworkTypes;
use App\Events\ClassworkCreated;
use App\Models\Classroom;
use App\Models\Classwork;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Rule;

class ClassworkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, Classroom $classroom): Renderable
    {
        $this->authorize('create', [Classwork::class, $classroom]);


        $type = $this->getType($request);


        $topics = $classroom->topics;

        $classwork = new Classwork();


        return View::make('classworks.create', compact('classroom', 'classwork', "topics", 'type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Classroom $classroom): RedirectResponse
    {
        $this->authorize('create', [Classwork::class, $classroom]);

        $type = $this->getType($request);
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


        return redirect()->route('classrooms.classworks.index', $classroom->id)
            ->with('success', 'Classwork Created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Classroom $classroom, Classwork $classwork): Renderable
    {
        $this->authorize('view', $classwork);

        $comments = $classwork->comments()->get();
        $submissions = $classwork->submissions()->where('user_id', '=', Auth::id())->get();

        return View::make('classworks.show', compact('classroom', 'classwork', 'comments', 'submissions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Classroom $classroom, Classwork $classwork): Renderable
    {
        $this->authorize('update', $classwork);

        $assigned = $classwork->users()->pluck('id')->toArray();
        $type = $classwork->type->value;


        return View::make('classworks.edit', compact('classroom', 'classwork', 'type', 'assigned'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classroom $classroom, Classwork $classwork): RedirectResponse
    {
        $this->authorize('update', $classwork);


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


        return Redirect::route('classrooms.classworks.show', [$classroom->id, $classwork->id])->with([
            'success' => 'classwork updated!',
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classroom $classroom, Classwork $classwork): RedirectResponse
    {
        $this->authorize('delete', $classwork);

        $classwork->destroy();

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


