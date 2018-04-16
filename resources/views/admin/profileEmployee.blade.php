@extends('layouts.app')

@section('title')
{{$employee->username}}'s Profile
@endsection

@section('pageTitle')
{{$employee->username}}'s Profile
@endsection

@section('customStyle')
<link href="/css/customProfile.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="row">
    	<div class="col-lg-4">
    		<div class="m-portlet m-portlet--full-height">
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
                                <a href="#" id="m-user-profile__cover-pic-change-btn" data-admin_unique_id="{{$employee->unique_id}}"> <i class="flaticon-edit-1"></i> </a>
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
                                <a class="m-card-profile__pic-edit_wrapper" id="m-user-profile__pic-change-btn" data-admin_unique_id="{{$employee->unique_id}}"></a>
    						</div>
    					</div>
    					<div class="m-card-profile__details">
    						<span class="m-card-profile__name">
    							{{$employee->first_name}} {{$employee->last_name}}
    						</span>
    						<a href="mailto:{{$employee->email}}" class="m-card-profile__email m-link">
    							{{$employee->email}}
    						</a>
    					</div>
    				</div>
    				<div class="m-portlet__body-separator"></div>
    				<div class="m-widget1 m-widget1--paddingless">
    					<div class="m-widget1__item">
    						<div class="row m-row--no-padding align-items-center">
    							<div class="col">
    								<h3 class="m-widget1__title">
    									Issue Reports
    								</h3>
    								<span class="m-widget1__desc">
    									System bugs and issues
    								</span>
    							</div>
    							<div class="col m--align-right">
    								<span class="m-widget1__number m--font-success">
    									-27,49%
    								</span>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    	<div class="col-lg-8">
    		<div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
    			<div class="m-portlet__head">
    				<div class="m-portlet__head-tools">
    					<ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
    						<li class="nav-item m-tabs__item">
    							<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab">
    								&nbsp;<i class="flaticon-share"></i> BIO&nbsp;
    							</a>
    						</li>
                            <li class="nav-item m-tabs__item">
    							<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_pass_force" role="tab">
    								&nbsp;<i class="la la-key"></i> PASSWORD&nbsp;
    							</a>
    						</li>
    					</ul>
    				</div>
    			</div>
    			<div class="tab-content n-profile-enable">
    				<div class="tab-pane active" id="m_user_profile_tab_1">
						<div class="m-portlet__body">
                            <div class="form-group m-form__group row">
                                <div class="col-12">
                                    <form class="m-form m-form--fit m-form--label-align-right" id="profile_unique_info_form" action="{{url('/admin/profile/employee/'.$employee->unique_id.'/update/unique')}}" method="post">
                                        {{csrf_field()}}
                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12"></div>
            								<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
            									<h3 class="m-form__section" style="margin-bottom: 0;">
            										1. @lang('language.profile.unique_info')
            									</h3>
            								</div>
            							</div>
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-lg-2 col-md-2 col-sm-3 col-xs-12 col-form-label">
            									@lang('language.username')*
            								</label>
            								<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                                <div class="m-user-unique_username-container">
                                                    <input class="form-control m-input" type="text" name="unique_username" data-origine_username="{{$employee->username}}" value="{{$employee->username}}" required />
                                                </div>
            								</div>
            							</div>
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-lg-2 col-md-2 col-sm-3 col-xs-12 col-form-label">
            									@lang('language.email')*
            								</label>
            								<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                                <div class="m-user-unique_username-container">
                                                    <input class="form-control m-input input_mask_email" type="email" name="unique_email" data-origine_email="{{$employee->email}}" value="{{$employee->email}}" required/>
                                                </div>
            								</div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12"></div>
        									<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
        										<button type="button" id="profile_unique_info_form_submit-btn" class="btn btn-outline-accent m-btn--air m-btn m-btn--custom" disabled>@lang('language.save') @lang('language.change')</button>
        									</div>
            							</div>
                                        <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
                                    </form>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-12">
                                    <form class="m-form m-form--fit m-form--label-align-right" action="{{url('admin/profile/employee/'.$employee->unique_id.'/update/info')}}" method="post">
                                        {{csrf_field()}}
                                        <div class="form-group m-form__group row">
            								<div class="col-10 ml-auto">
            									<h3 class="m-form__section">
            										2. @lang('language.profile.personal_info')
            									</h3>
            								</div>
            							</div>
                                        <div class="form-group m-form__group row">
            								<label for="example-text-input" class="col-lg-2 col-md-2 col-sm-3 col-xs-12 col-form-label">
            									@lang('language.surname')
            								</label>
            								<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
            									<input class="form-control m-input" type="text" name="lastName" value="{{$employee->last_name}}" />
            								</div>
            							</div>
                                        <div class="form-group m-form__group row">
            								<label for="example-text-input" class="col-lg-2 col-md-2 col-sm-3 col-xs-12 col-form-label">
            									@lang('language.fullname')
            								</label>
            								<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
            									<input class="form-control m-input" type="text" name="firstName" value="{{$employee->first_name}}" />
            								</div>
            							</div>
                                        <div class="form-group m-form__group row">
            								<label for="example-text-input" class="col-lg-2 col-md-2 col-sm-3 col-xs-12 col-form-label">
            									@lang('language.profile.birthday')
            								</label>
            								<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                                <?php
                                                    $employee_birth = "";
                                                    if ($employee->birth != "" || $employee->birth != null) {
                                                        $employee_birth = $employee->encode_date_format($employee->birth);
                                                    }
                                                ?>
            									<input class="form-control m-input input_mask_date" id="m_profile_birth" placeholder="@lang('language.profile.birthday')" type="text" name="birth" value="{{$employee_birth}}" />
            								</div>
            							</div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12"></div>
        									<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
        										<button type="submit" class="btn btn-outline-accent m-btn m-btn--custom m-btn--air">Save changes</button>
        									</div>
            							</div>
                                    </form>
                                </div>
                            </div>
						</div>
    				</div>
                    <div class="tab-pane" id="m_user_profile_tab_pass_force">
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row">
                                <div class="col-12">
                                    <form class="m-form m-form--fit m-form--label-align-right" id="m-user-profile-pass-change__force" action="{{url('admin/profile/employee/'.$employee->unique_id.'/update/password/force')}}" method="post">
                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12"></div>
                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                                <h3 class="m-form__section" style="margin-bottom: 0;">
                                                    Password Change
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-4 col-xs-12 col-form-label">
                                                New Password*
                                            </label>
                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                                <div class="m-user-unique_username-container">
                                                    <input class="form-control m-input" type="password" name="force_password" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-4 col-xs-12 col-form-label">
                                                Confirm Password*
                                            </label>
                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                                <div class="m-user-unique_username-container">
                                                    <input class="form-control m-input" type="password" name="force_confirm_pass" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12"></div>
                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                                <button type="submit" class="btn btn-outline-accent m-btn m-btn--custom m-btn--air">Save changes</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
    			</div>
    		</div>
    	</div>
    </div>

    <div class="modal fade m-custom-modal" id="user-profile__pic-change-modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">
						Update your Profile image
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="cursor: pointer;">
						<span aria-hidden="true">
							&times;
						</span>
					</button>
				</div>
                <form id="m-user__pic-avatar-upload-form" action="{{url('admin/profile/employee/'.$employee->unique_id.'/update/avatar')}}" role="form" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                    {{ csrf_field() }}
    				<div class="modal-body">
	                    <div id="m-user__pic-avatar-slim">
	                        <input type="file" name="slim[]" required/>
	                    </div>
    				</div>
    				<div class="modal-footer">
    					<button type="button" class="btn btn-outline-primary m-btn m-btn--custom m-btn--air" data-dismiss="modal">
    						Close
    					</button>
    					<button type="submit" class="btn btn-outline-accent m-btn m-btn--custom m-btn--air form-submit-btn">
    						Update
    					</button>
    				</div>
                </form>
			</div>
		</div>
	</div>

    <div class="modal fade m-custom-modal" id="user-profile__cover-pic-change-modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">
						Update your Cover image
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="cursor: pointer;">
						<span aria-hidden="true">
							&times;
						</span>
					</button>
				</div>
                <form id="m-user__pic-cover-upload-form" action="{{url('admin/profile/employee/'.$employee->unique_id.'/update/cover')}}" role="form" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                    {{ csrf_field() }}
    				<div class="modal-body">
	                    <div id="m-user__pic-cover-slim">
	                        <input type="file" name="slim[]" required/>
	                    </div>
    				</div>
    				<div class="modal-footer">
    					<button type="button" class="btn btn-outline-primary m-btn m-btn--custom m-btn--air" data-dismiss="modal">
    						Close
    					</button>
    					<button type="submit" class="btn btn-outline-accent m-btn m-btn--custom m-btn--air form-submit-btn">
    						Update
    					</button>
    				</div>
                </form>
			</div>
		</div>
	</div>
@endsection

@section('customScript')
    <script type="text/javascript">
        var user_avatar_cropper = new Slim(document.getElementById('m-user__pic-avatar-slim'), {
            ratio: '1:1',
            minSize: {
                width: 150,
                height: 150,
            },
            download: false,
            label: 'Drop your image here or Click.',
            statusImageTooSmall:'Image too small. Min Size is $0 pixel. Try again',
        });

        var user_cover_cropper = new Slim(document.getElementById('m-user__pic-cover-slim'), {
            ratio: '5:2',
            minSize: {
                width: 250,
                height: 100,
            },
            download: false,
            label: 'Drop your image here or Click.',
            statusImageTooSmall:'Image too small. Min Size is $0 pixel. Try again',
        });

        $('.input_mask_date').datepicker({
            todayHighlight: true,
            orientation: "bottom left",
            autoclose: true,
            templates: {
                leftArrow: '<i class="la la-angle-left"></i>',
                rightArrow: '<i class="la la-angle-right"></i>'
            }
        });

        $('.m_selectpicker').selectpicker();
    </script>
    <script src="/js/customProfile.js" type="text/javascript"></script>
@endsection
