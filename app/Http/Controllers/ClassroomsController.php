<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\View\View as BaseView;
use Illuminate\Support\Facades\View;

class ClassroomsController extends Controller
{

    public function index(Request $request): Renderable
    {

        $classrooms = Classroom::orderBy('name', 'DESC')->get();
        $success=Session::get('success');
        return View::make('classrooms.index', compact('classrooms','success'));
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

        $request->merge([
            'code' => Str::random(8)
        ]);
        Classroom::create($request->all());

        // PRG =>  POST REDIRECT GET
        return Redirect::route('classrooms.index')->with('success','classroom created');

    }

    public function edit(Classroom $classroom): Renderable
    {

        return View::make('classrooms.edit', compact('classroom'));
    }

    public function update(Request $request, Classroom $classroom): RedirectResponse
    {

        $classroom->update($request->all());

        return Redirect::route('classrooms.index')->with('success','classroom updated');
    }

    public function destroy($id) :RedirectResponse
    {
        Classroom::destroy($id);

        // flash massages
        // with redirect by with('name' , 'message') method
        // return Redirect::route('classrooms.index')->with('success','classroom deleted');

        return Redirect::route('classrooms.index')->with('success','classroom deleted');
    }


}
