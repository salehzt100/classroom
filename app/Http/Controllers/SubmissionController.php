<?php

namespace App\Http\Controllers;

use App\Actions\classwork\AddSubmission;
use App\Actions\User\EnsureUserIsAssignedForClasswork;
use App\Actions\SubmissionExistsCheck;
use App\Http\Requests\SubmissionRequest;
use App\Models\Classwork;
use App\Models\ClassworkUser;
use App\Models\Submission;
use App\Rules\ForbiddenFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class SubmissionController extends Controller
{

    public function store(SubmissionRequest $request, EnsureUserIsAssignedForClasswork $assigned, AddSubmission $addSubmission, Classwork $classwork)
    {

        Gate::authorize('submission.create', [$classwork]);


        if (!$assigned) {
            abort(403);
        }

        if (!$request->file('files')) {
            return back();
        }

        DB::beginTransaction();
        try {

            $addSubmission($request, $classwork);
            DB::commit();

        } catch (\Throwable $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());

        }

        return back()->with('success', 'Work submitted');

    }

    public function file(Submission $submission, SubmissionExistsCheck $exists)
    {

        /*        /// SELECT * from classroom_user
                /// where user_id = ?
                /// AND rule = teacher
                /// AND where classroom_id IN (
                /// SELECT classroom_id form classworks WHERE id IN (
                /// SELECT classwork_id from submissions where id =  )
                /// )
                ///

                /// SELECT * from classroom_user
                /// where user_id = ?
                /// AND rule = teacher
                /// AND  EXISTS (
                /// SELECT 1 form classworks WHERE classworks.classroom_id = classroom_user.classroom_id
                ///  AND EXISTS (
                /// SELECT 1 from submissions WHERE submissions.classwork_id = classroom_user.classwork_id AND id = ?  )
                /// )

        //        $isTeacher = $submission->
        //        classwork->
        //        classroom->
        //        teachers()->where('id', '=', $user->id)->exists();
        */



        if (!$exists($submission)) {
            abort(403);
        }

        return response()->file(storage_path('app/' . $submission->content));

    }
}
