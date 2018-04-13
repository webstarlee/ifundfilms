@extends('layouts.app')

@section('title')
Dashboard
@endsection

@section('pageTitle')
Dashboard
@endsection

@section('plugin_style')
<link href="/assets/plugins/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
@endsection

@section('customStyle')
<link href="/css/customProfile.css" rel="stylesheet" type="text/css" />
<link href="/css/customAttend.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-4">
            <div class="m-portlet m-portlet--full-height" id="employee_info">
                <div class="m-portlet__body">
                    <div class="m-card-profile">
                        <div class="m-card-profile__pic">
                            <?php
                                $coverimg_url = "";
                                if ($employee->cover == "default.jpg") {
                                    $coverimg_url = "/uploads/covers/default.jpg";
                                } else {
                                    if (file_exists('uploads/covers/'.$employee->unique_id.'/'.$employee->cover)) {
                                        $coverimg_url = '/uploads/covers/'.$employee->unique_id.'/'.$employee->cover;
                                    } else {
                                        $coverimg_url = "/uploads/covers/default.jpg";
                                    }
                                }
                            ?>
                            <div class="m-card-profile__cover-pic  m-{{$employee->unique_id}}-profile-cover" style="background-image: url({{$coverimg_url}})">

                            </div>
                            <div class="m-card-profile__pic-wrapper">
                                @if($employee->avatar == "default.jpg")
                                    <img src="/uploads/avatars/default.png" class="m--img-rounded m--marginless m-{{$employee->unique_id}}-profile-avatar" alt=""/>
                                @else
                                    @if (file_exists('uploads/avatars/'.$employee->unique_id.'/'.$employee->avatar))
                                        <img src="{{asset('uploads/avatars/'.$employee->unique_id.'/'.$employee->avatar)}}" class="m--img-rounded m--marginless m-{{$employee->unique_id}}-profile-avatar" alt="author">
                                    @else
                                        <img src="/uploads/avatars/default.png" class="m--img-rounded m--marginless m-{{$employee->unique_id}}-profile-avatar" alt="">
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="m-card-profile__details">
                            <span class="m-card-profile__name">
                                {{$employee->first_name}} {{$employee->last_name}} (Employee)
                            </span>
                            <a href="mailto:{{$employee->email}}" class="m-card-profile__email m-link">
                                {{$employee->email}}
                            </a>
                        </div>
                        <div class="m-widget1 m-widget1--paddingless">
                            <div class="m-widget1__item">
                                <div class="row m-row--no-padding align-items-center">
                                    <div class="col">
                                        <h3 class="m-widget1__title">
                                            @lang('language.client_id')
                                        </h3>
                                    </div>
                                    <div class="col m--align-right">
                                        <span class="m-widget1__number m--font-brand">
                                            {{$employee->client_id}}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="m-widget1__item">
                                <div class="row m-row--no-padding align-items-center">
                                    <div class="col">
                                        <?php
                                            $join_day = "";
                                            if ($employee->join_date != null || $employee->join_date != "") {
                                                $selectedDate = DateTime::createFromFormat('Y-m-d', $employee->join_date);
                                                $join_day = $selectedDate->format('m/d/Y');
                                            } else {
                                                $join_day = "Not joined yet";
                                            }
                                        ?>
                                        <h3 class="m-widget1__title">
                                            @lang('language.join_date'): <span style="color:#df4964;float: right;">{{$join_day}}</span>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="m-widget1__item">
                                <div class="row m-row--no-padding align-items-center">
                                    <?php
                                        $todayDate = date('Y-m-d');
                                        $status_string = "not inserted";
                                        $today_attendance_check = \App\Attendance::where('employee_id', $employee->id)->where('attend_date', $todayDate)->whereIn('attend_type', [0,1,2,3,7])->first();
                                        if ($today_attendance_check) {
                                            if ($today_attendance_check->attend_type == 0) {
                                                $status_string = "absence";
                                            }
                                            if ($today_attendance_check->attend_type == 1) {
                                                $status_string = "working";
                                            }
                                            if ($today_attendance_check->attend_type == 2) {
                                                $status_string = "business trip";
                                            }
                                            if ($today_attendance_check->attend_type == 3) {
                                                $status_string = "vacation";
                                            }
                                            if ($today_attendance_check->attend_type == 7) {
                                                $status_string = "parental leave";
                                            }
                                        }
                                    ?>
                                    <div class="col">
                                        <h3 class="m-widget1__title">
                                            today status: <span style="color:#04cfa4;float: right;">{{$status_string}}</span>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="m-portlet m-portlet--full-height" id="employee_vac_info">
                <?php
                    $current_year = date("Y");
                    $mvacation = \App\EmployeeVacation::where('vac_year', $current_year)->where('employee_id', $employee->unique_id)->first();
                    $mcontract = \App\ContractType::find($employee->contract_type);
                    $working_time = $mcontract->working_time;

                    $total_mins = $mvacation->vac_total_min + $mvacation->vac_extra_min;
                    $final_minutes = $total_mins%60;
                    $final_hours = ($total_mins - $final_minutes)/60;

                    $toshow_string_total = $final_hours." hours ".$final_minutes." minutes";
                    $toshow_string_total_days = 0;
                    if ($total_mins > 0) {
                        $toshow_string_total_days = intval($total_mins/$working_time);
                    }

                    $spent_mins = $mvacation->vac_spend_min;
                    $final_spent_minutes = $spent_mins%60;
                    $final_spent_hours = ($spent_mins - $final_spent_minutes)/60;

                    $toshow_string_spent = $final_spent_hours." hours ".$final_spent_minutes." minutes";
                    $toshow_string_spent_days = 0;
                    if ($spent_mins > 0) {
                        $toshow_string_spent_days = intval($spent_mins/$working_time);
                    }

                    $left_vac_min = $mvacation->vac_total_min + $mvacation->vac_extra_min - $mvacation->vac_spend_min;

                    $final_left_minutes = $left_vac_min%60;
                    $final_left_hours = ($left_vac_min - $final_left_minutes)/60;

                    $toshow_string_left = $final_left_hours." hours ".$final_left_minutes." minutes";

                    $toshow_string_left_days = 0;
                    if ($left_vac_min > 0) {
                        $toshow_string_left_days = intval($left_vac_min/$working_time);
                    }
                ?>
                <div class="m-portlet__head" style="height: 50px;">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                <i class="la la-gear"></i> &nbsp;Vacation - {{$current_year}}
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div id="vac_circle_chart">
                      <strong></strong>
                    </div>
                    <div class="m-portlet__body-separator" style="margin-bottom: 0;"></div>
                    <div class="m-widget1 m-widget1--paddingless">
                        <div class="m-widget1__item">
                            <div class="row m-row--no-padding align-items-center">
                                <div class="col">
                                    <h3 class="m-widget1__title">
                                        Total date: &nbsp;<span style="color:#04cfa4;float: right;">{{$toshow_string_total_days}} days</span>
                                    </h3>
                                    <span class="m-widget1__desc">
                                        ({{$toshow_string_total}})
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="m-widget1__item">
                            <div class="row m-row--no-padding align-items-center">
                                <div class="col">
                                    <h3 class="m-widget1__title">
                                        Spent date: &nbsp;<span style="color:#e23b4a;float: right;">{{$toshow_string_spent_days}} days</span>
                                    </h3>
                                    <span class="m-widget1__desc">
                                        ({{$toshow_string_spent}})
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="m-widget1__item">
                            <div class="row m-row--no-padding align-items-center">
                                <div class="col">
                                    <h3 class="m-widget1__title">
                                        Left date: &nbsp;<span style="color:#04cfa4;float: right;">{{$toshow_string_left_days}} days</span>
                                    </h3>
                                    <span class="m-widget1__desc">
                                        ({{$toshow_string_left}})
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="m-portlet m-portlet--full-height">
                <?php
                    $todayFormat = date('m/Y');
                    $this_month = date('Y-m');
                ?>
                <div class="m-portlet__head" style="height: 50px;">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                <i class="la la-calendar"></i> &nbsp;{{$todayFormat}}
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="m-widget1 m-widget1--paddingless">
                        <div class="m-widget1__item">
                            <?php
                                $attend_works = \App\Attendance::where('employee_id', $employee->id)->where('attend_date','like', $this_month.'%')->where('attend_type', 1)->get();
                                $work_total = 0;
                                $work_time = 0;
                                if ($attend_works) {
                                    foreach ($attend_works as $attend_work) {
                                        $work_total ++;
                                        $work_time = $work_time + $attend_work->attend_work_time;
                                    }
                                    $final_work_minutes = $work_time%60;
                                    $final_work_hours = ($work_time - $final_work_minutes)/60;

                                    $toshow_string_work = $final_work_hours." hours ".$final_work_minutes." minutes";
                                }
                            ?>
                            <div class="row m-row--no-padding align-items-center">
                                <div class="col">
                                    <h3 class="m-widget1__title">
                                        work date: &nbsp;<span style="color:#04cfa4;float: right;">{{$work_total}} days</span>
                                    </h3>
                                    <span class="m-widget1__desc">
                                        ({{$toshow_string_work}})
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="m-widget1__item">
                            <?php
                                $attend_busineses = \App\Attendance::where('employee_id', $employee->id)->where('attend_date','like', $this_month.'%')->where('attend_type', 2)->get();
                                $busines_total = 0;
                                $busines_time = 0;
                                if ($attend_busineses) {
                                    foreach ($attend_busineses as $attend_business) {
                                        $busines_total ++;
                                        $busines_time = $busines_time + $attend_business->attend_work_time;
                                    }
                                    $final_business_minutes = $busines_time%60;
                                    $final_business_hours = ($busines_time - $final_business_minutes)/60;

                                    $toshow_string_business = $final_business_hours." hours ".$final_business_minutes." minutes";
                                }
                            ?>
                            <div class="row m-row--no-padding align-items-center">
                                <div class="col">
                                    <h3 class="m-widget1__title">
                                        Business Trip: &nbsp;<span style="color:#04cfa4;float: right;">{{$busines_total}} days</span>
                                    </h3>
                                    <span class="m-widget1__desc">
                                        ({{$toshow_string_business}})
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="m-widget1__item">
                            <?php
                                $attend_vacations = \App\Attendance::where('employee_id', $employee->id)->where('attend_date','like', $this_month.'%')->where('attend_type', 3)->get();
                                $vacation_total = 0;
                                $vacation_time = 0;
                                if ($attend_vacations) {
                                    foreach ($attend_vacations as $attend_vacation) {
                                        $vacation_total ++;
                                        $vacation_time = $vacation_time + $attend_vacation->attend_work_time;
                                    }
                                    $final_vacations_minutes = $vacation_time%60;
                                    $final_vacations_hours = ($vacation_time - $final_vacations_minutes)/60;

                                    $toshow_string_vacations = $final_vacations_hours." hours ".$final_vacations_minutes." minutes";
                                }
                            ?>
                            <div class="row m-row--no-padding align-items-center">
                                <div class="col">
                                    <h3 class="m-widget1__title">
                                        Vacation: &nbsp;<span style="color:#04cfa4;float: right;">{{$vacation_total}} days</span>
                                    </h3>
                                    <span class="m-widget1__desc">
                                        ({{$toshow_string_vacations}})
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="m-widget1__item">
                            <?php
                                $attend_parents = \App\Attendance::where('employee_id', $employee->id)->where('attend_date','like', $this_month.'%')->where('attend_type', 7)->get();
                                $parent_total = 0;
                                if ($attend_parents) {
                                    foreach ($attend_parents as $attend_parent) {
                                        $vacation_total ++;
                                    }
                                }
                            ?>
                            <div class="row m-row--no-padding align-items-center">
                                <div class="col">
                                    <h3 class="m-widget1__title">
                                        Parental Leave: &nbsp;<span style="color:#04cfa4;float: right;">{{$parent_total}} days</span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="m-widget1__item">
                            <?php
                                $attend_absences = \App\Attendance::where('employee_id', $employee->id)->where('attend_date','like', $this_month.'%')->where('attend_type', 0)->get();
                                $absence_total = 0;
                                if ($attend_absences) {
                                    foreach ($attend_absences as $attend_absence) {
                                        $absence_total ++;
                                    }
                                }
                            ?>
                            <div class="row m-row--no-padding align-items-center">
                                <div class="col">
                                    <h3 class="m-widget1__title">
                                        Absence: &nbsp;<span style="color:#04cfa4;float: right;">{{$absence_total}} days</span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="m-portlet" id="m_portlet">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <span class="m-portlet__head-icon">
                        <i class="flaticon-map-location"></i>
                    </span>
                    <h3 class="m-portlet__head-text">
                        Event Calendar
                    </h3>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">
            <div id="m_dash_event_calendar"></div>
        </div>
    </div>
@endsection

@section('plugin_script')
<script src="/assets/plugins/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
<script src="/assets/plugins/circle-progress.min.js" type="text/javascript"></script>
@endsection

@section('customScript')
    <script type="text/javascript">
        $.ajax({
            url: '/attendance/getVacationPercent/',
            type: 'get',
            success: function(result){
                if (result.result != "fail") {
                    var percent = result.percent;
                    var point_percent = percent/100;
                    $('#vac_circle_chart').circleProgress({
                        startAngle: -Math.PI / 4 * 2,
                        value: point_percent,
                        fill: {color: '#30e226'},
                        size: 170,
                     }).on('circle-animation-progress', function(event, progress) {
                       $(this).find('strong').html(Math.round(percent * progress) + '<i>%</i>');
                     });
                }
            },
            error: function(error){
                console.log(error);
            }
        });
    </script>
    <script src="/js/calendar/employeeDashboardCalendar.js" type="text/javascript"></script>
@endsection
