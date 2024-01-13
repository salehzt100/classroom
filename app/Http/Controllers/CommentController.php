<?php

namespace App\Http\Controllers;

use App\Models\Classwork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{


    public function store(Request $request)
    {
       $va= $request->validate([
            'content'=>['required','string'],
            'id'=>['required','int'],
            'type'=>['required','in:classwork,post']
        ]);

       Auth::user()->comments()->create([
            'content'=>$request->input('content'),
            'commentable_id'=>$request->input('id'),
            'commentable_type'=>$request->input('type'),
            'ip'=>$request->ip(),
            'user_agent'=>$request->userAgent()
        ]);


        return back()->with('success','comment added');

    }

}
