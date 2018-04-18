@extends('layouts.app')
@section('title')
Contact
@endsection
@section('content')
    <div class="contact-container">
        <h1 style="text-align: center;margin-bottom:20px;">Contact Us</h1>
        <div class="row">
            <div class="col-sm-6">
                <div class="contact-single-container text-container">
                    <p class="title-p">Purposes of Contact</p>
                    <p>We only accept contact from large investors, media, casting directors, managers & agents, and producers of fully produced feature films. Any other reason shall be promptly deleted without response.</p>
                    <p class="title-p">No Unsolicited Material</p>
                    <p>iFundFilms has in development or may develop its own confidential projects. To ensures that there are no false claims of material theft, we do not accept or consider any unsolicited literary material. Furthermore, we do not accept suggestions or ideas of any nature.</p>
                </div>
            </div>
            <div class="col-sm-6">
                <form class="contact-single-container" id="contact-email-send-form" action="{{route('contactEmail')}}" method="post">
                    <div class="form-group m-form__group">
                        <label for="exampleInputEmail1">
                            Name*:
                        </label>
                        <div class="input-group m-input-group m-input-group--air">
                            <span class="input-group-addon">
                                <i class="la la-user"></i>
                            </span>
                            <input type="text" class="form-control m-input" name="username" placeholder="Name" aria-describedby="basic-addon1" required />
                        </div>
                    </div>
                    <div class="form-group m-form__group">
                        <label for="exampleInputEmail1">
                            Email*:
                        </label>
                        <div class="input-group m-input-group m-input-group--air">
                            <span class="input-group-addon">
                                <i class="la la-envelope"></i>
                            </span>
                            <input type="email" class="form-control m-input" name="email" placeholder="Email" aria-describedby="basic-addon1" required />
                        </div>
                    </div>
                    <div class="form-group m-form__group">
                        <label for="exampleInputEmail1">
                            Subject*:
                        </label>
                        <div class="input-group m-input-group m-input-group--air">
                            <span class="input-group-addon">
                                <i class="la la-ils"></i>
                            </span>
                            <input type="text" class="form-control m-input" name="subject" placeholder="Subject" aria-describedby="basic-addon1" required />
                        </div>
                    </div>
                    <div class="form-group m-form__group">
                        <label for="message">
                            Message*:
                        </label>
                        <textarea class="form-control m-input m-input--air" name="message" id="message" placeholder="Message" rows="3" required></textarea>
                    </div>
                    <div class="form-group m-form__group" style="text-align: center;">
                        <button type="submit" class="btn btn-squre m-btn btn-outline-accent m-btn--custom m-btn--air form-submit-btn" name="button">Send message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('custom_js')
<script type="text/javascript" src="/js/contact.js"></script>
@endsection
