@extends('layouts.appAuth')
@section('title')
@lang('language.sign_to_employee')
@endsection
@section('content')
    <div class="m-login__signin">
        <div class="m-login__head">
            <h3 class="m-login__title">
                @lang('language.sign_to_employee')
            </h3>
        </div>
        <form class="m-login__form m-form" action="{{url('login')}}" method="post">
            <div id="client_id-check-container">
                <div class="form-group m-form__group">
                    <input class="form-control m-input input_mask_integer" type="text" placeholder="@lang('language.client_id')" name="client_id" autocomplete="off">
                </div>
                <div class="client_id_check-forget_container">
                    <div class="row m-login__form-sub">
                        <div class="col m--align-right m-login__form-right">
                            <a href="/clientid/get" class="m-link">
                                @lang('language.forget_client_id') ?
                            </a>
                        </div>
                    </div>
                    <div class="m-login__form-action">
                        <button id="m_login_client_id_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">
                            @lang('language.check_client_id')
                        </button>
                    </div>
                </div>
            </div>
            <div id="sigin-form-container-after-client-id" style="display: none;">
            </div>
        </form>
    </div>
@endsection
