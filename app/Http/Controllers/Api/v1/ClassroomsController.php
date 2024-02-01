<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClassroomCollection;
use App\Http\Resources\ClassroomResource;
use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ClassroomsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classrooms= Classroom::with('user','topics')
            ->withCount('students as students')
            ->paginate();
        return new ClassroomCollection($classrooms);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate=$request->validate([
            'name'=>'required',
            'section'=>'string'
        ]);

        $classroom=Classroom::create($validate);

        return response()->json([
            'code'=>201,
            'message'=>__('Classroom Created.'),
            'classroom'=> $classroom
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $classroom=Classroom::findOrFail($id);

        }catch (\Throwable $e){
            return response([
                'code'=>404,
                'message'=>'Classroom Not Found!'
            ],404);
        }

        return new ClassroomResource($classroom);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $classroom=Classroom::findOrFail($id);

        }catch (\Throwable $e){
            return response([
                'code'=>404,
                'message'=>'Classroom Not Found!'
            ],404);
        }

        $request->validate([
            'name'=>['sometimes','required'],
            'section'=>['sometimes', 'required']
        ]);


       $classroom->update($request->all());



        return response()->json([
            'code'=>200,
            'message'=>__('Classroom Updated.'),
            'classroom'=> $classroom
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Classroom::destroy($id);

        return Response::json([],204);
    }
}
