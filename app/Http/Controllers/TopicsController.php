<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopicsController extends Controller
{


    public function store(Request $request)
    {
        $validation=$request->validate([
            'name'=>['string','required'],
            'classroom_id'=>['required','exists:classrooms,id'],
        ]);
        $validation['user_id'] = Auth::id();

        Topic::create($validation);

        return redirect()->back()->with('success','topic is added successfully');
    }
}
