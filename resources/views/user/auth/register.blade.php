@extends('layouts.app')
@section('title')
join
@endsection
@section('content')
    <div class="m-auth-container">
        <div class="m-login__head">
            <h3 class="m-login__title">
                Join
            </h3>
        </div>
        <form class="m-login__form m-form" action="{{route('register')}}" method="post">
            <div class="form-group m-form__group">
                <div class="input-group m-input-group m-input-group--air">
                    <span class="input-group-addon">
                        <i class="la la-user"></i>
                    </span>
                    <input type="text" class="form-control m-input" name="username" placeholder="Username*" aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="form-group m-form__group">
                <div class="input-group m-input-group m-input-group--air">
                    <span class="input-group-addon">
                        <i class="la la-user"></i>
                    </span>
                    <input type="text" class="form-control m-input" name="first_name" placeholder="First name*" aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="form-group m-form__group">
                <div class="input-group m-input-group m-input-group--air">
                    <span class="input-group-addon">
                        <i class="la la-user"></i>
                    </span>
                    <input type="text" class="form-control m-input" name="last_name" placeholder="Last name*" aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="form-group m-form__group">
                <div class="input-group m-input-group m-input-group--air">
                    <span class="input-group-addon">
                        <i class="la la-envelope"></i>
                    </span>
                    <input type="email" class="form-control m-input" name="email" placeholder="Email*" aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="form-group m-form__group">
                <div class="input-group m-input-group m-input-group--air">
                    <span class="input-group-addon">
                        <i class="la la-key"></i>
                    </span>
                    <input type="password" class="form-control m-input" id="confirm_password" name="password" placeholder="Password*" aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="form-group m-form__group">
                <div class="input-group m-input-group m-input-group--air">
                    <span class="input-group-addon">
                        <i class="la la-key"></i>
                    </span>
                    <input type="text" class="form-control m-input" name="password_confirmation" placeholder="Confirm Password*" aria-describedby="basic-addon1">
                </div>
            </div>
			<div class="row form-group m-form__group m-login__form-sub">
				<div class="col m--align-left">
					<label class="m-checkbox m-checkbox--focus">
						<input type="checkbox" name="agree">
						I Agree the
						<a href="{{route('term')}}" target="_blank" class="m-link m-link--focus">
							terms and conditions
						</a>
						.
						<span></span>
					</label>
					<span class="m-form__help"></span>
				</div>
			</div>
			<div class="m-login__form-action">
				<a href="{{route('login')}}" class="btn btn-accent m-btn m-btn--custom m-btn--air">
                    <span>
						<span>
							Login
						</span>
					</span>
				</a>
                <button id="m_login_signup_submit" class="btn btn-focus m-btn m-btn--custom m-btn--air">
					Sign Up
				</button>
			</div>
		</form>
    </div>
@endsection
@section('custom_js')
<script type="text/javascript" src="/js/register.js"></script>
@endsection
