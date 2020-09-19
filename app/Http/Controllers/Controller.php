<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Mail;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;



    public function sendEmail($to ,$email_data, $body, $email_subject = ''){

        $res['results'] = $body;
        try {

            Mail::send([], $res, function ($message) use ($email_data, $to,$body, $email_subject) {

                $message->setBody($body, 'text/html' );
                if($email_subject != '')
                {
                    $subject = $email_subject;
                    $email_from = env('MAIL_FROM_ADDRESS');
                }
                else
                {
                    $subject = $email_data;
                    $email_from = 'info@billing.com';
                }

                $message->from($email_from, $name = 'Billing');
                $message->to($to, $to)->subject($subject);
                return [
                    'status'=> true
                ];
            });
        }catch (\Exception $e) {
           // dd($e->getMessage());
            return $e->getMessage();
        }
    }
}
