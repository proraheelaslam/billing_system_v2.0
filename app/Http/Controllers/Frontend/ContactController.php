<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;

class ContactController extends Controller
{
    //
    public $viewPath;
    public function __construct()
    {
        $this->viewPath = 'frontend';
    }

    public function index(){
        return view($this->viewPath.'/contact/contact');
    }

    public function contactUs(Request $request)
    {
        //dd($request->all());
        try {

            $data["email"]=   'robin.ballieu94@gmail.com';
            $data["from_email"]= $request->from_email;
            $data["subject"]=   $request->subject;
            $data["email_body"]=   $request->message;
            $data["client_name"]=   $request->client_name;

            \Mail::send([], $data, function($message)use($data) {
                $message->to($data["email"], $data["email"])
                    ->subject($data["subject"])
                    ->from(env('MAIL_FROM_ADDRESS'),'Billing')
                     ->setBody($data['email_body'], 'text/html' );
            });
            return [
                'status' => true, 'message'=> 'Message has been not sent'
            ];
        } catch (\Exception $e) {

            return [
                'status' => false, 'message'=> 'Error! Message has been not sent'
            ];
            //dd($e->getMessage());
        }
    }



    public function checkPdf(){

        $pdf = PDF::loadView($this->viewPath.'/quotes/quotes_template_pdf', []);
        $pdfName = time().'.pdf';
        $filename = base_path('public/uploads/quotes/'.$pdfName);
        $pdf->save($filename);
        dump($filename);
        //dump(asset('uploads/quotes/'.$pdfName));
        //dump($filename);
       // return $inventory_pdf->download('inventory.pdf');

    }
}
