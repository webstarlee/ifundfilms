@extends('layouts.app')
@section('title')
join
@endsection
@section('content')
    <div class="m-auth-container">
        <div class="m-login__head">
            <h3 class="m-login__title">
                Login
            </h3>
        </div>
        <form class="m-login__form m-form" action="{{route('login')}}" method="post">
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
                    <input type="password" class="form-control m-input" name="password" placeholder="Password*" aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="row m-login__form-sub">
                <div class="col m--align-left m-login__form-left">
                    <label class="m-checkbox  m-checkbox--focus">
                        <input type="checkbox" name="remember">
                        Remember me
                        <span></span>
                    </label>
                </div>
                <div class="col m--align-right m-login__form-right">
                    <a href="/password/reset" class="m-link">
                        Forget Password ?
                    </a>
                </div>
            </div>
			<div class="m-login__form-action">
                <button type="submit" id="m_login_signin_submit" class="btn btn-focus m-btn btn-outline-accent m-btn--custom m-btn--air">
					Login
				</button>
			</div>
            <div class="m-login__account">
				<span class="m-login__account-msg">
					Don't have an account yet ?
				</span>
				&nbsp;&nbsp;
				<a href="{{route('register')}}" class="m-link m-link--focus m-login__account-link">
					Sign Up
				</a>
			</div>
		</form>
    </div>
@endsection
@section('custom_js')
<script type="text/javascript" src="/js/login.js"></script>
@endsection
