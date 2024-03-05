<?php

namespace App\Http\Controllers;

use App\Actions\Post\CreatePost;
use App\Http\Requests\PostRequest;
use App\Models\Classroom;


class PostController extends Controller
{
    public function store(PostRequest $request, CreatePost $create, Classroom $classroom)
    {
        $create($request, $classroom);

        return back()->with('success', 'Post is created!');
    }
}
