<?php

namespace App\Actions;

use App\Http\Requests\ProfileUpdateRequest;

class ProfileUpdate
{
    public function __invoke(ProfileUpdateRequest $request) :void
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();
    }

}
