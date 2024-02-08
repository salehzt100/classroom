<?php

namespace App\Http\Controllers;

use App\Services\Language\LanguageSelector;
use Illuminate\Http\Request;

class LanguageSelectorsController extends Controller
{

    public function __invoke(Request $request,LanguageSelector $select)
    {

        $select($request->input('locale'));
        return redirect()->back();
    }
}
