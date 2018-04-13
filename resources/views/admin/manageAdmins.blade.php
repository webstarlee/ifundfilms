@extends('layouts.adminApp')

@section('title')
Manage Admins
@endsection

@section('pageTitle')
Admin Management
@endsection

@section('customStyle')
<link href="/css/addAdminWizard.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="m-portlet m-portlet--mobile">
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<h3 class="m-portlet__head-text">
						<i class="la la-gear"></i> &nbsp;Admin Management
					</h3>
				</div>
			</div>
			<div class="m-portlet__head-tools">
				<ul class="m-portlet__nav">
					<li class="m-portlet__nav-item">
						<div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" data-dropdown-toggle="hover" aria-expanded="true">
							<a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
								<i class="la la-ellipsis-h m--font-brand"></i>
							</a>
							<div class="m-dropdown__wrapper">
								<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
								<div class="m-dropdown__inner">
									<div class="m-dropdown__body">
										<div class="m-dropdown__content">
											<ul class="m-nav">
												<li class="m-nav__section m-nav__section--first">
													<span class="m-nav__section-text">
														Quick Actions
													</span>
												</li>
												<li class="m-nav__item">
													<a href="" class="m-nav__link">
														<i class="m-nav__link-icon flaticon-share"></i>
														<span class="m-nav__link-text">
															Create Post
														</span>
													</a>
												</li>
												<li class="m-nav__item">
													<a href="" class="m-nav__link">
														<i class="m-nav__link-icon flaticon-chat-1"></i>
														<span class="m-nav__link-text">
															Send Messages
														</span>
													</a>
												</li>
												<li class="m-nav__item">
													<a href="" class="m-nav__link">
														<i class="m-nav__link-icon flaticon-multimedia-2"></i>
														<span class="m-nav__link-text">
															Upload File
														</span>
													</a>
												</li>
												<li class="m-nav__section">
													<span class="m-nav__section-text">
														Useful Links
													</span>
												</li>
												<li class="m-nav__item">
													<a href="" class="m-nav__link">
														<i class="m-nav__link-icon flaticon-info"></i>
														<span class="m-nav__link-text">
															FAQ
														</span>
													</a>
												</li>
												<li class="m-nav__item">
													<a href="" class="m-nav__link">
														<i class="m-nav__link-icon flaticon-lifebuoy"></i>
														<span class="m-nav__link-text">
															Support
														</span>
													</a>
												</li>
												<li class="m-nav__separator m-nav__separator--fit m--hide"></li>
												<li class="m-nav__item m--hide">
													<a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">
														Submit
													</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
		<div class="m-portlet__body">
			<!--begin: Search Form -->
			<div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
				<div class="row align-items-center">
					<div class="col-xl-8 order-2 order-xl-1">
						<div class="form-group m-form__group row align-items-center">
							<div class="col-md-4">
								<div class="m-input-icon m-input-icon--left">
									<input type="text" class="form-control m-input" placeholder="Search..." id="generalSearch">
									<span class="m-input-icon__icon m-input-icon__icon--left">
										<span>
											<i class="la la-search"></i>
										</span>
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-4 order-1 order-xl-2 m--align-right">
						<a href="#m-admin-add-new-modal" data-toggle="modal" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air">
							<span>
								<i class="la la-user-plus"></i>
								<span>
									New Admin
								</span>
							</span>
						</a>
						<div class="m-separator m-separator--dashed d-xl-none"></div>
					</div>
				</div>
			</div>
			<!--end: Search Form -->
            <!--begin: Datatable -->
			<div class="m_datatable" id="auto_column_hide"></div>
			<!--end: Datatable -->
		</div>
	</div>

    <div class="modal fade m-custom-modal" id="m-admin-add-new-modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title">
						Add New Admin
					</h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="cursor: pointer;">
						<span aria-hidden="true">
							&times;
						</span>
					</button>
				</div>
				<div class="modal-body">
                    <!--begin: Form Wizard-->
					<div class="m-wizard m-wizard--1 m-wizard--success m-wizard--step-between" id="m_wizard">
						<!--begin: Message container -->
						<div class="m-portlet__padding-x">
							<!-- Here you can put a message or alert -->
						</div>
						<!--end: Message container -->
						<!--begin: Form Wizard Head -->
						<div class="m-wizard__head m-portlet__padding-x">
    						<!--begin: Form Wizard Nav -->
							<div class="m-wizard__nav wizard-navigation">
								<div class="m-wizard__steps nav nav-pills">
									<div class="m-build-new-user-profile__tap-li m-wizard__step m-wizard__step--current" data-wizard_index="1" data-wizard-target="#m_wizard_form_step_1">
										<a href="#"  class="m-wizard__step-number">
											About
										</a>
									</div>
									<div class="m-build-new-user-profile__tap-li m-wizard__step" data-wizard_index="2" data-wizard-target="#m_wizard_form_step_2">
										<a href="#" class="m-wizard__step-number">
											Password
										</a>
									</div>
									<div class="m-build-new-user-profile__tap-li m-wizard__step" data-wizard_index="3" data-wizard-target="#m_wizard_form_step_3">
										<a href="#" class="m-wizard__step-number">
											Other
										</a>
									</div>
								</div>
                                <div id="add-new-user-moving-tab">about</div>
							</div>
							<!--end: Form Wizard Nav -->
						</div>
						<!--end: Form Wizard Head -->
						<!--begin: Form Wizard Form-->
						<div class="m-wizard__form">
							<form class="m-form m-form--label-align-left- m-form--state-" action="{{route('admin.add.new.admin')}}" id="add-new-admin-form" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
								<!--begin: Form Body -->
                                {{ csrf_field() }}
								<div class="m-portlet__body">
									<!--begin: Form Wizard Step 1-->
									<div class="m-wizard__form-step m-wizard__form-step--current" id="m_wizard_form_step_1">
                                        <div class="row">
                                            <div class="col-sm-1"></div>
                                            <div class="col-sm-4">
                                                <div id="m-add-new-user__pic-avatar-slim" class="add-new-user-avatar-slim">
                                                    <input type="file" name="slim[]" />
                                                </div>
                                                <h5 class="text-center">Choose Avatar</h5>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group m-form__group">
                                                    <label for="exampleInputEmail1">
                                                        Username (required):
                                                    </label>
                                                    <div class="input-group m-input-group m-input-group--air">
                                                        <span class="input-group-addon">
                                                            <i class="la la-user"></i>
                                                        </span>
                                                        <input type="text" class="form-control m-input" name="username" placeholder="Enter username (required)" aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group">
                                                    <label for="exampleInputEmail1">
                                                        Full name (required):
                                                    </label>
                                                    <div class="input-group m-input-group m-input-group--air">
                                                        <span class="input-group-addon">
                                                            <i class="la la-user"></i>
                                                        </span>
                                                        <input type="text" class="form-control m-input" name="first_name" placeholder="Enter full name (required)" aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group">
                                                    <label for="exampleInputEmail1">
                                                        Surname (required):
                                                    </label>
                                                    <div class="input-group m-input-group m-input-group--air">
                                                        <span class="input-group-addon">
                                                            <i class="la la-user"></i>
                                                        </span>
                                                        <input type="text" class="form-control m-input" name="last_name" placeholder="Enter surname (required)" aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-1"></div>
                                            <div class="col-sm-10">
                                                <div class="form-group m-form__group" style="padding-top: 15px;">
                                                    <label for="exampleInputEmail1">
                                                        Email (required):
                                                    </label>
                                                    <div class="input-group m-input-group m-input-group--air">
                                                        <span class="input-group-addon">
                                                            <i class="la la-envelope"></i>
                                                        </span>
                                                        <input type="email" class="form-control m-input" name="email" placeholder="Enter email (required)" aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
									</div>
									<!--end: Form Wizard Step 1-->
            						<!--begin: Form Wizard Step 2-->
									<div class="m-wizard__form-step" id="m_wizard_form_step_2">
                                        <div class="row ">
                                            <div class="col-sm-1"></div>
                                            <div class="col-sm-5">
                                                <div class="m-form__content"></div>
                                                <div class="form-group m-form__group">
                                                    <label for="exampleInputEmail1">
                                                        Password (required):
                                                    </label>
                                                    <div class="input-group m-input-group m-input-group--air">
                                                        <span class="input-group-addon">
                                                            <i class="la la-key"></i>
                                                        </span>
                                                        <input type="password" class="form-control m-input" id="register_new_password" name="password" placeholder="Enter password (required)" aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                                <div class="m-form__content"></div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="m-form__content"></div>
                                                <div class="form-group m-form__group">
                                                    <label for="exampleInputEmail1">
                                                        Password Confirm (required):
                                                    </label>
                                                    <div class="input-group m-input-group m-input-group--air">
                                                        <span class="input-group-addon">
                                                            <i class="la la-key"></i>
                                                        </span>
                                                        <input type="password" class="form-control m-input" name="confirm_pass" placeholder="Enter confirm (required)" aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                                <div class="m-form__content"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-1"></div>
                                            <div class="col-sm-5">
                                                <div class="m-form__content"></div>
                                                <div class="form-group m-form__group">
                                                    <label for="exampleInputEmail1">
                                                        User role:
                                                    </label>
                                                    <div class="input-group m-input-group">
                										<span class="input-group-addon">
                											<i class="la la-user-secret"></i>
                										</span>
                                                        <?php
                                                            $currentroles = Auth::guard('admin')->user()->getRolearray();
                                                        ?>
                										<select class="form-control m-bootstrap-select m_selectpicker" name="user_role">
                                                            @foreach ($currentroles as $role)
                                                                <option value="{{$role['id']}}" @if ($role['id'] == 0) selected @endif>{{$role['name']}}</option>
                                                            @endforeach
                										</select>
                									</div>
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="m-form__content"></div>
                                                <div class="form-group m-form__group">
                                                    <label for="exampleInputEmail1">
                                                        Birthday:
                                                    </label>
                                                    <div class="input-group m-input-group m-input-group--air">
                                                        <span class="input-group-addon">
                                                            <i class="la la-calendar"></i>
                                                        </span>
                                                        <input type="text" class="form-control m-input input_mask_date" name="birth" placeholder="Birthday (optional)" aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
									</div>
									<!--end: Form Wizard Step 2-->
            						<!--begin: Form Wizard Step 3-->
									<div class="m-wizard__form-step" id="m_wizard_form_step_3">
                                        <div class="row">
                                            <div class="col-sm-1"></div>
                                            <div class="col-sm-5">
                                                <div class="m-form__content"></div>
                                                <?php
                                                    $countries = \App\Country::all();
                                                ?>
                                                <div class="form-group m-form__group">
                                                    <label for="exampleInputEmail1">
                                                        Nation:
                                                    </label>
                                                    <div class="input-group m-input-group">
                										<span class="input-group-addon">
                											<i class="la la-globe"></i>
                										</span>
                										<select class="form-control m-bootstrap-select m_selectpicker" name="nation">
                											@foreach ($countries as $country)
                                                                <option value="{{$country->id}}" @if($country->id == 157) selected @endif>{{$country->name}}</option>
                                                            @endforeach
                										</select>
                									</div>
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="m-form__content"></div>
                                                <div class="form-group m-form__group">
                                                    <label for="exampleInputEmail1">
                                                        State:
                                                    </label>
                                                    <div class="input-group m-input-group m-input-group--air">
                                                        <span class="input-group-addon">
                                                            <i class="la la-map-marker"></i>
                                                        </span>
                                                        <input type="text" class="form-control m-input" name="state" placeholder="State (optional)" aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-1"></div>
                                            <div class="col-sm-5">
                                                <div class="m-form__content"></div>
                                                <div class="form-group m-form__group">
                                                    <label for="exampleInputEmail1">
                                                        Department:
                                                    </label>
                                                    <div class="input-group m-input-group m-input-group--air">
                                                        <span class="input-group-addon">
                                                            <i class="la la-building"></i>
                                                        </span>
                                                        <input type="text" class="form-control m-input" name="department" placeholder="Department (optional)" aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                                <div class="col-sm-1"></div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="m-form__content"></div>
                                                <div class="form-group m-form__group">
                                                    <label for="exampleInputEmail1">
                                                        Social Number:
                                                    </label>
                                                    <div class="input-group m-input-group m-input-group--air">
                                                        <span class="input-group-addon">
                                                            <i class="la la-facebook"></i>
                                                        </span>
                                                        <input type="text" class="form-control m-input input_mask_integer" name="social_number" placeholder="Social number (optional)" aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                                <div class="col-sm-1"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-1"></div>
                                            <div class="col-sm-5">
                                                <div class="m-form__content"></div>
                                                <div class="form-group m-form__group">
                                                    <label for="exampleInputEmail1">
                                                        Personal Number:
                                                    </label>
                                                    <div class="input-group m-input-group m-input-group--air">
                                                        <span class="input-group-addon">
                                                            <i class="la la-cc-discover"></i>
                                                        </span>
                                                        <input type="text" class="form-control m-input input_mask_integer" name="personal_number" placeholder="Personal Number (optional)" aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="m-form__content"></div>
                                                <div class="form-group m-form__group">
                                                    <label for="exampleInputEmail1">
                                                        Emergency Contact:
                                                    </label>
                                                    <div class="input-group m-input-group m-input-group--air">
                                                        <span class="input-group-addon">
                                                            <i class="la la-phone"></i>
                                                        </span>
                                                        <input type="text" class="form-control m-input input_mask_integer" name="emergency_contact" placeholder="Emergency Contact (optional)" aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
									</div>
									<!--end: Form Wizard Step 3-->
								</div>
								<!--end: Form Body -->
        						<!--begin: Form Actions -->
								<div class="m-portlet__foot m-portlet__foot--fit m--margin-top-40">
									<div class="row">
										<div class="col-sm-1"></div>
										<div class="col-6 col-sm-4 m--align-left">
											<a href="#" class="btn m-btn--air btn-outline-warning m-btn--custom" data-wizard-action="prev">
												<span>
													<i class="la la-arrow-left"></i>
													&nbsp;&nbsp;
													<span>
														Back
													</span>
												</span>
											</a>
										</div>
										<div class="col-6 m--align-right">
											<a href="#" class="btn m-btn--air btn-outline-success m-btn--custom" data-wizard-action="submit">
												<span>
													<i class="la la-check"></i>
													&nbsp;&nbsp;
													<span>
														Submit
													</span>
												</span>
											</a>
											<a href="#" class="btn m-btn--air btn-outline-accent m-btn--custom" data-wizard-action="next">
												<span>
													<span>
														Next
													</span>
													&nbsp;&nbsp;
													<i class="la la-arrow-right"></i>
												</span>
											</a>
										</div>
									</div>
								</div>
								<!--end: Form Actions -->
							</form>
						</div>
						<!--end: Form Wizard Form-->
					</div>
					<!--end: Form Wizard-->
				</div>
			</div>
		</div>
	</div>

@endsection
@section('customScript')
    <script src="/js/datatable/loadAdminsData.js" type="text/javascript"></script>
    <script type="text/javascript">
        var add_user_avatar_cropper = new Slim(document.getElementById('m-add-new-user__pic-avatar-slim'), {
            ratio: '1:1',
            minSize: {
                width: 150,
                height: 150,
            },
            download: false,
            label: 'Choose Avatar.',
            statusImageTooSmall:'Image too small. Min Size is $0 pixel. Try again',
        });

        $('.input_mask_date').datepicker({
            todayHighlight: true,
            autoclose: true,
            orientation: "bottom left",
            templates: {
                leftArrow: '<i class="la la-angle-left"></i>',
                rightArrow: '<i class="la la-angle-right"></i>'
            }
        });
    </script>
    <script src="/js/addAdminWizard.js" type="text/javascript"></script>
    <script src="/js/customManage.js" type="text/javascript"></script>
@endsection
