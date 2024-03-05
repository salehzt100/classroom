<?php

namespace App\Actions\User;

use App\Models\Classwork;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsAssignedForClasswork
{
    public function __invoke(Classwork $classwork)
    {
        return  $classwork->users()->where('id', '=', Auth::id())->exists();
    }

}
