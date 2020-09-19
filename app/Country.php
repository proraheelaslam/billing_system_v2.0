<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use File;
class Country extends Model
{
    protected $fillable = [
        'id',
        'code',
        'name'
    ]; 

    protected $hidden = ['created_at','updated_at'];

    public function categories(){
        return $this->hasMany('App\Category','country_id');
    }

}
