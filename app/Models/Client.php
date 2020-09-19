<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    protected $table = 'clients';


    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'work_address',
        'language',
        'language_tone',
        'street',
        'street_number',
        'municipality',
        'postal_code',
        'tva_number',
        'document_number',
        'user_id'
    ];


    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }


    public function quotes(){

        return $this->hasMany(Quote::class,'client_id')
                                                ->where('type','quote');
    }


    public function quote_bills(){

        return $this->hasMany(Quote::class,'client_id')
                                           ->whereIn('type',['bill','quote'])
                                           ->whereIn('is_quote_converted',[1]);

    }
}
