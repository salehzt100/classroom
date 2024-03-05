<?php

namespace App\Actions\classwork;

use App\Models\Classwork;
use Illuminate\Database\Eloquent\Collection;

class GetComments
{

    public function __invoke(Classwork $classwork):Collection
    {
        $comments = $classwork->comments()->get();
        return $comments;

    }
}
