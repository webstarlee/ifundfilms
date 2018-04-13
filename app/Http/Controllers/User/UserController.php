<?php

namespace App\Http\Controllers\User;

use Auth;
use DateTime;
use App\Slim;
use App\User;
use App\Task;
use App\Ticket;
use App\Admin;
use App\Event;
use App\Holiday;
use App\Project;
use App\Attendance;
use App\TimingSheet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Auth::user();
        return view('user.home', ['employee' => $employee]);
    }

    public function getDashboardEvent()
    {
        $myArray = array();

        $holidays = Holiday::all();

        foreach ($holidays as $holiday) {
            $myArray[] = array(
                'start' => $holiday->date,
                'color' => '#21dfbd',
                'title' => 'holiday',
                'rendering' => 'background',
                'description' => $holiday->title,
                'className' => 'm-fc-event--light m-fc-event--solid-primary'
            );
        }

        $events = Event::all();

        foreach ($events as $event) {
            $myArray[] = array(
                'start' => $event->event_date." ".$event->event_start,
                'description' => $event->event_note,
                'end' => $event->event_date." ".$event->event_end,
                'title' => $event->event_title,
                'color' => '#7636f3',
                'className' => "m-fc-event--light m-fc-event--solid-primary",
            );
        }

        return $myArray;
    }

    public function profile()
    {
        return view('user.profile');
    }

    public function profileUpdateAvatar(Request $request)
    {
        $employee = Auth::user();
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

    public function profileUpdateCover(Request $request)
    {
        $employee = Auth::user();
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

    public function updateEmployeeUnique(Request $request)
    {
        $employee = Auth::user();
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

    public function updateEmployeeInfo(Request $request)
    {
        $employee = Auth::user();
        if ($employee) {
            $employee->first_name = $request->firstName;
            $employee->last_name = $request->lastName;
            $employee->birth = $request->birth;
            $employee->social_number = $request->socialNumber;
            $employee->personal_number = $request->personalNumber;
            $employee->emergency_contact = $request->emergencyContact;
            $employee->save();

            return back();
        }
        return back();
    }

    public function updateEmployeePassOwn(Request $request)
    {
        $user = Auth::user();
        if ($user) {
            $current_password = $user->password;
            if (Hash::Check($request->old_password, $current_password)) {
                $user->password = bcrypt($request->password);
                $user->save();
                return "success";
            }
            return "invalidPass";
        }
        return "fail";
    }

    public function myproject()
    {
        return view('user.project');
    }

    public function mytask()
    {
        return view('user.task');
    }

    public function mytimingsheet()
    {
        return view('user.timeSheet');
    }

    public function ticket()
    {
        return view('user.ticket');
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

    public function encode_time_format($time)
    {
        return date( "g:i A", strtotime($time));
    }

    public function decode_time_format($time)
    {
        return date( "H:i:s", strtotime($time));
    }

    public function getMyproject()
    {
        $all_projects = Project::all();
        $myprojects = array();
        foreach ($all_projects as $singleProject) {
            $members = unserialize($singleProject->pro_members);
            if ($singleProject->pro_leader == Auth::user()->unique_id || in_array(Auth::user()->unique_id, $members)) {
                array_push($myprojects, $singleProject);
            }
        }

        $final_projects = array();
        if (count($myprojects) > 0) {
            foreach ($myprojects as $project) {
                $leader_admin = Admin::where('unique_id', $project->pro_leader)->first();
                $leader = "";
                if ($leader_admin) {
                    $leader = $leader_admin;
                } elseif ($project->pro_leader == Auth::user()->unique_id) {
                    $leader = Auth::user();
                }
                $leader_avatar = "";

                if (file_exists('uploads/avatars/'.$leader->unique_id.'/'.$leader->avatar)) {
                    $leader_avatar = asset('/uploads/avatars/'.$leader->unique_id.'/'.$leader->avatar);
                } else {
                    $leader_avatar = asset('/uploads/avatars/default.png');
                }

                $members = array();
                if ($project->pro_members != null || $project->pro_members != "") {
                    $serial_members = unserialize($project->pro_members);
                    foreach ($serial_members as $unique_id) {
                        $member = User::where('unique_id', $unique_id)->first();
                        $member_avatar = "";
                        if (file_exists('uploads/avatars/'.$member->unique_id.'/'.$member->avatar)) {
                            $member_avatar = asset('/uploads/avatars/'.$member->unique_id.'/'.$member->avatar);
                        } else {
                            $member_avatar = asset('/uploads/avatars/default.png');
                        }
                        $members[] = array('member_username' => $member->first_name." ".$member->last_name, 'member_avatar' => $member_avatar, 'member_unique' => $member->unique_id);
                    }
                }

                $final_projects[] = array(
                    'id' => $project->id,
                    'pro_name' => $project->pro_name,
                    'pro_id' => $project->pro_unid,
                    'pro_start_date' => $this->decode_date_format($project->pro_start_date),
                    'pro_end_date' => $this->decode_date_format($project->pro_end_date),
                    'leader_name' => $leader->first_name." ".$leader->last_name,
                    'leader_photo' => $leader_avatar,
                    'leader_unique' => $leader->unique_id,
                    'members' => $members,
                    'pro_priority' => $project->pro_priority,
                    'pro_status' => $project->pro_status,
                );
            }
        }

        return $final_projects;
    }

    public function getTaskTableData()
    {
        $tasks = Task::join('projects', 'projects.id', '=', 'tasks.pro_id')->select('tasks.*', 'projects.pro_name')->get();
        $my_tasks = array();
        foreach ($tasks as $singletask) {
            $serial_assings = unserialize($singletask->task_assign);
            if (in_array(Auth::user()->unique_id, $serial_assings)) {
                array_push($my_tasks, $singletask);
            }
        }

        $final_tasks = array();
        if (count($my_tasks) > 0) {
            foreach ($my_tasks as $task) {
                $members = array();
                if ($task->task_assign != null || $task->task_assign != "") {
                    $serial_members = unserialize($task->task_assign);
                    foreach ($serial_members as $unique_id) {
                        $member = User::where('unique_id', $unique_id)->first();
                        $member_avatar = "";
                        if (file_exists('uploads/avatars/'.$member->unique_id.'/'.$member->avatar)) {
                            $member_avatar = asset('/uploads/avatars/'.$member->unique_id.'/'.$member->avatar);
                        } else {
                            $member_avatar = asset('/uploads/avatars/default.png');
                        }
                        $members[] = array('member_username' => $member->first_name." ".$member->last_name, 'member_avatar' => $member_avatar, 'member_unique' => $member->unique_id);
                    }
                }

                $final_tasks[] = array(
                    'id' => $task->id,
                    'pro_name' => $task->pro_name,
                    'task_name' => $task->task_title,
                    'task_status' => $task->task_status,
                    'members' => $members,
                );
            }
        }

        return $final_tasks;
    }

    public function getSheetTableData()
    {
        $sheets = TimingSheet::where('employee_id', Auth::user()->unique_id)->join('projects', 'projects.id', '=', 'timing_sheets.pro_id')->select('timing_sheets.*', 'projects.pro_name')->get();
        $final_sheets = array();
        foreach ($sheets as $sheet) {
            $member = Auth::user();
            $photo_url = "";
            if (file_exists('uploads/avatars/'.$member->unique_id.'/'.$member->avatar)) {
                $photo_url = asset('/uploads/avatars/'.$member->unique_id.'/'.$member->avatar);
            } else {
                $photo_url = asset('/uploads/avatars/default.png');
            }

            $final_sheets[] = array(
                'id' => $sheet->id,
                'pro_name' => $sheet->pro_name,
                'sheet_date' => $this->decode_date_format($sheet->sheet_date),
                'sheet_time' => $sheet->work_time,
                'sheet_note' => $sheet->sheet_note,
                'employee_name' => $member->first_name.' '.$member->last_name,
                'employee_photo' => $photo_url,
                'employee_unique_id' => $member->unique_id,
            );
        }
        return $final_sheets;
    }
    public function getTicketTableData()
    {
        $tickets = Ticket::all();
        $myticket = array();
        foreach ($tickets as $singleTicket) {
            $serialedTickets = unserialize($singleTicket->ticket_follower);
            if (in_array(Auth::user()->unique_id, $serialedTickets) || $singleTicket->ticket_staff == Auth::user()->unique_id) {
                array_push($myticket, $singleTicket);
            }
        }

        $final_tickets = array();
        foreach ($myticket as $ticket) {
            $assign_staff = User::where('unique_id', $ticket->ticket_staff)->first();
            $assign_staff_avatar = "";
            if (file_exists('uploads/avatars/'.$assign_staff->unique_id.'/'.$assign_staff->avatar)) {
                $assign_staff_avatar = asset('/uploads/avatars/'.$assign_staff->unique_id.'/'.$assign_staff->avatar);
            } else {
                $assign_staff_avatar = asset('/uploads/avatars/default.png');
            }

            $followers = array();
            if ($ticket->ticket_follower != null || $ticket->ticket_follower != "") {
                $serialed_followers = unserialize($ticket->ticket_follower);
                foreach ($serialed_followers as $unique_id) {
                    $member = User::where('unique_id', $unique_id)->first();
                    $member_avatar = "";
                    if (file_exists('uploads/avatars/'.$member->unique_id.'/'.$member->avatar)) {
                        $member_avatar = asset('/uploads/avatars/'.$member->unique_id.'/'.$member->avatar);
                    } else {
                        $member_avatar = asset('/uploads/avatars/default.png');
                    }
                    $followers[] = array('follower_username' => $member->first_name." ".$member->last_name, 'follower_avatar' => $member_avatar, 'follower_unique' => $member->unique_id);
                }
            }

            $final_tickets[] = array(
                'id' => $ticket->id,
                'ticket_unique_id' => $ticket->ticket_unique_id,
                'ticket_subject' => $ticket->ticket_subject,
                'ticket_client' => $ticket->ticket_client,
                'ticket_staff_name' => $assign_staff->first_name." ".$assign_staff->last_name,
                'ticket_staff_avatar' => $assign_staff_avatar,
                'ticket_staff_id' => $assign_staff->unique_id,
                'ticket_priority' => $ticket->ticket_priority,
                'ticket_followers' => $followers,
                'ticket_note' => $ticket->ticket_note,
                'ticket_status' => $ticket->ticket_status,
                'ticket_create_date' => $this->decode_date_time_format($ticket->created_at),
            );
        }
        return $final_tickets;
    }
}
