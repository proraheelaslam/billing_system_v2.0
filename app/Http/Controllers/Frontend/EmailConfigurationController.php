<?php

namespace App\Http\Controllers\Frontend;

use App\Models\EmailConfiguration;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EmailConfigurationController extends Controller
{
    //

    public $viewPath;
    public function __construct()
    {
        $this->viewPath = 'frontend';
    }


    public function index(){
        return view($this->viewPath.'/email_configuration/index');
    }


    public function store(Request $request){

        $userId = Auth::id();
        $emailConfigFound = EmailConfiguration::where('language', $request->language)
            ->where('language_tone',$request->language_tone)
            ->where('user_id',$userId)
            ->where('type',$request->type)
            ->first();

        if (is_null($emailConfigFound)) {
            $emailConfiguration = new EmailConfiguration();
        }else {
            $id = $emailConfigFound->id;
            $emailConfiguration = EmailConfiguration::find($id);

        }
        $emailConfiguration->language = $request->language;
        $emailConfiguration->language_tone = $request->language_tone;
        $emailConfiguration->message = nl2br($request->message);
        $emailConfiguration->user_id = $userId;
        $emailConfiguration->type = $request->type;
        $emailConfiguration->save();

        return ['status'=> true, 'message'=> 'Email configuration has been saved'];

    }


    public function loadEmailTemplate(Request $request){


        $emailTemp = EmailConfiguration::where('type', $request->type)
                                          ->where('language', $request->lang)
                                          ->where('user_id', Auth::id())
                                          ->where('language_tone', $request->langTone)->first();
        return [
            'data'=> $emailTemp
        ];



    }



}
