<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\DeviceToken;
use Illuminate\Http\Request;

class DevicesController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'token'=>['required','string'],
        ]);
        $user=$request->user();
        $exists=$user->devices()->where('token','=',$request->post('token'))->first();
        if (!$exists){
            $token=$user->devices()->create([
                'token'=>$request->post('token'),
            ]);
            return $token;

        }


    }
    public function destroy(Request $request,DeviceToken $deviceToken)
    {
        $deviceToken->delete();

        return [];
    }
}
