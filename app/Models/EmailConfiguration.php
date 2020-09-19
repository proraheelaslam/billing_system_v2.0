<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailConfiguration extends Model
{
    //
    protected $table = 'email_configurations';


    protected $fillable = [
        'language',
        'language_tone',
        'message',
        'user_id',
        'type',
    ];


    protected $appends = ['format_message'];

    public function getFormatMessageAttribute(){
        $message =  nl2br($this->message);
        return str_replace("<br />","",$message);
    }
}

