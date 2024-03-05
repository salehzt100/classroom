<?php

namespace App\Actions;

use App\Models\Submission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SubmissionExistsCheck
{
    public function __invoke(Submission $submission)
    {

        $user = Auth::user();
        $collection = DB::select('
    SELECT * FROM classroom_user
    WHERE user_id = ?
    AND role = ?
    AND EXISTS (
        SELECT 1 FROM classworks WHERE classworks.classroom_id = classroom_user.classroom_id
        AND EXISTS (
            SELECT 1 FROM submissions WHERE submissions.classwork_id = classworks.id AND submissions.id = ?
        )
    )', [$user->id, 'teacher', $submission->id]);




        $isOwner = $submission->user_id == $user->id;

        return ($collection || $isOwner);
    }

}
