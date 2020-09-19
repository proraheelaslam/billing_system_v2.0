<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    //

    protected $table = 'galleries';

    protected $fillable = [
        'name',
        'type',
        'file',
        'folder_id',
        'note',


    ];

    protected $hidden = ['created_at','updated_at'];


    public function folders(){

        return $this->belongsTo(Folder::class,'folder_id');
    }
}
