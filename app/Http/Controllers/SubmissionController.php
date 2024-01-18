<?php

namespace App\Http\Controllers;

use App\Models\Classwork;
use App\Models\ClassworkUser;
use App\Models\Submission;
use App\Rules\ForbiddenFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SubmissionController extends Controller
{

    public function store(Request $request, Classwork $classwork)
    {
        $request->validate([
            'files.*' => ['file', new ForbiddenFile(['application/x-php', 'application/x-msdownload'])]
        ]);


        $assigned = $classwork->users()->where('id', '=', Auth::id())->exists();
        if (!$assigned) {
            abort(403);
        }

        if (!$request->file('files')) {
            return back();

        }
        DB::beginTransaction();
        try {


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
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());

        }

        return back()->with('success', 'Work submitted');

    }

    public function file(Submission $submission)
    {

        /// SELECT * from classroom_user
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

        $user = Auth::user();
//        $isTeacher = $submission->
//        classwork->
//        classroom->
//        teachers()->where('id', '=', $user->id)->exists();

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


        if (!$collection && !$isOwner) {
            abort(403);
        }

        return response()->file(storage_path('app/' . $submission->content));
    }
}
