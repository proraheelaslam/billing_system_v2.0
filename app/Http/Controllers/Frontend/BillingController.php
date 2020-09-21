<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Client;
use App\Models\EmailConfiguration;
use App\Models\Quote;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Collection;

class BillingController extends Controller
{
    //
    public $viewPath;
    public function __construct()
    {
        $this->viewPath = 'frontend';
    }


    public function getPreBillLists(){

        $clientExistantQoutes = Client::with(['quotes'=> function($q){
            $q->where('is_quote_converted',0);
        }])->whereHas('quotes',function ($q) {
            $q->where('type','quote')->where('is_quote_converted',0);
        })->where('user_id', Auth::user()->id)->orderBy('last_name')->get();

        $nonClientQoutes = Quote::where('type','quote')->where('is_quote_converted',0)->where('client_id',0)
                            ->where('user_id', Auth::user()->id)->orderBy('created_at','desc')->get();
        //
        $data['clientExistantQoutes'] = $clientExistantQoutes;
        $data['nonClientQoutes'] = $nonClientQoutes;
        $type = '';
        //dd($data);
        return view($this->viewPath.'/pre_bill/lists', compact('data','type'));

    }

    public function searchPreBill(Request $request)
    {
        $type = $request->type;
        $srchKeyword = $request->q;

        $nonClientQoutes = Quote::where('type','quote')->where('is_quote_converted',0)->where('client_id',0)->where(function ($q) use ($srchKeyword){
            $q->where('name', 'like', '%' . $srchKeyword . '%')->orWhere('concern', 'like', '%' . $srchKeyword . '%');
        })->where('user_id', Auth::user()->id)->orderBy('last_name')->get();

        $clientExistantQoutes = Client::with(['quotes' => function ($q) use ($srchKeyword){

            $q->where('type','quote')->where('is_quote_converted',0)->where(function ($query) use ($srchKeyword){
                $query->where('name', 'like', '%' . $srchKeyword . '%')
                    ->orWhere('concern', 'like', '%' . $srchKeyword . '%');
            });
        }])->whereHas('quotes', function ($query) use ($srchKeyword){
            $query->where('type','quote')->where('is_quote_converted',0)->where(function ($query) use ($srchKeyword){
                $query->where('name', 'like', '%' . $srchKeyword . '%')
                    ->orWhere('concern', 'like', '%' . $srchKeyword . '%');
            });
        })->where('user_id', Auth::user()->id)->orderBy('last_name')
            ->get();

        $data['clientExistantQoutes'] = $clientExistantQoutes;
        $data['nonClientQoutes'] = $nonClientQoutes;
        return [
            'status' => true,
            'view' => view($this->viewPath.'/pre_bill/pre_bill_listing', compact('data','type'))->render(),
        ];
    }

    public function billsList(){

      $bills =   Quote::where('is_bill_send',1)->orderBy('is_final_review_bill','asc')->where('user_id', Auth::user()->id)->orderBy('updated_at','desc')->get();

      $total_unpaid = Quote::where('status','unpaid')->where('is_bill_send',1)->where('user_id', Auth::user()->id)->count();
      $total_paid =  Quote::where('status','paid')->where('is_bill_send',1)->where('user_id', Auth::user()->id)->count();
      $data['bills'] = $bills;
      $data['total_unpaid'] = $total_unpaid;
      $data['total_paid'] = $total_paid;
      return view($this->viewPath.'/bills/list', compact('data'));
    }

    public function updateBillStatus(Request $request){

       try{
           $quote = Quote::find($request->id);
           if ($request->status == 'unpaid'){
               $quote->status = 'paid';
               $quote->save();
               return ['status'=> true, 'message'=> 'Bill has been paid successfully'];
           }elseif ($request->status == 'paid') {
               $quote->is_final_review_bill = 1;
               $quote->save();
               return [];
           }else if ($request->status === 'to_unpaid'){
               $quote->status = 'unpaid';
               $quote->is_final_review_bill = 0;
               $quote->save();
               return ['status'=> true, 'message'=> 'Bill has been unpaid successfully'];


           }
       }catch (\Exception $e){
           return ['status'=> false, 'message'=> 'Bill is not paid due to some problem'];
       }


    }

