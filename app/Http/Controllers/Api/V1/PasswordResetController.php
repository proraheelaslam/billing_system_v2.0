<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Validator;
use App\Facades\ApiResponse;
use Carbon\Carbon;
use App\Notifications\PasswordResetRequest;
use App\Notifications\PasswordResetSuccess;
use App\User;
use App\PasswordReset;

class PasswordResetController extends Controller
{
    /**
     * Create token password reset
     *
     * @param  [string] email
     * @return [string] message
     */
    public function create(Request $request)
    {
        
        //$request->validate([
            //'email' => 'required|string|email',
        //]);

        $validator = Validator($request->all(),[
            'email' => 'required|string|email'
        ]);
        if($validator->fails()){
            $msg = $validator->errors()->first();
            return ApiResponse::errorResponse('VALIDATION_ERROR', $msg, []);
        }


        $user = User::where('email', $request->email)->first();
        
        if (!$user){
            //return response()->json([
                //'message' => __('passwords.user')
            //], 404);
            $msg = __('We can not find a user with that e-mail address.');
            return ApiResponse::errorResponse('VALIDATION_ERROR', $msg, []);
        } 
        $passwordReset = PasswordReset::updateOrCreate(['email' => $user->email], [
            'email' => $user->email,
            'token' => str_random(60)
        ]);
       
        if ($user && $passwordReset)
            $user->notify(new PasswordResetRequest($passwordReset->token));

        //return response()->json([
            //'message' => __('passwords.sent')
        //]);
        $msg = __('We have e-mailed your password reset link!');
        return ApiResponse::successResponse('SUCCESS', $msg, []);
    }

    /**
     * Find token password reset
     *
     * @param  [string] $token
     * @return [string] message
     * @return [json] passwordReset object
     */
    public function find($token)
    {
        $passwordReset = PasswordReset::where('token', $token)->first();
        
        if (!$passwordReset){
            //return response()->json([
                //'message' => __('passwords.token')
            //], 404);
            $msg = __('This password reset token is invalid');
            
            return ApiResponse::errorResponse('VALIDATION_ERROR', $msg, []);
        }
        if (Carbon::parse($passwordReset->updated_at)->addMinutes(720)->isPast()) {
            $passwordReset->delete();
            //return response()->json([
                //'message' => __('passwords.token')
            //], 404);
            $msg = __('This password reset token is invalid.');
            
            return ApiResponse::errorResponse('VALIDATION_ERROR', $msg, []);
        }

        //return response()->json($passwordReset);
        
        $msg = __('The token available for reset password.');
        //dd($msg);
        return ApiResponse::successResponse('SUCCESS', $msg, $passwordReset);
    }

    /**
     * Reset password
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @param  [string] token
     * @return [string] message
     * @return [json] user object
     */
    public function reset(Request $request)
    {
        // $request->validate([
        //     'email' => 'required|string|email',
        //     'password' => 'required|string|confirmed',
        //     'token' => 'required|string'
        // ]);

        $validator = Validator($request->all(),[
            'email' => 'required|string|email',
            'password' => 'required|string|confirmed',
            'token' => 'required|string'
        ]);
        if($validator->fails()){
            $msg = $validator->errors()->first();
            return ApiResponse::errorResponse('VALIDATION_ERROR', $msg, []);
        }

        $passwordReset = PasswordReset::where([
            ['token', $request->token],
            ['email', $request->email]
        ])->first();

        if (!$passwordReset){
            //return response()->json([
                //'message' => __('passwords.token')
            //], 404);
            $msg = __('This password reset token is invalid.');
            return ApiResponse::errorResponse('VALIDATION_ERROR', $msg, []);
        }
        $user = User::where('email', $passwordReset->email)->first();

        if (!$user){
            //return response()->json([
                //'message' => __('passwords.user')
            //], 404);
            $msg = __('This password reset token is invalid.');
            return ApiResponse::errorResponse('VALIDATION_ERROR', $msg, []);
        }

        $user->password = bcrypt($request->password);
        $user->save();
        $passwordReset->delete();

        $user->notify(new PasswordResetSuccess($passwordReset));

        $msg = __('Password reset successfully.');
        return ApiResponse::successResponse('SUCCESS', $msg, []);
        //return response()->json($user);
    }
}
