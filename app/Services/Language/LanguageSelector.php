<?php

namespace App\Services\Language;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class LanguageSelector
{

    public function __invoke(string $locale ) :void
    {

        $user=Auth::user();
        $user->profile()->update([
            'locale'=>$locale
        ]);
    }

}
