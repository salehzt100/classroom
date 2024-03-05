<?php

namespace App\Http\Controllers\Api\v1;

use App\Events\MessageSent;
use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassroomMessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request,Classroom $classroom)
    {

        $messages = $classroom
            ->messages()
            ->with('sender:id,name')
            ->latest()
            ->paginate($request->per_page,'*','messages',$request->page);
        return $messages;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Classroom $classroom)
    {
        $request->validate([
            'body'=>['required','string'],
        ]);

        $message=$classroom->messages()->create([
         'body'=>$request->post('body'),
         'sender_id'=>Auth::id(),
     ]);

     MessageSent::broadcast($message)->toOthers();

     return $message->load('sender:id,name');
    }

    /**
     * Display the specified resource.
     */
    public function show(Classroom $classroom,Message $message)
    {
        return $message;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classroom $classroom,Message $message)
    {

        $request->validate([
            'body'=>['required','string'],
        ]);

        $message->update([
            'body'=>$request->post('body'),
        ]);
        return $message;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        $message->delete();
        return [];
    }
}
