<?php

namespace App\Actions\comment;

use App\Http\Requests\CommentRequest;
use Illuminate\Support\Facades\Auth;

class CreateComment
{

    public function __invoke(CommentRequest $request)
    {
        Auth::user()->comments()->create([
            'content'=>$request->input('content'),
            'commentable_id'=>$request->input('id'),
            'commentable_type'=>$request->input('type'),
            'ip'=>$request->ip(),
            'user_agent'=>$request->userAgent()
        ]);
    }

}
