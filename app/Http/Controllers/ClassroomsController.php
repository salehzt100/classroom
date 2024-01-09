<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassroomRequest;
use App\Models\Classroom;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View as BaseView;
use Illuminate\Support\Facades\View;

class ClassroomsController extends Controller
{

    public function index(Request $request): Renderable
    {
        $classrooms = Classroom::active()
            ->recent()
            ->orderBy('name', 'DESC')
            ->get();
        $success = Session::get('success');
        $error = Session::get('error');

        return View::make('classrooms.index', compact(['classrooms', 'success', 'error']));
    }

    public function show(Classroom $classroom): BaseView
    {
        return View::make('classrooms.show', compact('classroom'));
    }

    public function create(): BaseView
    {
        return view()->make('classrooms.create', [
            'classroom' => new Classroom(),
        ]);
    }

    public function store(ClassroomRequest $request): RedirectResponse
    {

        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');  // UpLoadedFile
            $path = Classroom::uploadCoverImage($file);
            $request->merge([
                'cover_image_path' => $path,
            ]);
        }

        $request->merge([
            'code' => Str::random(8)
        ]);

        $request->merge([
            'user_id'=>Auth::id()
        ]);
        Classroom::create($request->all());

        // PRG =>  POST REDIRECT GET
        return Redirect::route('classrooms.index')->with('success', 'classroom created');

    }

    public function edit(Classroom $classroom): Renderable
    {

        return View::make('classrooms.edit', compact('classroom'));
    }

    public function update(ClassroomRequest $request, Classroom $classroom): RedirectResponse
    {
        $current_image = null;
        if ($request->hasFile('cover_image')) {

            $file = $request->file('cover_image');  // UpLoadedFile
            $path = Classroom::uploadCoverImage($file);
            $request->merge([
                'cover_image_path' => $path,
            ]);
            $current_image = $classroom->getAttribute('cover_image_path');

        }

        $classroom->update($request->all());

        if ($current_image) {
            Storage::disk('public')->delete($current_image);
        }

        return Redirect::route('classrooms.index')->with('success', 'classroom updated')->with('error', null);
    }

    public function destroy(Classroom $classroom): RedirectResponse
    {
        $classroom->delete();

        //Classroom::deleteCoverImage($classroom->getAttribute('cover_image_path'));

        // flash massages
        // with redirect by with('name' , 'message') method
        // return Redirect::route('classrooms.index')->with('success','classroom deleted');

        return Redirect::route('classrooms.index')->with('success', 'classroom deleted');
    }

    public function trashed() :Renderable
    {
        $classrooms=Classroom::onlyTrashed()
            ->latest('deleted_at')
            ->get();

        return view('classrooms.trashed',compact('classrooms'));
    }
    public function restore($id)
    {
        $classroom=Classroom::onlyTrashed()->findOrFail($id);
        $classroom->restore();

        return Redirect::route('classrooms.index')->with('success',"Classroom ({$classroom->name}) Restored");
    }
    public function forceDelete($id){

        $classroom=Classroom::withTrashed()->findOrFail($id);
        $classroom->forceDelete();
        Classroom::deleteCoverImage($classroom->getAttribute('cover_image_path'));

        return Redirect::route('classrooms.trashed')
            ->with('success',"Classroom ({$classroom->name}) deleted forever!");

    }




}
