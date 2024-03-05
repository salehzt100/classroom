<?php

namespace App\Http\Controllers;

use App\Actions\comment\CreateComment;
use App\Http\Requests\CommentRequest;
use App\Models\Classwork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{


    public function store(CommentRequest $request, CreateComment $create)
    {
        $create($request);

        return back()->with('success', 'comment added')->withFragment("comments-$request->id");

    }

}
