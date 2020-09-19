<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    //
    public $viewPath;
    public function __construct()
    {
        $this->viewPath = 'frontend';
    }

    public function index(){

        return view($this->viewPath.'/menu/menu');
    }


    public function quoteMenu(){
        return view($this->viewPath.'/menu/quote_menu');
    }

    public function quoteSubMenu(){

        return view($this->viewPath.'/menu/create_qoute_menu');
    }

    public function clientMenu(){

        return view($this->viewPath.'/menu/client_menu');
    }

    public function billingMenu(){
        return view($this->viewPath.'/menu/billing_menu');
    }

    public function billingSubMenu(){
        return view($this->viewPath.'/menu/create_billing_menu');
    }


    public function createBillingSubMenu(){
        return view($this->viewPath.'/menu/create_billing_sub_menu');
    }

    public function configurationMenu(){

        return view($this->viewPath.'/menu/configuration_menu');
    }



}
