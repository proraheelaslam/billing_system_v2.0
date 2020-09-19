<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ClientQuoteController extends Controller
{
    //

    public $viewPath;
    public function __construct()
    {
        $this->viewPath = 'frontend';
    }

    public function clientQuotes(Request $request){

        $type = $request->type;
        $clients = Client::with('quotes')->where('user_id', Auth::id())->orderBy('id','desc')->get();
        return view($this->viewPath.'/clients_quote/list', compact('clients','type'));
    }





}
