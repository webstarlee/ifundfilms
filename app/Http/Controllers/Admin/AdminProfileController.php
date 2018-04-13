<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Slim;
use App\User;
use App\Admin;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function showProfileAdmin($unique)
    {
        $admin = Admin::where('unique_id', $unique)->first();
        if ($admin) {
            return view('admin.profile', ['admin' => $admin]);
        }
        return back();
    }

    public function showProfileEmployee($unique)
    {
        $employee = User::where('unique_id', $unique)->first();
        if ($employee) {
            return view('admin.profileEmployee', ['employee' => $employee]);
        }
        return back();
    }

    public function updateAdminAvatar($unique, Request $request)
    {
        $admin = Admin::where('unique_id', $unique)->first();
        if ($admin) {
            $imageRand = rand(1000, 9999);
            $random_name = $imageRand."_".time()."_".$admin->id;

            if(!is_dir(public_path('uploads/avatars/'.$admin->unique_id))){
                mkdir(public_path('uploads/avatars/'.$admin->unique_id));
            }

            $dst = public_path('uploads/avatars/'.$admin->unique_id.'/');

            $finish_image = $this->uploadImagetoServer($request, $random_name, $dst);

            if ($finish_image['result'] == "fail") {
                return $finish_image['reason'];
            }

            if ($finish_image['result'] == "success") {
                $admin->avatar = $finish_image['image'][0]['name'];
                $admin->save();

                $avatar_url = asset('/uploads/avatars/'.$admin->unique_id.'/'.$admin->avatar);

                return $avatar_url;
            }

            return $finish_image->result;
        }
        return "fail";
    }

    public function updateEmployeeAvatar($unique, Request $request)
    {
        $employee = User::where('unique_id', $unique)->first();
        if ($employee) {
            $imageRand = rand(1000, 9999);
            $random_name = $imageRand."_".time()."_".$employee->id;

            if(!is_dir(public_path('uploads/avatars/'.$employee->unique_id))){
                mkdir(public_path('uploads/avatars/'.$employee->unique_id));
            }

            $dst = public_path('uploads/avatars/'.$employee->unique_id.'/');

            $finish_image = $this->uploadImagetoServer($request, $random_name, $dst);

            if ($finish_image['result'] == "fail") {
                return $finish_image['reason'];
            }

            if ($finish_image['result'] == "success") {
                $employee->avatar = $finish_image['image'][0]['name'];
                $employee->save();

                $avatar_url = asset('/uploads/avatars/'.$employee->unique_id.'/'.$employee->avatar);

                return $avatar_url;
            }

            return $finish_image->result;
        }
        return "fail";
    }

    public function updateAdminCover($unique, Request $request)
    {
        $admin = Admin::where('unique_id', $unique)->first();

        if ($admin) {

            $imageRand = rand(1000, 9999);
            $random_name = $imageRand."_".time()."_".$admin->id;

            if(!is_dir(public_path('uploads/covers/'.$admin->unique_id))){
                mkdir(public_path('uploads/covers/'.$admin->unique_id));
            }

            $dst = public_path('uploads/covers/'.$admin->unique_id.'/');

            $finish_image = $this->uploadImagetoServer($request, $random_name, $dst);

            if ($finish_image['result'] == "fail") {
                return $finish_image['reason'];
            }

            if ($finish_image['result'] == "success") {
                $admin->cover = $finish_image['image'][0]['name'];
                $admin->save();

                $cover_url = asset('/uploads/covers/'.$admin->unique_id.'/'.$admin->cover);

                return $cover_url;
            }

            return $finish_image->result;
        }
        return "fail";
    }

    public function updateEmployeeCover($unique, Request $request)
    {
        $employee = User::where('unique_id', $unique)->first();
        if ($employee) {
            $imageRand = rand(1000, 9999);
            $random_name = $imageRand."_".time()."_".$employee->id;

            if(!is_dir(public_path('uploads/covers/'.$employee->unique_id))){
                mkdir(public_path('uploads/covers/'.$employee->unique_id));
            }

            $dst = public_path('uploads/covers/'.$employee->unique_id.'/');

            $finish_image = $this->uploadImagetoServer($request, $random_name, $dst);

            if ($finish_image['result'] == "fail") {
                return $finish_image['reason'];
            }

            if ($finish_image['result'] == "success") {
                $employee->cover = $finish_image['image'][0]['name'];
                $employee->save();

                $avatar_url = asset('/uploads/covers/'.$employee->unique_id.'/'.$employee->cover);

                return $avatar_url;
            }

            return $finish_image->result;
        }
        return "fail";
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

    public function usernameValidate($new_username)
    {
        // return $new_username;
        $admin = Admin::where('username', $new_username)->count();
        $user = User::where('username', $new_username)->count();
        $total = $admin + $user;
        if($total != 0){
            return "exist";
        }else{
            return "new";
        }
    }

    public function emailValidate($new_email)
    {
        // return $new_username;
        $admin = Admin::where('email', $new_email)->count();
        $user = User::where('email', $new_email)->count();
        $total = $admin + $user;
        if($total != 0){
            return "exist";
        }else{
            return "new";
        }
    }

    public function updateAdminUnique($unique, Request $request)
    {
        $admin = Admin::where('unique_id', $unique)->first();
        if ($admin) {
            if ($admin->username != $request->unique_username) {
                $admin->username = $request->unique_username;
                $admin->save();
            }
            if ($admin->email != $request->unique_email) {
                $admin->email = $request->unique_email;
                $admin->save();
            }
            return back();
        }
        return back();
    }

    public function updateEmployeeUnique($unique, Request $request)
    {
        $employee = User::where('unique_id', $unique)->first();
        if ($employee) {
            if ($employee->username != $request->unique_username) {
                $employee->username = $request->unique_username;
                $employee->save();
            }
            if ($employee->email != $request->unique_email) {
                $employee->email = $request->unique_email;
                $employee->save();
            }
            return back();
        }
        return back();
    }

    public function updateAdminInfo($unique, Request $request)
    {
        $admin = Admin::where('unique_id', $unique)->first();
        if ($admin) {
            $admin->first_name = $request->firstName;
            $admin->last_name = $request->lastName;
            $admin->birth = $request->birth;
            $admin->save();

            return back();
        }
        return back();
    }

    public function encode_date_format($date)
    {
        $selectedDate = DateTime::createFromFormat('m/d/Y', $date);
        $finalDate = $selectedDate->format('Y-m-d');
        return $finalDate;
    }

    public function updateEmployeeInfo($unique, Request $request)
    {
        $employee = User::where('unique_id', $unique)->first();
        if ($employee) {
            $employee->first_name = $request->firstName;
            $employee->last_name = $request->lastName;
            if ($request->birth != "" || $request->birth != null) {
                $employee->birth = $this->encode_date_format($request->birth);
            } else {
                $employee->birth = "";
            }
            $employee->save();

            return back();
        }
        return back();
    }

    public function updateAdminPassOwn($unique, Request $request)
    {
        $admin = Admin::where('unique_id', $unique)->first();
        if ($admin) {
            if(Auth::guard('admin')->user()->id == $admin->id) {
                $current_password = $admin->password;
                if (Hash::Check($request->old_password, $current_password)) {
                    $admin->password = bcrypt($request->password);
                    $admin->save();
                    return "success";
                }
                return "invalidPass";
            }
            return "fail";
        }
        return "fail";
    }

    public function updateAdminPassForce($unique, Request $request)
    {
        $admin = Admin::where('unique_id', $unique)->first();
        if ($admin) {
            if(Auth::guard('admin')->user()->checkEditable($admin)) {
                $admin->password = bcrypt($request->force_password);
                $admin->save();
                return "success";
            }
            return "fail";
        }
        return "fail";
    }

    public function updateEmployeePassForce($unique, Request $request)
    {
        $employee = User::where('unique_id', $unique)->first();
        if ($employee) {
            $employee->password = bcrypt($request->force_password);
            $employee->save();
            return "success";
        }
        return "fail";
    }
}
