<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use File;
class Category extends Model
{
    protected $fillable = [
        'id',
        'country_id',
        'name',
        'date',
        'radio',
        'dropdown',
        'checkbox',
        'searchableMultiSelectedCountries',
        'description'
    ]; 

    protected $hidden = ['created_at','updated_at'];
    
    public function prodects(){
        return $this->hasMany('App\Product','cat_id');
    }

    public function countries(){
        return $this->belongsTo('App\Country','country_id');
    }
    

    // this is a recommended way to declare event handlers
    public static function boot() {
        parent::boot();
        static::deleting(function($category) { // before delete() method call this
   
           // File::delete(public_path('images/backend_images/product').'/'.$product->image);
        
            foreach($category->prodects()->get() as $product){
                //print_r($product);
                    $product->delete();
                    foreach($product->images()->get() as $image){
                        File::delete(public_path('images/backend_images/product').'/large/'.$image->image);
                        File::delete(public_path('images/backend_images/product').'/medium/'.$image->image);
                        File::delete(public_path('images/backend_images/product').'/small/'.$image->image);
                        $image->delete();
                    }
                }
            // do the rest of the cleanup...
        });
    }    
    




}
