<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Laravel\Sanctum\PersonalAccessToken;

class AccessTokenController extends Controller
{

    public function store(Request $request)
    {

        $request->validate([
            'email'=>'required|string|max:255',
            'password'=>'required|string|min:6',
            'device_name'=>'string|max:255',
            'abilities'=>'nullable|array',


        ]);

        $user=User::where('email','=',$request->email)->first();

        if ($user && Hash::check($request->password,$user->password))
        {
            $device_name=$request->post('device_name',$request->userAgent());

            $token=$user->createToken($device_name,$request->abilities ?? ["*"]);

//            Auth::attempt(['email'=>$request->email,'password'=>$request->password]);

            return Response::json([
                'code'=>201,
                'token'=>$token->plainTextToken,

                'user'=>$user
            ],201);

        }
        return Response::json([
            'code'=>401,
            'message'=>'Invalid Credentials  '
            ],401);

    }
    public function destroy($token=null)
    {

        $user=Auth::guard('sanctum')->user();
        $personal_access_token=PersonalAccessToken::findToken($token);

        if ($token == null)
        {
            $user->currentAccessToken()->delete();
            return Response::json([],204);
        }

        if ($user->id == $personal_access_token->tokenable_id )
        {
            $personal_access_token->delete();
        }
    }
}
