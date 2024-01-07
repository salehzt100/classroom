<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
        $classrooms = Classroom::orderBy('name', 'DESC')->get();
        $success = Session::get('success');
        return View::make('classrooms.index', compact('classrooms', 'success'));
    }


    public function show(Classroom $classroom): BaseView
    {

        return View::make('classrooms.show', compact('classroom'));
    }

    public function create(): BaseView
    {
        return view()->make('classrooms.create');
    }


    public function store(Request $request): RedirectResponse
    {

        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');  // UpLoadedFile
            $path = $file->store('/covers', 'public');
            $request->merge([
                'cover_image_path' => $path,
            ]);
        }
        $request->merge([
            'code' => Str::random(8)
        ]);
        Classroom::create($request->all());

        // PRG =>  POST REDIRECT GET
        return Redirect::route('classrooms.index')->with('success', 'classroom created');

    }

    public function edit(Classroom $classroom): Renderable
    {

        return View::make('classrooms.edit', compact('classroom'));
    }

    public function update(Request $request, Classroom $classroom): RedirectResponse
    {
        if ($request->hasFile('cover_image')) {

            $file = $request->file('cover_image');  // UpLoadedFile
            $path = $file->store('/covers', 'public');
            $request->merge([
                'cover_image_path' => $path,
            ]);
            $current_image = $classroom->getAttribute('cover_image_path');

            if ($current_image) {
                Storage::disk('public')->delete($current_image);
            }
        }

        $classroom->update($request->all());

        return Redirect::route('classrooms.index')->with('success', 'classroom updated');
    }

    public function destroy(Classroom $classroom ): RedirectResponse
    {

        $current_image = $classroom->getAttribute('cover_image_path');
        if ($current_image != null && Storage::disk('public')->exists($current_image)) {
            Storage::disk('public')->delete($current_image);
        }

        Classroom::destroy($classroom->getAttribute('id'));

        // flash massages
        // with redirect by with('name' , 'message') method
        // return Redirect::route('classrooms.index')->with('success','classroom deleted');

        return Redirect::route('classrooms.index')->with('success', 'classroom deleted');
    }


}
