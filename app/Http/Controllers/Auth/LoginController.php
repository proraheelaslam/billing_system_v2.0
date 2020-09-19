<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/menu';



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();
        return $this->loggedOut($request) ?: redirect('/login');
    }


    public function postLogin(Request $request){


        $password = $request->password;
        $email = $request->email;
       /* $user = User::find(1);
        if (!Hash::check($password, $user->password)) {
            return ['status'=>false, 'message' => 'Login fail, Please check password'];
        }*/
        $credentials = ['email'=> $email, 'password'=> $password];
        if (Auth::attempt($credentials)) {
            return [
                'status'=>true, 'message' => 'You have login successfully'
            ];
        }else{
            return [
                'status'=>false, 'message' => 'Invalid email and password'
            ];
        }


    }
}
