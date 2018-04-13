@extends('layouts.app')
@section('title')
My Attendance
@endsection
@section('pageTitle')
My Attendance
@endsection
@section('plugin_style')
<link href="/assets/plugins/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
@endsection
@section('customStyle')
<link href="/css/customAttend.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <?php
        $setting = \App\Setting::where('id', 1)->first();
    ?>

    <div class="m-portlet" id="m_portlet">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <span class="m-portlet__head-icon">
                        <i class="flaticon-map-location"></i>
                    </span>
                    <h3 class="m-portlet__head-text">
                        Attendance Calendar
                    </h3>
                </div>
            </div>
            <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item">
                        <a href="javascript:;" id="add-new-attendance-btn" class="btn btn-outline-accent m-btn m-btn--custom m-btn--icon m-btn--air">
                            <span>
                                <i class="la la-plus"></i>
                                <span>
                                    Add Attendance
                                </span>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="m-portlet__body">
            <div id="m_attendance_calendar"></div>
        </div>
    </div>

    <div class="modal fade m-custom-modal" id="m-admin-new_attendance-modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">
						Add New Attendance
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="cursor: pointer;">
						<span aria-hidden="true">
							&times;
						</span>
					</button>
				</div>
                <form id="m-admin-new_attendance-form" action="{{route('attendance.store')}}" role="form" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                    {{ csrf_field() }}
    				<div class="modal-body" style="padding-bottom: 10px;">
                        <div class="row ">
                            <div class="col-sm-6">
                                <div class="m-form__content"></div>
                                <div class="form-group m-form__group">
                                    <label for="exampleInputEmail1">
                                        Contract Type:
                                    </label>
                                    <div class="input-group m-input-group m-input-group--air">
                                        <span class="input-group-addon">
                                            <i class="flaticon-tool-1"></i>
                                        </span>
                                        <input type="text" class="form-control m-input" value="{{$employee->contract_title}}" placeholder="Enter date" readonly>
                                    </div>
                                </div>
                                <div class="m-form__content"></div>
                            </div>
                            <div class="col-sm-6">
                                <div class="m-form__content"></div>
                                <div class="form-group m-form__group">
                                    <label for="exampleInputEmail1">
                                        Attendance status:
                                    </label>
                                    <div class="input-group m-input-group m-input-group--air">
                                        <span class="input-group-addon">
                                            <i class="la la-info"></i>
                                        </span>
                                        <select class="form-control m-bootstrap-select m_selectpicker" id="attendance_type" name="attendance_type">
                                            <option value="1" selected>Work</option>
                                            <option value="0">Absence</option>
                                            <option value="2">Business Trip</option>
                                            <option value="3">Vacation</option>
                                            <option value="4">Short Vacation</option>
                                            <option value="5">Doctor</option>
                                            <option value="6">Paragraph</option>
                                            <option value="7">Parental Leave</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="m-form__content"></div>
                            </div>
                        </div>
                        <?php $today_date = date('m/d/Y'); ?>
                        <div class="row ">
                            <div class="col-sm-12">
                                <div class="m-form__content"></div>
                                <div class="form-group m-form__group">
                                    <label for="exampleInputEmail1">
                                        From:
                                    </label>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="input-group m-input-group m-input-group--air">
                                                <span class="input-group-addon">
                                                    <i class="la la-calendar"></i>
                                                </span>
                                                <input type="text" class="form-control m-input m-input-datepicker" id="attend_date_from" name="attend_date_from" placeholder="Enter date" value="{{$today_date}}" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="input-group m-input-group m-input-group--air">
                                                <span class="input-group-addon">
                                                    <i class="la la-clock-o"></i>
                                                </span>
                                                <input type="text" class="form-control m-input input-time-picker" name="attend_start_time" value="8:00 AM" placeholder="Enter time" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-form__content"></div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-sm-12">
                                <div class="m-form__content"></div>
                                <div class="form-group m-form__group">
                                    <label for="exampleInputEmail1">
                                        To:
                                    </label>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="input-group m-input-group m-input-group--air">
                                                <span class="input-group-addon">
                                                    <i class="la la-calendar"></i>
                                                </span>
                                                <input type="text" class="form-control m-input m-input-datepicker" id="attend_date_to" name="attend_date_to" placeholder="Enter date" value="{{$today_date}}" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="input-group m-input-group m-input-group--air">
                                                <span class="input-group-addon">
                                                    <i class="la la-clock-o"></i>
                                                </span>
                                                <input type="text" class="form-control m-input input-time-picker" name="attend_end_time" value="{{$employee->getContractEndtime()}}" placeholder="Enter time" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-form__content"></div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-sm-12">
                                <label class="m-checkbox m-checkbox--air m-checkbox--state-success">
									<input type="checkbox" name="attend_weekend" checked>
									Don't insert in Weekend
									<span></span>
								</label>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-sm-12">
                                <label class="m-checkbox m-checkbox--air m-checkbox--state-success">
									<input type="checkbox" name="attend_holiday" checked>
									Don't insert in Holiday
									<span></span>
								</label>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-sm-12">
                                <label class="m-checkbox m-checkbox--air m-checkbox--state-success">
									<input type="checkbox" name="attend_fix_time" checked>
									Don't insert outside of person employment
									<span></span>
								</label>
                            </div>
                        </div>
                        <div class="attendance_status_input_container"></div>
    				</div>
    				<div class="modal-footer">
    					<button type="submit" class="btn m-btn--air btn-outline-accent form-submit-btn">
    						Submit
    					</button>
    				</div>
                </form>
			</div>
		</div>
    </div>

    <div class="modal fade m-custom-modal" id="m-admin-edit_attendance-modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel2">
						Edit Attendance
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="cursor: pointer;">
						<span aria-hidden="true">
							&times;
						</span>
					</button>
				</div>
                <form id="m-admin-edit_attendance-form" action="{{route('attendance.update')}}" role="form" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="attendance_id" id="attendance_id" value="">
    				<div class="modal-body" style="padding-bottom: 10px;">
                        <div class="row ">
                            <div class="col-sm-6">
                                <div class="m-form__content"></div>
                                <div class="form-group m-form__group">
                                    <label>
                                        Contract Type:
                                    </label>
                                    <div class="input-group m-input-group m-input-group--air">
                                        <span class="input-group-addon">
                                            <i class="flaticon-tool-1"></i>
                                        </span>
                                        <input type="text" class="form-control m-input" value="{{$employee->contract_title}}" placeholder="Enter date" readonly>
                                    </div>
                                </div>
                                <div class="m-form__content"></div>
                            </div>
                            <div class="col-sm-6">
                                <div class="m-form__content"></div>
                                <div class="form-group m-form__group">
                                    <label for="exampleInputEmail1">
                                        Attendance status:
                                    </label>
                                    <div class="input-group m-input-group m-input-group--air">
                                        <span class="input-group-addon">
                                            <i class="la la-info"></i>
                                        </span>
                                        <select class="form-control m-bootstrap-select m_selectpicker" id="_attendance_type" name="_attendance_type">
                                            <option value="1" selected>Work</option>
                                            <option value="0">Absence</option>
                                            <option value="2">Business Trip</option>
                                            <option value="3">Vacation</option>
                                            <option value="4">Short Vacation</option>
                                            <option value="5">Doctor</option>
                                            <option value="6">Paragraph</option>
                                            <option value="7">Parental Leave</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="m-form__content"></div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-sm-12">
                                <div class="m-form__content"></div>
                                <div class="form-group m-form__group">
                                    <label for="_attend_date_from">
                                        From:
                                    </label>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="input-group m-input-group m-input-group--air">
                                                <span class="input-group-addon">
                                                    <i class="la la-calendar"></i>
                                                </span>
                                                <input type="text" class="form-control m-input m-input-datepicker" id="_attend_date_from" name="_attend_date_from" placeholder="Enter date" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="input-group m-input-group m-input-group--air">
                                                <span class="input-group-addon">
                                                    <i class="la la-clock-o"></i>
                                                </span>
                                                <input type="text" class="form-control m-input input-time-picker" id="_attend_start_time" name="_attend_start_time" value="8:00 AM" placeholder="Enter time" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-form__content"></div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-sm-12">
                                <div class="m-form__content"></div>
                                <div class="form-group m-form__group">
                                    <label for="_attend_date_to">
                                        To:
                                    </label>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="input-group m-input-group m-input-group--air">
                                                <span class="input-group-addon">
                                                    <i class="la la-calendar"></i>
                                                </span>
                                                <input type="text" class="form-control m-input m-input-datepicker" id="_attend_date_to" name="_attend_date_to" placeholder="Enter date" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="input-group m-input-group m-input-group--air">
                                                <span class="input-group-addon">
                                                    <i class="la la-clock-o"></i>
                                                </span>
                                                <input type="text" class="form-control m-input input-time-picker" id="_attend_end_time" name="_attend_end_time" value="{{$employee->getContractEndtime()}}" placeholder="Enter time" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-form__content"></div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-sm-12">
                                <label class="m-checkbox m-checkbox--air m-checkbox--state-success">
									<input type="checkbox" id="_attend_weekend" name="_attend_weekend" checked>
									Don't insert in Weekend
									<span></span>
								</label>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-sm-12">
                                <label class="m-checkbox m-checkbox--air m-checkbox--state-success">
									<input type="checkbox" id="_attend_holiday" name="_attend_holiday" checked>
									Don't insert in Holiday
									<span></span>
								</label>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-sm-12">
                                <label class="m-checkbox m-checkbox--air m-checkbox--state-success">
									<input type="checkbox" id="_attend_fix_time" name="_attend_fix_time" checked>
									Don't insert outside of person employment
									<span></span>
								</label>
                            </div>
                        </div>
                        <div class="attendance_status_input_container"></div>
    				</div>
    				<div class="modal-footer">
                        <button type="submit" class="btn m-btn--air btn-outline-accent form-submit-btn">
    						Update
    					</button>
    				</div>
                </form>
			</div>
		</div>
    </div>

    <div class="modal fade m-custom-modal" id="m-admin-new_attendance-request-modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">
						Request
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="cursor: pointer;">
						<span aria-hidden="true">
							&times;
						</span>
					</button>
				</div>
                <form id="m-admin-new_attendance-request-form" action="{{route('attendance.store.request')}}" role="form" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                    {{ csrf_field() }}
    				<div class="modal-body" style="padding-bottom: 10px;">
                        <div class="row ">
                            <div class="col-sm-6">
                                <div class="m-form__content"></div>
                                <div class="form-group m-form__group">
                                    <label for="exampleInputEmail1">
                                        Contract Type:
                                    </label>
                                    <div class="input-group m-input-group m-input-group--air">
                                        <span class="input-group-addon">
                                            <i class="flaticon-tool-1"></i>
                                        </span>
                                        <input type="text" class="form-control m-input" value="{{$employee->contract_title}}" placeholder="Enter date" readonly>
                                    </div>
                                </div>
                                <div class="m-form__content"></div>
                            </div>
                            <div class="col-sm-6">
                                <div class="m-form__content"></div>
                                <div class="form-group m-form__group">
                                    <label for="request_attendance_type">
                                        Attendance status:
                                    </label>
                                    <div class="input-group m-input-group m-input-group--air">
                                        <span class="input-group-addon">
                                            <i class="la la-info"></i>
                                        </span>
                                        <select class="form-control m-bootstrap-select m_selectpicker" id="request_attendance_type" name="request_attendance_type">
                                            <option value="1" selected>Work</option>
                                            <option value="0">Absence</option>
                                            <option value="2">Business Trip</option>
                                            <option value="3">Vacation</option>
                                            <option value="4">Short Vacation</option>
                                            <option value="5">Doctor</option>
                                            <option value="6">Paragraph</option>
                                            <option value="7">Parental Leave</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="m-form__content"></div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-sm-12">
                                <div class="m-form__content"></div>
                                <div class="form-group m-form__group">
                                    <label for="exampleInputEmail1">
                                        From:
                                    </label>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="input-group m-input-group m-input-group--air">
                                                <span class="input-group-addon">
                                                    <i class="la la-calendar"></i>
                                                </span>
                                                <input type="text" class="form-control m-input m-input-datepicker" id="request_attend_date_from" name="request_attend_date_from" placeholder="Enter date" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="input-group m-input-group m-input-group--air">
                                                <span class="input-group-addon">
                                                    <i class="la la-clock-o"></i>
                                                </span>
                                                <input type="text" class="form-control m-input input-time-picker" id="request_attend_start_time" name="request_attend_start_time" value="8:00 AM" placeholder="Enter time" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-form__content"></div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-sm-12">
                                <div class="m-form__content"></div>
                                <div class="form-group m-form__group">
                                    <label for="exampleInputEmail1">
                                        To:
                                    </label>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="input-group m-input-group m-input-group--air">
                                                <span class="input-group-addon">
                                                    <i class="la la-calendar"></i>
                                                </span>
                                                <input type="text" class="form-control m-input m-input-datepicker" id="request_attend_date_to" name="request_attend_date_to" placeholder="Enter date" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="input-group m-input-group m-input-group--air">
                                                <span class="input-group-addon">
                                                    <i class="la la-clock-o"></i>
                                                </span>
                                                <input type="text" class="form-control m-input input-time-picker" id="request_attend_end_time" name="request_attend_end_time" value="{{$employee->getContractEndtime()}}" placeholder="Enter time" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-form__content"></div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-sm-12">
                                <label class="m-checkbox m-checkbox--air m-checkbox--state-success">
									<input type="checkbox" id="request_attend_weekend" name="request_attend_weekend" checked>
									Don't insert in Weekend
									<span></span>
								</label>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-sm-12">
                                <label class="m-checkbox m-checkbox--air m-checkbox--state-success">
									<input type="checkbox" id="request_attend_holiday" name="request_attend_holiday" checked>
									Don't insert in Holiday
									<span></span>
								</label>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-sm-12">
                                <label class="m-checkbox m-checkbox--air m-checkbox--state-success">
									<input type="checkbox" id="request_attend_fix_time" name="request_attend_fix_time" checked>
									Don't insert outside of person employment
									<span></span>
								</label>
                            </div>
                        </div>
                        <div class="attendance_status_input_container"></div>
    				</div>
    				<div class="modal-footer">
    					<button type="submit" class="btn m-btn--air btn-outline-accent form-submit-btn">
    						Submit
    					</button>
    				</div>
                </form>
			</div>
		</div>
    </div>

    <div id="hidden_attendance_input_box_container" style="display: none;">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group m-form__group break-time-container-form" style="display: none;">
                    <label>
                        Break Time:
                    </label>
                    <div class="break-time-container"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group m-form__group smoke-time-container-form" style="display: none;">
                    <label>
                        Smoking Time:
                    </label>
                    <div class="smoke-time-container"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12" style="display:flex;justify-content: flex-end;">
                <button type="button" class="btn m-btn--air btn-outline-success add-smoke-time-btn" style="margin-right:10px;">
                    Add smoke
                </button>
                <button type="button" class="btn m-btn--air btn-outline-success add-break-time-btn">
                    Add Break
                </button>
            </div>
        </div>
    </div>
@endsection
@section('plugin_script')
<script src="/assets/plugins/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
@endsection
@section('customScript')
    <script type="text/javascript">
        var random_string_id = null;
        var todayDate = moment().startOf('day');
        var golbalEmployeeId = $('#golobal_employee_id').val();
        $(document).ready(function(){
            setJsplugin();
        });

        function setJsplugin() {
            $('.m-input-datepicker').datepicker({
                todayHighlight: true,
                autoclose: true,
                orientation: "bottom left",
                templates: {
                    leftArrow: '<i class="la la-angle-left"></i>',
                    rightArrow: '<i class="la la-angle-right"></i>'
                }
            });

            $('.m_selectpicker').selectpicker();

            $('.input-time-picker').timepicker();
            $('.input-smoke-timepicker').timepicker({
                minuteStep: 5,
                showMeridian: true,
            });
        }
    </script>
    <script src="/js/calendar/enployeeAttendCalendar.js" type="text/javascript"></script>
    <script src="/js/employeeAttend.js" type="text/javascript"></script>
@endsection
