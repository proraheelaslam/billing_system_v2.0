<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    //
    public $viewPath;

    public function __construct()
    {
        $this->viewPath = 'frontend';
    }

    public function logoSetting(){


        return view($this->viewPath.'/setting/logo_setting');
    }

    public function uploadImage(Request $request){

        $setting = Setting::where('setting_key', $request->setting_key)->first();
        if (!is_null($setting)) {

            $fileName = public_path('uploads/setting/'). $setting->file;
            File::delete($fileName);
            if ($request->has('file')) {
                $destinationPath = public_path('uploads/setting/');
                $image = $request->file('file');
                $orginalName = $image->getClientOriginalName();
                $fileName = Str::random(5) . '_' . $orginalName;
                $image->move($destinationPath, $fileName);
                $file = $fileName;
                $setting->setting_key = $request->setting_key;
                $setting->setting_type = $request->setting_type;
                $setting->file = $file;
                $setting->save();
                return ['status' => true, 'message' => 'Image has been uploaded', 'data' => []];
            } else {
                return ['status' => false, 'message' => 'Error uploading file', 'data' => []];
            }
        }

    }

}
