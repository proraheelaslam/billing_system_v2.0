<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Client;
use App\Models\Quote;
use App\Models\TmpDocument;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Vinkla\Hashids\Facades\Hashids;


class ClientController extends Controller
{
    //

    public $viewPath;
    public $documentNumber;
    public function __construct()
    {
        $this->viewPath = 'frontend';
        $this->documentNumber = '1000';
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){

        $clients = Client::where('user_id', Auth::id())->orderBy('id','desc')->get();
        $type = 'clients';
        return view($this->viewPath.'/clients/list', compact('clients','type'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){

        return view($this->viewPath.'/clients/add');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function clientMenu()
    {
        return view($this->viewPath.'/clients/client_menu');
    }

    /**
     * @param Request $request
     * @return array
     */
    public function store(Request $request){

        $userId = Auth::user()->id;
        $workAddr = $request->work_address;
        $i =1;
        $client = new Client();
        $maxDocNumber =  TmpDocument::max('document_number');
        if (!is_null($maxDocNumber)) {
            $this->documentNumber = (int)$maxDocNumber;
        }
        if (count($workAddr) > 0) {
            foreach ($workAddr as $key => $address ){
                $tmpDoc = new TmpDocument();
                $tmpDoc->quote_id = $address['id'];
                $tmpDoc->document_number = $this->documentNumber+$i;
                $tmpDoc->save();
                $workAddr[$key]['document_no'] = $this->documentNumber+$i;
                $i++;
            }
        }else {
            $maxDocNumber = $maxDocNumber+1;
        }

        $client->document_number = $maxDocNumber;
        $client->first_name  = $request->first_name;
        $client->last_name  = $request->last_name;
        $client->email  = $request->email;
        $client->street  = $request->street;
        $client->street_number  = $request->street_number;
        $client->postal_code  = $request->postal_code;
        $client->municipality  = $request->municipality;
        $client->phone_number  = $request->phone_number;
        $client->tva_number  = $request->tva_number;
        $client->work_address  = json_encode($workAddr, true);
        $client->language  = $request->language;
        $client->language_tone  = $request->language_tone;
        $client->user_id  = $userId;
        $client->save();
        return ['status'=> true, 'message'=> 'Client has been created successfully'];
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $id = Hashids::decode($id);
        $client = Client::where('id', $id)->first();
        return view($this->viewPath.'/clients/edit',compact('client'));

    }

    /**
     * @param Request $request
     * @return array
     */
    public function update(Request $request){


        $workAddr = $request->work_address;
        $maxDocNumber =  TmpDocument::max('document_number');

        if (count($workAddr) > 0) {
            foreach ($workAddr as $key => $address ){
                $addObj = TmpDocument::where('quote_id', $address['id'])->first();

                if ($addObj) {
                    $workAddr[$key]['document_no'] = $addObj->document_number;
                }
            }
        }

        $clientId = $request->client_id;
        $client = Client::find($clientId);
        $client->first_name  = $request->first_name;
        $client->last_name  = $request->last_name;
        $client->email  = $request->email;
        $client->street  = $request->street;
        $client->street_number  = $request->street_number;
        $client->postal_code  = $request->postal_code;
        $client->municipality  = $request->municipality;
        $client->phone_number  = $request->phone_number;
        $client->tva_number  = $request->tva_number;
        $client->work_address  = json_encode($workAddr, true);
        $client->language  = $request->language;
        $client->language_tone  = $request->language_tone;
        $client->update();
        return ['status'=> true, 'message'=> 'Client has been update successfully'];

    }


    public function searchClient(Request $request){


        $type = $request->type;
        $srchKeyword = $request->q;

        if(isset($srchKeyword)){
            $clients = Client::where('user_id', Auth::id())->where('first_name', 'like', '%' . $srchKeyword . '%')
                ->orWhere('last_name', 'like', '%' . $srchKeyword . '%')->orderBy('id','desc')->get();

        }else {
            $clients = Client::where('user_id', Auth::id())->orderBy('id','desc')->get();
        }
        if($type =='clients_quote'){
            return [
                'status' => true,
                'view' => view($this->viewPath.'/clients_quote/quote_listing', compact('clients','type'))->render(),
            ];
        }else {
            return [
                'status' => true,
                'view' => view($this->viewPath.'/clients/client_listing', compact('clients','type'))->render(),
            ];
        }


    }


    public function show($id){
        $id = Hashids::decode($id);
        $client = Client::where('id', $id)->first();
        return view($this->viewPath.'/clients/edit',compact('client'));
    }

    public function delete($id){

        $client = Client::find($id);
        if ($client){
            Client::where('id', $id)->delete();
            Quote::where('client_id', $id)->delete();
        }
        return ['status' => true, 'message' => 'Client has been deleted successfully'];

    }
}
