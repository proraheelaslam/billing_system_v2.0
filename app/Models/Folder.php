<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    //

    protected $table = 'folders';

    protected $fillable = [
        'title',
        'name',
        'address_id',
        'client_id',

    ];

    protected $hidden = ['created_at','updated_at'];

    public function files(){
        return $this->hasMany(Gallery::class, 'folder_id');
    }

}
