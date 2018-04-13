<?php

namespace App\Http\Controllers\Admin;

use Auth;
use DateTime;
use App\Slim;
use App\User;
use App\Admin;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin.settingAppearance');
    }

    public function update_name(Request $request)
    {
        $setting_exist = Setting::find(1);
        $setting = "";
        if ($setting_exist) {
            $setting = $setting_exist;
        } else {
            $setting = new Setting;
        }
        $setting->app_name = $request->company_name;
        $setting->save();
        return "success";
    }

    public function uploadImagetoServer($imgdata, $name, $path)
    {
        $files = array();
        $result = array();
        $rules = [
            'file' => 'image',
            'slim[]' => 'image'
        ];

        $validator = Validator::make($imgdata->all(), $rules);
        $errors = $validator->errors();

        if($validator->fails()){
            $result = array('result' => 'fail', 'reson' => 'validator');
            return $result;
        }

        // Get posted data
        $images = Slim::getImages();

        // No image found under the supplied input name
        if ($images == false) {
            $result = array('result' => 'fail', 'reson' => 'image');
            return $result;
        } else {
            foreach ($images as $image) {
                // save output data if set
                if (isset($image['output']['data'])) {
                    // Save the file
                    $origine_name = $image['input']['name'];
                    $file_type = pathinfo($origine_name, PATHINFO_EXTENSION);
                    $finalName = $name.".".$file_type;

                    // We'll use the output crop data
                    $data = $image['output']['data'];
                    $output = Slim::saveFile($data, $finalName, $path, false);
                    array_push($files, $output);
                    $result = array('result' => 'success', 'image' => $files);
                    return $result;
                }
                // save input data if set
                if (isset ($image['input']['data'])) {
                    // Save the file
                    $origine_name = $image['input']['name'];
                    $file_type = pathinfo($origine_name, PATHINFO_EXTENSION);
                    $finalName = $name.".".$file_type;

                    $data = $image['input']['data'];
                    $input = Slim::saveFile($data, $finalName, $path, false);
                    array_push($files, $output);

                    $result = array('result' => 'success', 'image' => $files);
                    return $result;
                }
            }
        }
    }

    public function update_logo(Request $request)
    {
        $setting_exist = Setting::find(1);
        $setting = "";
        if ($setting_exist) {
            $setting = $setting_exist;
        } else {
            $setting = new Setting;
        }

        if ($request->slim != "") {
            $imageRand = rand(1000, 9999);
            $random_name = $imageRand."_".time();
            $dst = public_path('uploads/logos/');

            $finish_image = $this->uploadImagetoServer($request, $random_name, $dst);

            if ($finish_image['result'] == "fail") {
                return $finish_image['reason'];
            }

            if ($finish_image['result'] == "success") {
                $setting->logo_img = $finish_image['image'][0]['name'];
                $setting->save();

                $logo_url = asset('/uploads/logos/'.$setting->logo_img);

                return $logo_url;
            }
        }
        return "fail";
    }

    public function update_fav(Request $request)
    {
        $setting_exist = Setting::find(1);
        $setting = "";
        if ($setting_exist) {
            $setting = $setting_exist;
        } else {
            $setting = new Setting;
        }

        if ($request->slim != "") {
            $imageRand = rand(1000, 9999);
            $random_name = $imageRand."_".time();
            $dst = public_path('uploads/logos/');

            $finish_image = $this->uploadImagetoServer($request, $random_name, $dst);

            if ($finish_image['result'] == "fail") {
                return $finish_image['reason'];
            }

            if ($finish_image['result'] == "success") {
                $setting->logo_fav = $finish_image['image'][0]['name'];
                $setting->save();

                $logo_url = asset('/uploads/logos/'.$setting->logo_fav);

                return $logo_url;
            }
        }
        return "fail";
    }
}
