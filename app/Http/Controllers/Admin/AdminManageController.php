<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Slim;
use App\Admin;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminManageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin.manageAdmins');
    }

    public function getAdminData(Request $request)
    {
        $admins = Admin::all();
        $final_admins = array();
        foreach ($admins as $admin) {
            if (Auth::guard('admin')->user()->role >= $admin->role && Auth::guard('admin')->user()->id != $admin->id) {
                array_push($final_admins, $admin);
            }
        }
        $metaData = array(
            "page" => 1,
            "pages" => 1,
            "perpage" => -1,
            "total" => 350,
            "sort" => "asc",
            "field" => "id"
        );

        $final_datas = array('meta' => $metaData, 'data' => $final_admins);

        return response()->json($final_datas);
    }

    public function usernameCheck(Request $request)
    {
        $new_username = $request->username;
        $admin = Admin::where('username', $new_username)->count();
        $user = User::where('username', $new_username)->count();
        $total = $admin + $user;
        if($total != 0){
            return "exist";
        }else{
            return "new";
        }
    }

    public function emailCheck(Request $request)
    {
        $new_email = $request->email;
        $admin = Admin::where('email', $new_email)->count();
        $user = User::where('email', $new_email)->count();
        $total = $admin + $user;
        if($total != 0){
            return "exist";
        }else{
            return "new";
        }
    }

    public function storeAdmin(Request $request)
    {
        $selected_role = $request->user_role;
        if (Auth::guard('admin')->user()->role >= $selected_role) {
            $admin = new Admin;
            $admin->first_name = $request->first_name;
            $admin->last_name = $request->last_name;
            $admin->username = $request->username;
            $admin->unique_id = str_random(10);
            $admin->birth = $request->birth;
            $admin->email = $request->email;
            $admin->password = bcrypt($request->password);
            $admin->role = $request->user_role;
            $admin->nation = $request->nation;
            $admin->state = $request->state;
            $admin->department = $request->department;
            $admin->emergency_contact = $request->emergency_contact;
            $admin->social_number = $request->social_number;
            $admin->personal_number = $request->personal_number;
            $admin->save();

            if ($request->slim != null) {
                $imageRand = rand(1000, 9999);
                $random_name = $imageRand."_".time()."_".$admin->id;

                if(!is_dir(public_path('uploads/avatars/'.$admin->unique_id))){
                    mkdir(public_path('uploads/avatars/'.$admin->unique_id));
                }

                $dst = public_path('uploads/avatars/'.$admin->unique_id.'/');

                $finish_image = $this->uploadImagetoServer($request, $random_name, $dst);

                if ($finish_image['result'] == "success") {
                    $admin->avatar = $finish_image['image'][0]['name'];
                    $admin->save();
                }
            }

            return "success";
        }
        return "role_fail";
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

    public function deleteAdmin($unique_id)
    {
        $admin = Admin::where('unique_id', $unique_id)->first();
        if ($admin) {
            if(Auth::guard('admin')->user()->checkEditable($admin)) {
                $admin->delete();
                return "success";
            }
            return "role_fail";
        }
        return "find_fail";
    }
}