    public function searchBill(Request $request){


        $srchKeyword = $request->q;
        //$billQuery =  Quote::where('is_send',1)->where('user_id', Auth::user()->id);
        $billQuery =  Quote::where('is_bill_send',1)->where('user_id', Auth::user()->id);
        $billData = $billQuery->where(function ($q) use ($srchKeyword) {
            $q->where('concern', 'like', '%' . $srchKeyword . '%');
            $q->orWhere('name', 'like', '%' . $srchKeyword . '%');
            $q->orWhere('concern_address', 'like', '%' . $srchKeyword . '%');
        })->where('user_id', Auth::user()->id)->orderBy('updated_at','desc');
        $data['bills'] = $billData->get();
        $billCollection = collect($billData->get());
        $unPaid = count($billCollection->where('status','unpaid')->all());
        $paid = count($billCollection->where('status','paid')->all());
        $total_unpaid =  $unPaid;
        $total_paid =   $paid;
        $data['total_unpaid'] = $total_unpaid;
        $data['total_paid'] = $total_paid;
        return [
            'status' => true,
            'view' => view($this->viewPath.'/bills/bill_listing', compact('data'))->render(),
        ];
    }


    public function emailAttachment(Request $request)
    {
        if ($request->has('quote_id')) {

            $emailTemplateType = $request->type;
            $qouteId = $request->query('quote_id');
            $qoute = Quote::find($qouteId);
            $lang = $qoute->language;
            $langTone = $qoute->language_tone;
            $q_type = $qoute->type;
            if($request->type == "convertor") {
                $q_type = 'bill';
            }
            $tmp = EmailConfiguration::where('type', $q_type);
            $tmp->where(function ($q) use ($lang, $langTone) {
                $q->where('language', $lang);
                $q->where('language_tone', $langTone);
            });
            $data['qoute'] = $qoute;
            $data['user'] = Auth::user();
            $data['email_template'] = $tmp->first();
            $data['subject_line'] = $qoute->concern . ' '.$qoute->address;
            if($qoute->client_id === 0) {
                $data['subject_line'] = $qoute->concern;
            }

            //dd($data);
            return view($this->viewPath . '/email_attachment/attachment', compact('data'));
        }

    }

    public function sendEmailAttachment(Request $request){

        $reply_to = 'robin.ballieu@outlook.be';
        $data["email"]=   $request->to_email;
        $data["from_email"]= $request->from_email;
        $data["subject"]=   $request->subject;
        $data["email_body"]=   $request->email_body;
        $data["attachment_pdf"]=   $request->attachment;
        $data["client_name"]=   $request->client_name;
        //$data["attachment_pdf"]=   'http://www.orimi.com/pdf-test.pdf';
        //$view  = [];
        $view  = $this->viewPath.'/email_templates/attachment_email_template';
        $file_name = $data["subject"].'.pdf';
        //dd($data);
        try{

          \Mail::send($view, $data, function($message)use($data, $reply_to, $file_name) {
                $message->to($data["email"], $data["email"])
                    ->replyTo($reply_to,'Reply To')
                    ->subject($data["subject"])
                    ->from(env('MAIL_FROM_ADDRESS'),$data["client_name"])
                    ->attach($data["attachment_pdf"], [
                          'as' => $file_name,
                          'mime' => 'application/pdf',
                      ]);
                  // ->attach($data['attachment_pdf']);
            });

            if ($request->template_type === 'bill') {

                $quote = Quote::find($request->quote_id);
                $quote->is_send = 1;
                $quote->status = 'unpaid';
                //$quote->type = 'bill';
                $quote->is_bill_send = 1;
                $quote->save();

            }else if($request->template_type === 'convertor'){

                $quote = Quote::find($request->quote_id);
                $quote->is_quote_converted = 1;
                $quote->is_send = 1;
                $quote->status = 'unpaid';
                $quote->is_bill_send = 1;
                $quote->save();
            }

            return ['status' => true];

        }catch(\Exception $e){
            return ['status' => false];
            dump( $e->getMessage());
        }
    }


    public function sendQuoteBill(Request $request){

        $qouteFound = Quote::where('document_number', $request->document_number)->first();

        if($qouteFound) {
            return [
                'status'=> true, 'data'=> $qouteFound, 'type'=> $request->type, 'message'=> ''
            ];
        }else {
            return [
              'status'=> false, 'data'=> [],'type'=> $request->type, 'message'=> 'Please save this before send'
            ];
        }
    }
}
