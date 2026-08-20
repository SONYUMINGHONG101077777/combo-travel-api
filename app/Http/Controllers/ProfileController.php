<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{

    public function profile(Request $request)
    {
        return response()->json([
            "user"=>$request->user()
        ]);
    }



    public function update(Request $request)
    {

        $user = $request->user();


        $request->validate([

            'name'=>'required',
            'username'=>'required'

        ]);



        $user->update([

            'name'=>$request->name,

            'username'=>$request->username,

            'birthday'=>$request->birthday,

            'phone_number'=>$request->phone_number

        ]);


        return response()->json([

            "message"=>"Profile updated",

            "user"=>$user

        ]);

    }



    public function changePassword(Request $request)
    {

        $request->validate([

            'old_password'=>'required',

            'new_password'=>'required|min:8|confirmed'

        ]);



        $user=$request->user();



        if(!Hash::check(
            $request->old_password,
            $user->password
        ))
        {

            return response()->json([

                "message"=>"Old password incorrect"

            ],401);

        }



        $user->update([

            'password'=>Hash::make(
                $request->new_password
            )

        ]);



        return response()->json([

            "message"=>"Password changed successfully"

        ]);

    }



    public function logout(Request $request)
    {

        /** @var \Laravel\Sanctum\PersonalAccessToken|null $token */
        $token = $request->user()
            ->currentAccessToken();

        if ($token) {
            $token->delete();
        }

        return response()->json([

            "message"=>"Logout successfully"

        ]);

    }

}