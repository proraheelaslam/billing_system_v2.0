<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Validator;
use App\Facades\ApiResponse;
use Carbon\Carbon;
use Storage;
use Avatar;
use App\Notifications\SignupActivate;
use App\Notifications\SignupActivated;
use App\User;
//use Validator;
//use Lang;
class AuthController extends Controller
{
    /**
     * Create user deactivate and send notification to activate account user
     *
     * @param  [string] name
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @return [string] message
     */
    public function signup(Request $request)
    {
        //dd($request);
        $validator = Validator($request->all(),[
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed'
        ]);
        if($validator->fails()){
            $msg = $validator->errors()->first();
            return ApiResponse::errorResponse('VALIDATION_ERROR', $msg, []);
        }
      

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'activation_token' => str_random(60)
        ]);

        $user->save();

        $avatar = Avatar::create($user->name)->getImageObject()->encode('png');
        Storage::put('avatars/'.$user->id.'/avatar.png', (string) $avatar);

        $user->notify(new SignupActivate($user));
        $msg = __('auth.signup_success');
        return ApiResponse::successResponse('SUCCESS', $msg, []);
    }

    /**
     * Confirm your account user (Activate)
     *
     * @param  [type] $token
     * @return [string] message
     * @return [obj] user
     */
    public function signupActivate($token)
    {
        $user = User::where('activation_token', $token)->first();

        if (!$user) {
            $msg = __('auth.token_invalid');
            return ApiResponse::errorResponse('UNAUTHORIZED_ERROR', $msg, []);
            //return $this->errorResponse($msg,[]);
            //return response()->json([
            //    'message' => __('auth.token_invalid')
            //], 404);
        }

        $user->active = true;
        $user->activation_token = '';
        $user->save();

        $user->notify(new SignupActivated($user));
        $msg = __('auth.active_success');
        return ApiResponse::successResponse('SUCCESS', $msg, []);
        //return $this->successResponse($msg,$user);
        //return $user;
    }

    /**
     * Login user and create token
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [boolean] remember_me
     * @return [string] access_token
     * @return [string] token_type
     * @return [string] expires_at
     */
    public function login(Request $request)
    {
        //dd($request->all());
        $validator = Validator($request->all(),[
                'email'   => 'required|exists:users,email',
                'password'  => 'required',
        ]);
        if($validator->fails()){
            $msg = $validator->errors()->first();
            return ApiResponse::errorResponse('VALIDATION_ERROR', $msg, []);
            //return $this->validateResponse($validator->errors()->first(),[]);
        }
        $credentials = request(['email', 'password']);
        if(Auth::attempt($credentials)) {

            $user = Auth::user();
            
            $tokenResult = $user->createToken('Personal Access Token')->accessToken;
            $user->token =  $tokenResult;   
            $msg = 'Login success';
            return ApiResponse::successResponse('SUCCESS', $msg , $user);
            //return $this->successResponse($msg,$user);
        
            
        }else {
            $msg = 'User not found';
            return ApiResponse::errorResponse('UNAUTHORIZED_ERROR', $msg, []);
            //return $this->errorResponse($msg,[]);
        }
       
    }



    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        $msg = __('auth.logout_success');
        return ApiResponse::successResponse('SUCCESS', $msg, []);
        //return $this->errorResponse($msg,[]);
        //return response()->json([
            //'message' => __('auth.logout_success')
        //]);
    }

    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user(Request $request)
    {
        $msg = __('User list successfully');
        return ApiResponse::successResponse('SUCCESS', $msg, $request->user());
        //return $this->successResponse($msg,$request->user());
        //return response()->json($request->user());
    }

}
