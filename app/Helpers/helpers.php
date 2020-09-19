<?php
use App\Category;
use App\Country;
use App\Models\TmpDocument;
use App\Models\Quote;
use App\Models\Setting;

function getCategory(){
    $categories = Category::pluck('name','id');
    return $categories;
}

function getCountry(){
    $ountries = Country::pluck('name','id');
    return $ountries;
}


function get_catname($cat_id) {   
    $categoriesname = DB::table('categories')->where('id', $cat_id)->first();
    return (isset($categoriesname->name) ? $categoriesname->name : '');
}

if (! function_exists('setting')) {

    function setting($key, $default = null)
    {
        if (is_null($key)) {
            return new \App\Setting\Setting();
        }

        if (is_array($key)) {
            return \App\Setting\Setting::set($key[0], $key[1]);
        }

        $value = \App\Setting\Setting::get($key);

        return is_null($value) ? value($default) : $value;
    }
}


if (! function_exists('getMaxDocumentNumber')) {

    function getMaxDocumentNumber()
    {
        $maxNumberQuote = Quote::max('document_number');
        $maTtmpDocumentNumber =  TmpDocument::max('document_number');
       return Max([$maxNumberQuote,$maTtmpDocumentNumber]);
    }
}

if (! function_exists('getMaxQuoteNumber')) {

    function getMaxQuoteNumber()
    {
        return Quote::max('document_number');
    }
}

if (! function_exists('getMinDocumentNumber')) {

    function getMinDocumentNumber()
    {
        return TmpDocument::min('document_number');
    }
}



if (! function_exists('checkImagePath')) {

    function checkImagePath($path)
    {
        if (file_exists(public_path('uploads/'.$path))){
            return asset('uploads/'.$path);
        }
        else
            return asset('public/uploads/no_image.png');
    }
}

if (! function_exists('checkFilePath')) {

    function checkFilePath($path)
    {
        if (file_exists(public_path('uploads/'.$path))){
            return asset('uploads/'.$path);
        }
        else
            return asset('uploads/no_image.png');
    }
}

if (! function_exists('getSettingImage')) {

    function getSettingImage($key)
    {
       $setting =  Setting::where('setting_key',$key)->first();
       if ($setting->setting_key === 'logo' || $setting->setting_key === 'contact_image' || $setting->setting_key === 'home_image'){
           return $setting->fullImage;
       }else {
           return $setting->value;
       }

    }
}



?>