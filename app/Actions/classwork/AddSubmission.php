<?php

namespace App\Actions\classwork;

use App\Http\Requests\SubmissionRequest;
use App\Models\Classwork;
use App\Models\ClassworkUser;
use App\Models\Submission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AddSubmission
{
    public function __invoke(SubmissionRequest $request, Classwork $classwork) :void
    {

        foreach ($request->file('files') as $file) {
            Submission::create([
                'user_id' => Auth::id(),
                'classwork_id' => $classwork->id,
                'content' => $file->store("submissions/{$classwork->id}"),
                'type' => 'file',
            ]);
        }
        ClassworkUser::where([
            'user_id' => Auth::id(),
            'classwork_id' => $classwork->id,
        ])->update([
            'status' => 'submitted',
            'submitted_at' => now(),
        ]);
    }

}
