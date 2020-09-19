<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    //

    protected $table = 'quotes';

    protected $fillable = [
        'name',
        'email',
        'address',
        'postal_code',
        'tva_number',
        'tax',
        'concern',
        'calculation_quote',
        'tva_number',
        'total',
        'user_id',
        'language',
        'language_tone',
        'client_id',
        'address_id',
        'document_number',
        'phone_number',
        'concern_address',
        'status',
        'is_send',
        'is_quote_send',
        'is_bill_send',
        'is_final_review_bill',
        'file',
        'total_amount',
        'total_tva',
        'is_quote_converted',


    ];

    protected $hidden = ['created_at', 'updated_at'];

    protected $appends = ['file_path'];

    public function client()
    {

        return $this->belongsTo(Client::class, 'client_id');
    }

    public function getFilePathAttribute()

    {
        $file_name = 'no_image.png';
        if (@$this->attributes['file']) {

            $name = @$this->attributes['file'];
            return checkFilePath('quotes/' . $name);
        } else {
            return asset('uploads/no_image.png');
        }
    }


}
