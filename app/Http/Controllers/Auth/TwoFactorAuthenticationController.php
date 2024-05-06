<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TwoFactorAuthenticationController extends Controller
{
    public function create()
    {
        return view()->make('profile',[
            'user'=>Auth::user(),
        ]);
    }
}
