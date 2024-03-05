<?php

namespace App\Actions\Classroom;

use App\Models\Classroom;
use App\Models\Scopes\UserClassroomScope;
use Illuminate\Database\Eloquent\Model;

class GetClassroomWithoutGlobalScope
{
public function __invoke(string $id) :Model
{
    $classroom = Classroom::withoutGlobalScope(UserClassroomScope::class)
        ->active()
        ->findOrFail($id);
    return $classroom;
}

}
