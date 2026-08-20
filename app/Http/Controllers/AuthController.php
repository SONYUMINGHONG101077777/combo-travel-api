<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{


    public function signup(Request $request)
    {


        $request->validate([

            'name'=>'required',

            'username'=>'required|unique:users',

            'email'=>'required|email|unique:users',

            'password'=>'required|min:8|confirmed',

            'birthday'=>'required'

        ]);



        $otp = rand(100000,999999);



        $user = User::create([


            'name'=>$request->name,

            'username'=>$request->username,

            'email'=>$request->email,

            'phone_number'=>$request->phone_number,


            'password'=>Hash::make(
                $request->password
            ),


            'birthday'=>$request->birthday,


            'otp_code'=>$otp,


            'otp_expire_time'=>now()
                    ->addMinutes(5)


        ]);



        return response()->json([


            'message'=>'Signup successfully. Please verify OTP',


            'otp'=>$otp,


            'user'=>$user


        ],201);


    }
    public function signin(Request $request)
{

    // Validate
    $request->validate([

        'login'=>'required',

        'password'=>'required'

    ]);


    // Normalize login input and find user by email, phone or username
 $login = trim($request->login);

$user = User::where('email', '=', $login, 'and')
    ->orWhere('phone_number', '=', $login)
    ->orWhere('username', '=', $login)
    ->first();



    // Check User

    if(!$user)
    {

        return response()->json([

            "message"=>"Account not found"

        ],404);

    }



    // Check Account Lock

    if($user->is_locked)
    {

        return response()->json([

            "message"=>"Account is locked"

        ],403);

    }




    // Check Password

    if(!Hash::check(
        $request->password,
        $user->password
    ))
    {


        $user->increment(
            'failed_login_attempts'
        );


        return response()->json([

            "message"=>"Wrong password"

        ],401);

    }



    // Reset failed attempts

    $user->update([

        'failed_login_attempts'=>0

    ]);




    // Create Token

    $token = $user->createToken(
        'auth_token'
    )->plainTextToken;



    return response()->json([


        "message"=>"Login Successfully",


        "user"=>[

            "id"=>$user->id,

            "name"=>$user->name,

            "username"=>$user->username,

            "email"=>$user->email,

            "phone_number"=>$user->phone_number,

            "profile_image"=>$user->profile_image

        ],


        "token"=>$token


    ],200);


}
public function verifyOTP(Request $request)
{

    $request->validate([

        'email'=>'required|email',

        'otp'=>'required'

    ]);

    $user = User::where('email', '=', $request->email, 'and')->first();



    if(!$user)
    {

        return response()->json([

            "message"=>"User not found"

        ],404);

    }



    // Check OTP Expire

    if(now() > $user->otp_expire_time)
    {

        return response()->json([

            "message"=>"OTP expired"

        ],400);

    }



    // Check OTP Code

    if($user->otp_code != $request->otp)
    {

        return response()->json([

            "message"=>"Invalid OTP"

        ],400);

    }



    // Verify Account

    $user->update([

        'verify_status'=>true,

        'otp_code'=>null,

        'otp_expire_time'=>null

    ]);



    return response()->json([

        "message"=>"Account verified successfully"

    ]);

}
public function forgotPassword(Request $request)
{
    $request->validate([
        'email' => 'required|email',
    ]);

    $user = User::where('email', '=', $request->email, 'and')->first();

    if (!$user) {
        return response()->json([
            'message' => 'User not found'
        ], 404);
    }

    $otp = rand(100000, 999999);

    $user->update([
        'otp_code' => $otp,
        'otp_expire_time' => now()->addMinutes(5),
    ]);

    return response()->json([
        'message' => 'OTP sent successfully',
        'otp' => $otp // សម្រាប់ Test ប៉ុណ្ណោះ
    ]);
}
public function verifyResetOTP(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'otp' => 'required',
    ]);

    $user = User::where('email', '=', $request->email, 'and')->first();

    if (!$user) {
        return response()->json([
            'message' => 'User not found'
        ], 404);
    }

    if ($user->otp_code != $request->otp) {
        return response()->json([
            'message' => 'Invalid OTP'
        ], 400);
    }

    if (now()->gt($user->otp_expire_time)) {
        return response()->json([
            'message' => 'OTP expired'
        ], 400);
    }

    return response()->json([
        'message' => 'OTP verified'
    ]);
}
public function resetPassword(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|confirmed|min:8',
    ]);

    $user = User::where('email', '=', $request->email, 'and')->first();

    if (!$user) {
        return response()->json([
            'message' => 'User not found'
        ], 404);
    }

    $user->update([
        'password' => Hash::make($request->password),
        'otp_code' => null,
        'otp_expire_time' => null,
    ]);

    return response()->json([
        'message' => 'Password reset successfully'
    ]);
}

}