<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public $viewPath;

    public function __construct()
    {
        $this->viewPath = 'frontend';
    }

    public function index(){
        Auth::logout();
        return view($this->viewPath.'/home.index');
    }



}
