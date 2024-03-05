<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TwoFactorAuthenticationController extends Controller
{
    public function create()
    {
        return view()->make('auth.2fa',[
            'user'=>Auth::user(),
        ]);
    }
}
