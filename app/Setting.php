<?php

namespace App;

use DateTime;
use Route;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';

    public $timestamps = false;

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
      'company_id',
      'app_name',
      'logo_img',
      'logo_fav',
    ];

    /**
    * The attributes excluded from the model's JSON form.
    *
    * @var array
    */
    protected $hidden = [];

    public function time_format($time)
    {
        return date( "g:i A", strtotime($time));
    }
    public function time_format2($time)
    {
        return date( "H:i:s", strtotime($time));
    }

    public function menuActiveCheck($menu)
    {
        if ($menu == "dashboard") {
            if (Route::currentRouteName()=='admin.dashboard') {
                return true;
            }
            return false;
        }
        if ($menu == "employee") {
            if (Route::currentRouteName()=='admin.manage.attendance.single.calendar'
            || Route::currentRouteName()=='admin.manage.attendance.single.datatable'
            || Route::currentRouteName()=='admin.manage.employee'
            || Route::currentRouteName()=='admin.manage.holiday'
            || Route::currentRouteName()=='admin.manage.attendance'
            || Route::currentRouteName()=='admin.manage.attendance.single'
            || Route::currentRouteName()=='admin.manage.department'
            || Route::currentRouteName()=='admin.manage.designation') {
                return true;
            }
            return false;
        }
        if ($menu == "project") {
            if (Route::currentRouteName()=='admin.manage.project'
            || Route::currentRouteName()=='admin.manage.project.task'
            || Route::currentRouteName()=='admin.manage.project.sheet') {
                return true;
            }
            return false;
        }
        if ($menu == 'setting') {
            if (Route::currentRouteName()=='admin.setting.appearance'
            || Route::currentRouteName()=='admin.manage.contract'
            || Route::currentRouteName()=='admin.manage.event') {
                return true;
            }
            return false;
        }

        if ($menu == 'ticket') {
            if (Route::currentRouteName()=='admin.manage.ticket') {
                return true;
            }
            return false;
        }
    }
}
