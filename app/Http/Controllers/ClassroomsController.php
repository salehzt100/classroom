<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassroomRequest;
use App\Models\Classroom;
use App\Policies\ClassroomPolicy;
use App\Services\ClassroomServices;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View as BaseView;
use Illuminate\Support\Facades\View;

class ClassroomsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->authorizeResource(Classroom::class, 'classroom');
    }

    public function index(Request $request, ClassroomServices $classroom_handlers): Renderable
    {

        $classrooms = $classroom_handlers->all($request->query());
        $success = Session::get('success');
        $error = Session::get('error');
        $search = $request->input('search') ?? '';
        session()->flash('search', $search);

        return View::make('classrooms.index', compact(['classrooms', 'success', 'error']));
    }

    public function show(Request $request, Classroom $classroom): BaseView
    {

/*
        /// signed Url  dont change ulr by add {signature} and middleware {signed}
        ///  URL::signedRoute()    or URL::temporarySignedRoute('',expire,'')   and expiration time
        ///   used in invitation link  and use in email verification
*/
        return View::make('classrooms.show')->with([
            'classroom' => $classroom,
        ]);
    }

    public function create(): BaseView
    {
        return view()->make('classrooms.create', [
            'classroom' => new Classroom(),
        ]);
    }

    public function store(ClassroomRequest $request, ClassroomServices $classroom_handlers): RedirectResponse
    {
        $classroom_handlers->store($request);

        // PRG =>  POST REDIRECT GET

        return Redirect::route('classrooms.index')->with('success', 'classroom created');

    }

    public function edit(Classroom $classroom): Renderable
    {
        return View::make('classrooms.edit', compact('classroom'));
    }

    public function update(ClassroomRequest $request, ClassroomServices $classroom_handlers, Classroom $classroom): RedirectResponse
    {
        $classroom_handlers->update($request, $classroom);

        return Redirect::route('classrooms.index')->with('success', 'classroom updated')->with('error', null);
    }

    public function destroy(Classroom $classroom): RedirectResponse
    {
        $classroom->delete();

        return Redirect::route('classrooms.index')->with('success', 'classroom deleted');
    }

    public function trashed(ClassroomServices $classroom_handlers): Renderable
    {
        $classrooms = $classroom_handlers->onlyTrashed();

        return view('classrooms.trashed', compact('classrooms'));
    }

    public function restore(string $id, ClassroomServices $classroom_handlers) :RedirectResponse
    {


        $deleted_classroom=  Classroom::onlyTrashed()->findOrFail($id);


        Gate::authorize('restore',$deleted_classroom);


        $classroom = $classroom_handlers->restore($id);

        return Redirect::route('classrooms.index')->with('success', "Classroom ({$classroom->name}) Restored");
    }

    public function forceDelete($id, ClassroomServices $classroom_handlers) :RedirectResponse
    {

        $classroom = $classroom_handlers->forceDelete($id);
        Gate::authorize('forceDelete',$classroom);

        return Redirect::route('classrooms.trashed')
            ->with('success', "Classroom ({$classroom->name}) deleted forever!");

    }

    public function chat(Classroom $classroom)
    {
        return View::make('classrooms.chat',compact('classroom'));
    }


}
