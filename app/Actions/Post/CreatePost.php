<?php

namespace App\Actions\Post;

use App\Http\Requests\PostRequest;
use App\Models\Classroom;
use Illuminate\Support\Facades\Auth;

class CreatePost
{
    public function __invoke(PostRequest $request, Classroom $classroom)
    {
        $classroom->posts()->create([
            'user_id' => Auth::id(),
            'content' => $request->get('content'),
        ]);
    }
}
