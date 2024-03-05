<?php

namespace App\Actions\classwork;

use App\Models\Classwork;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class GetSubmissions
{
public function __invoke(Classwork $classwork) :Collection
{
    $submissions = $classwork->submissions()->where('user_id', '=', Auth::id())->get();

    return $submissions;
}
}
