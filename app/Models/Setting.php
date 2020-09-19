<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //
    protected $fillable = ['setting_name','setting_key','setting_type','file', 'value'];
    protected $appends = [
        'fullImage'
    ];

    public function getFullImageAttribute()

    {
        $image_name = 'no_image.png';
        if($this->attributes['file']){

            $image_name = $this->attributes['file'];
            return checkImagePath('setting/'.$image_name);
        }else{
            return asset('public/uploads/no_image.png');
        }
    }

}
