<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Laravel\Prompts\text;

class PostController extends Controller
{
    public function store(Request $request ,Classroom $classroom)
    {

        $request->validate([
            'content'=>'required|string'
        ]);
        $classroom->posts()->create([
            'user_id'=>Auth::id(),
            'content'=>$request->get('content'),
        ]);
        return back()->with('success','Post is created!');
    }
}
