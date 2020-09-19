<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //
    public $viewPath;
    public function __construct()
    {
        $this->viewPath = 'frontend';
    }

    public function index(){

        $user = Auth::user();

        return view($this->viewPath.'/profile/profile', compact('user'));
    }

    public function updateProfile(Request $request){

        $id = $request->id;
        $value = $request->fieldValue;
        $type = $request->type;
        if ($type == 'address') {
            $user = User::find($id);
            $user->street = $request->street;
            $user->street_number = $request->street_number;
            $user->postal_code = $request->postal_code;
            $user->municipality = $request->municipality;
            $user->save();
            //User::where('id',$id)->update([$type => $value]);
        }elseif ($type == 'bank_account'){
            $user = User::find($id);
            $user->bank_account = $request->bank_account;
            $user->bic = $request->bic;
            $user->save();
        } else {
            if ($type == 'password') {
                if (empty($value)) {
                    return [];
                }else{
                    $value =  Hash::make($value);
                }

            }



            User::where('id',$id)->update([$type => $value]);
        }

        return ['status' => true, 'message' => 'profile has been update successfully '];

    }


}
