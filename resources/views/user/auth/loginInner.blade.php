<div class="form-group m-form__group">
    <input class="form-control m-input"   type="text" placeholder="@lang('language.email')" name="email" autocomplete="off">
</div>
<div class="form-group m-form__group">
    <input class="form-control m-input m-login__form-input--last" type="password" placeholder="@lang('language.password')" name="password">
</div>
<div class="row m-login__form-sub">
    <div class="col m--align-left m-login__form-left">
        <label class="m-checkbox  m-checkbox--focus">
            <input type="checkbox" name="remember">
            @lang('language.remember_me')
            <span></span>
        </label>
    </div>
    <div class="col m--align-right m-login__form-right">
        <a href="/password/reset" class="m-link">
            @lang('language.forget_pass') ?
        </a>
    </div>
</div>
{{session('client_id')}}
<div class="m-login__form-action">
    <button id="m_login_signin_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">
        @lang('language.sign_in')
    </button>
</div>
