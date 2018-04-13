<?php

namespace App\Http\Controllers\Admin;

use App\Slim;
use DateTime;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class adminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.home');
    }

    public function encode_time_format($time)
    {
        return date( "g:i A", strtotime($time));
    }

    public function decode_time_format($time)
    {
        return date( "H:i:s", strtotime($time));
    }

    public function decode_date_format($date)
    {
        $selectedDate = DateTime::createFromFormat('Y-m-d', $date);
        $finalDate = $selectedDate->format('m/d/Y');
        return $finalDate;
    }

    public function decode_date_time_format($date)
    {
        $selectedDate = DateTime::createFromFormat('Y-m-d H:i:s', $date);
        $finalDate = $selectedDate->format('m/d/Y');
        return $finalDate;
    }

    public function encode_date_format($date)
    {
        $selectedDate = DateTime::createFromFormat('m/d/Y', $date);
        $finalDate = $selectedDate->format('Y-m-d');
        return $finalDate;
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

    public function viewEmployee()
    {
        return view('admin.manageEmployees');
    }

    public function storeEmployee(Request $request)
    {
        $employee = new User;
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->username = $request->username;
        if ($request->birth != "") {
            $employee->birth = $this->encode_date_format($request->birth);
        }
        $employee->unique_id = str_random(10);
        $employee->email = $request->email;
        $employee->password = bcrypt($request->password);
        $employee->save();

        if ($request->slim != null) {
            $imageRand = rand(1000, 9999);
            $random_name = $imageRand."_".time()."_".$employee->id;

            if(!is_dir(public_path('uploads/avatars/'.$employee->unique_id))){
                mkdir(public_path('uploads/avatars/'.$employee->unique_id));
            }

            $dst = public_path('uploads/avatars/'.$employee->unique_id.'/');

            $finish_image = $this->uploadImagetoServer($request, $random_name, $dst);

            if ($finish_image['result'] == "success") {
                $employee->avatar = $finish_image['image'][0]['name'];
                $employee->save();
            }
        }

        return "success";
    }

    public function getEmployeeData(Request $request)
    {
        $employees = User::all();
        $metaData = array(
            "page" => 1,
            "pages" => 1,
            "perpage" => -1,
            "total" => 350,
            "sort" => "asc",
            "field" => "id"
        );
        $employee_array = array();
        foreach ($employees as $employee) {
            $photo_url = "";
            if (file_exists('uploads/avatars/'.$employee->unique_id.'/'.$employee->avatar)) {
                $photo_url = asset('/uploads/avatars/'.$employee->unique_id.'/'.$employee->avatar);
            } else {
                $photo_url = asset('/uploads/avatars/default.png');
            }
            $employee_array[] = array(
                'id' => $employee->id,
                'username' => $employee->username,
                'email' => $employee->email,
                'unique_id' => $employee->unique_id,
                'avatar' => $photo_url,
                'first_name' => $employee->first_name,
                'last_name' => $employee->last_name,
            );
        }

        $final_datas = array('meta' => $metaData, 'data' => $employee_array);

        return response()->json($final_datas);
    }

    public function deleteEmployee($unique_id)
    {
        $employee = User::where('unique_id', $unique_id)->first();
        if ($employee) {
            $employee->delete();
            return "success";
        }
        return "find_fail";
    }
}
