<?php

namespace App\Http\Controllers;

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
    public function index(Classroom $classroom): Renderable
    {
        $classworks = $classroom->classworks()
            ->with('topic')
            ->orderBy('published_at')
            ->get();
        // ->lazy()


        return View::make('classworks.index', [
                'classroom'=>$classroom,
                'classworks'=>$classworks->groupBy('topic_id')
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request ,Classroom $classroom): Renderable
    {

        $type=$this->getType($request);


        $topics=$classroom->topics;

        $classwork=new Classwork();


        return View::make('classworks.create', compact('classroom' ,'classwork',"topics",'type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Classroom $classroom): RedirectResponse
    {
        $type = $this->getType();
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'topic_id' => ['nullable', 'integer', 'exists:topics,id'],
            'options_grade'=>[Rule::requiredIf(fn()=> $type == Classwork::TYPE_ASSIGNMENT),'numeric','min:0'],
            'options_due'=>['nullable','date','after:published_at']
        ]);

        $request->merge([
            'options'=>$request->input('options')
        ]);
        $request->merge([
            'user_id' => Auth::id(),
            'type' => $type
        ]);


DB::transaction(function () use($request,$classroom){

    $classwork = $classroom->classworks()->create(request()->all());


    $classwork->users()->attach($request->students);

});


        return redirect()->route('classrooms.classworks.index', $classroom->id)
            ->with('success', 'Classwork Created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Classroom $classroom, Classwork $classwork): Renderable
    {
        $comments=$classwork->comments()->get();
        return View::make('classworks.show', compact('classroom', 'classwork','comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request ,Classroom $classroom, Classwork $classwork): Renderable
    {
        $assigned=$classwork->users()->pluck('id')->toArray();
        $type=$classwork->type->value;

        return View::make('classworks.edit', compact('classroom','classwork','type','assigned'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classroom $classroom,Classwork $classwork): RedirectResponse
    {

        $type = $classwork->type;


        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'topic_id' => ['nullable', 'integer', 'exists:topics,id'],
            'options.grade'=>[Rule::requiredIf(fn()=> $type == Classwork::TYPE_ASSIGNMENT),'numeric','min:0'],
            'options.due'=>['nullable','date','after:published_at']
        ]);

        $request->merge([
            'options'=>$request->input('options')
        ]);


        DB::transaction(function () use($request,$classwork){

             $classwork->update(request()->all());

            $classwork->users()->sync($request->input('students'));

        });



        return Redirect::route('classrooms.classworks.show',[$classroom->id,$classwork->id])->with([
            'success' => 'classwork updated!',
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classroom $classroom, Classwork $classwork): RedirectResponse
    {
        $classwork->destroy();

        return Redirect::route('classrooms.classworks.index', $classroom->id)
            ->with('success', 'Classwork Deleted!');
    }

    protected function getType()
    {

        $type = request('type');
        $allowedType = [
            'assignment',
            'question',
            'material'
        ];
        if (!in_array($type, $allowedType)) {
            $type = Classwork::TYPE_ASSIGNMENT;
        }
        return $type;
    }
}


