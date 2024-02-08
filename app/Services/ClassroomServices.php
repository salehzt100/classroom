<?php

namespace App\Services;

use App\Http\Requests\ClassroomRequest;
use App\Models\Classroom;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ClassroomServices
{
    public function all(array $filter): Collection
    {
        return Classroom::active()
            ->filter($filter)
            ->recent()
            ->orderBy('name', 'DESC')
            ->get();
    }

    public function store(Request $request) : void
    {
        if ($request->hasFile('cover_image')) {

            $file = $request->file('cover_image');  // UpLoadedFile
            $path = Classroom::uploadCoverImage($file);
            $request->merge([
                'cover_image_path' => $path,
            ]);
        }

//        DB::beginTransaction();     // start transaction and stop auto commit

        DB::transaction(function () use ($request)
        {
            $classroom = Classroom::create($request->all());

            $classroom->join(Auth::id(), 'teacher');
        });


        /*    ///  database transaction
        /// connect all action that occur on database in one { transaction }
        ///  in sql , commit , each action do commit by default { auto commit }
        ///
        ///
        ///

        // can use transaction()
        /*
         * DB::transaction(function (Request $request){
         * $classroom = Classroom::create($request->all());
         *
         * $classroom->join(Auth::id(), 'teacher');
         *
         * });*/

    }

    public function update(ClassroomRequest $request, Classroom $classroom): void
    {
        $current_image = null;
        if ($request->hasFile('cover_image')) {

            $file = $request->file('cover_image');  // UpLoadedFile
            $path = Classroom::uploadCoverImage($file);
            $request->merge([
                'cover_image_path' => $path,
            ]);
            $current_image = $classroom->getAttribute('cover_image_path');

        }

        $classroom->update($request->all());

        if ($current_image) {
            Storage::disk('public')->delete($current_image);
        }

    }

    public function onlyTrashed(): Collection
    {
        return Classroom::onlyTrashed()
            ->latest('deleted_at')
            ->get();
    }

    public function restore(string $id) :Model
    {
        $classroom = Classroom::onlyTrashed()->findOrFail($id);
        $classroom->restore();
        return $classroom;

    }
    public function forceDelete(string $id) :Model
    {
        $classroom = Classroom::withTrashed()->findOrFail($id);

        $classroom->forceDelete();

        return $classroom;
    }

}
