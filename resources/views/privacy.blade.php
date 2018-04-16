<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4
Version: 5.0.6.1
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<?php
			$setting = \App\Setting::where('id', 1)->first();
		?>
		<title>{{$setting->app_name}} | Privacy</title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="csrf-token" content="{{ csrf_token() }}" />
		<!--begin::Web font -->
		{{-- <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script> --}}
		<script src="/assets/plugins/webfont.js"></script>
		<script>
          WebFont.load({
            google: {"families":["Montserrat:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
		</script>
		<!--end::Web font -->
        <!--begin::Base Styles -->
		<link href="/assets/plugins/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
		<link href="/assets/plugins/baseApp/demo4/style.bundle.css" rel="stylesheet" type="text/css" />
		<link href="/css/loader.css" rel="stylesheet" type="text/css" />
		<link href="/css/frontCustom.css" rel="stylesheet" type="text/css" />
		<style media="screen">
			.m-content p {
				font-family: Tahoma, Geneva, sans-serif;
				color: #666;
				font-size: 13px;
				line-height: 1.7em;
			}
		</style>
		<!--end::Base Styles -->
		<link rel="shortcut icon" href="assets/images/fav_ico.png" />
	</head>
	<!-- end::Head -->
    <!-- end::Body -->
	<body style="background-image: url(assets/images/bg.jpg)"  class="m-page--boxed m-header--static m-aside--offcanvas-default"  >
		{{-- start loading --}}
        <div class="loader-container circle-pulse-multiple">
            <div class="loaders">
                <div id="loading-center-absolute">
                    <div class="object" id="object_four"></div>
                    <div class="object" id="object_three"></div>
                    <div class="object" id="object_two"></div>
                    <div class="object" id="object_one"></div>
                </div>
            </div>
        </div>
		{{-- end loading --}}
		<!-- begin:: Page -->
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<!-- begin::Header -->
			<header class="m-grid__item	m-grid m-grid--desktop m-grid--hor-desktop  m-header " >
				<div class="m-grid__item m-grid__item--fluid m-grid m-grid--desktop m-grid--hor-desktop m-container m-container--responsive m-container--lg">
					<div class="m-grid__item m-grid__item--fluid m-grid m-grid--desktop m-grid--ver-desktop m-header__wrapper">
						<!-- begin::Brand -->
						<div class="m-grid__item m-brand">
							<div class="m-stack m-stack--ver m-stack--general m-stack--inline">
								<div class="m-stack__item m-stack__item--middle m-brand__logo">
									<a href="{{route('dashboard')}}" class="m-brand__logo-wrapper">
										@if (file_exists('uploads/logos/'.$setting->logo_img))
											<img src="{{asset('uploads/logos/'.$setting->logo_img)}}" class="company-main-logo-img" alt="author">
										@else
											<img alt="" src="/assets/images/logo/logo.png" class="company-main-logo-img" />
										@endif
									</a>
								</div>
								<div class="m-stack__item m-stack__item--middle m-brand__tools">
									<!-- begin::Responsive Header Menu Toggler-->
									<a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
										<span></span>
									</a>
									<!-- end::Responsive Header Menu Toggler-->
									<!-- begin::Topbar Toggler-->
									<a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
										<i class="flaticon-more"></i>
									</a>
									<!--end::Topbar Toggler-->
								</div>
							</div>
						</div>
						<!-- end::Brand -->
						<!-- begin::Topbar -->
						<div class="m-grid__item m-grid__item--fluid m-header-head" id="m_header_nav">
							<div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
								<div class="m-stack__item m-topbar__nav-wrapper">
									<ul class="m-topbar__nav m-nav m-nav--inline">
										<li class="m-nav__item @if (Route::currentRouteName()=='welcome') active @endif">
											<a href="{{route('welcome')}}" class="m-nav__link m-dropdown__toggle ifundfilms-top-header">
												<span style="height:71px;width:120px;">Back to Home</span>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<!-- end::Topbar -->
					</div>
				</div>
			</header>
			<!-- end::Header -->
			<!-- begin::Body -->
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid m-grid--hor m-container m-container--responsive m-container--lg">
				<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor-desktop m-grid--desktop m-body">
					<div class="m-grid__item m-grid__item--fluid m-grid m-grid--desktop m-grid--ver-desktop">
						<div class="m-grid__item m-grid__item--fluid m-wrapper">
							<div class="m-content" style="padding:30px;">
								<div class="header">
				                  <p align="left">
									<br style="color: rgb(102, 102, 102); font-family: Tahoma,Geneva,sans-serif; font-size: 13px; line-height: 22.1px; margin: 0px; padding: 0px; background-color: transparent; background-image: none; background-repeat: repeat; background-position: 0% 0%">
									&nbsp; <font size="3"><b>Privacy Policy of iFundFilms</b><img border="0" src="/assets/images/privacy_image.jpg" alt="ifundfilms_privacy_policy" width="321" height="216" align="right"></font><strong style="color: rgb(102, 102, 102); font-family: Tahoma,Geneva,sans-serif; font-size: 13px; line-height: 22.1px; background-color: transparent; background-image: none; background-repeat: repeat; background-position: 0% 0%; font-weight:400"><font size="4" style="color: rgb(102, 102, 102); font-family: Tahoma,Geneva,sans-serif; font-size: 12pt; line-height: 22.1px; background-color: transparent; background-image: none; background-repeat: repeat; background-position: 0% 0%">™</font></strong><br style="color: rgb(102, 102, 102); font-family: Tahoma,Geneva,sans-serif; font-size: 13px; line-height: 22.1px; margin: 0px; padding: 0px; background-color: transparent; background-image: none; background-repeat: repeat; background-position: 0% 0%">
									<br style="color: rgb(102, 102, 102); font-family: Tahoma,Geneva,sans-serif; font-size: 13px; line-height: 22.1px; margin: 0px; padding: 0px; background-color: transparent; background-image: none; background-repeat: repeat; background-position: 0% 0%">
									Introduction<br style="color: rgb(102, 102, 102); font-family: Tahoma,Geneva,sans-serif; font-size: 13px; line-height: 22.1px; margin: 0px; padding: 0px; background-color: transparent; background-image: none; background-repeat: repeat; background-position: 0% 0%">
									iFundFilms, LLC, (herein known as iFundFilms™) is sensitive
									to your privacy on the Internet. It is crucial that you know
									the methods in which information is treated while you are
									visiting iFundFilms™. Users should be aware of information
									collected, how that information is used and under the
									circumstances in which it could be disclosed. We will update
									this policy when necessary and shall place the new date
									below.<br style="color: rgb(102, 102, 102); font-family: Tahoma,Geneva,sans-serif; font-size: 13px; line-height: 22.1px; margin: 0px; padding: 0px; background-color: transparent; background-image: none; background-repeat: repeat; background-position: 0% 0%">
									&nbsp; </p>
									<p align="left" style="color: rgb(102, 102, 102); font-family: Tahoma,Geneva,sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-decoration: none; text-indent: 0px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px; margin-left: 0px; margin-right: 0px; margin-top: 0px; margin-bottom: 10px; padding: 0px; background-color: transparent">
									Information &amp; Collection Use<br style="color: rgb(102, 102, 102); font-family: Tahoma,Geneva,sans-serif; font-size: 13px; line-height: 22.1px; margin: 0px; padding: 0px; background-color: transparent; background-image: none; background-repeat: repeat; background-position: 0% 0%">
									In order to peruse this website, visitors shall not be
									required to complete any registration form. In general, you
									can visit iFundFilms™ on the World Wide Web without telling
									us who you are or revealing any personal information about
									yourself. Our servers do collect IP addresses but gathers no
									e-mail addresses of visitors. This information may be used
									to measure the number of visits and the average time which
									might be spent on the site or how many pages viewed, etc.
									iFundFilms™ may use this information to measure the use of
									our site and to improve the content presented within. We
									maintain physical, electronic and procedural safeguards that
									comply with federal regulations to guard your non-public
									personal information.<br style="color: rgb(102, 102, 102); font-family: Tahoma,Geneva,sans-serif; font-size: 13px; line-height: 22.1px; margin: 0px; padding: 0px; background-color: transparent; background-image: none; background-repeat: repeat; background-position: 0% 0%">
									&nbsp; </p>
									<p align="left" style="color: rgb(102, 102, 102); font-family: Tahoma,Geneva,sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-decoration: none; text-indent: 0px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px; margin-left: 0px; margin-right: 0px; margin-top: 0px; margin-bottom: 10px; padding: 0px; background-color: transparent">
									Registration is not required to visit our site. We respect
									all site visitors’ right to their personal privacy. We only
									collect and use information on our website as disclosed
									within iFundFilms™ Privacy Policy. This statement shall
									apply solely to the information collected on this website.
									This site collects cookies.<br style="color: rgb(102, 102, 102); font-family: Tahoma,Geneva,sans-serif; font-size: 13px; line-height: 22.1px; margin: 0px; padding: 0px; background-color: transparent; background-image: none; background-repeat: repeat; background-position: 0% 0%">
									&nbsp; </p>
									<p align="left" style="color: rgb(102, 102, 102); font-family: Tahoma,Geneva,sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-decoration: none; text-indent: 0px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px; margin-left: 0px; margin-right: 0px; margin-top: 0px; margin-bottom: 10px; padding: 0px; background-color: transparent">
									Personal information we collect is only collected upon
									subscription to our service or service purchases. Anonymity
									is removed for registrants and participants making income
									from our site or paying for services to a provider.
									Registrants who make income from our site, in the event of
									advertising, shall be solely responsible for their own taxes
									from any such earnings, regardless of the amount earned on
									our site.<br style="color: rgb(102, 102, 102); font-family: Tahoma,Geneva,sans-serif; font-size: 13px; line-height: 22.1px; margin: 0px; padding: 0px; background-color: transparent; background-image: none; background-repeat: repeat; background-position: 0% 0%">
									&nbsp; </p>
									<p align="left" style="color: rgb(102, 102, 102); font-family: Tahoma,Geneva,sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-decoration: none; text-indent: 0px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px; margin-left: 0px; margin-right: 0px; margin-top: 0px; margin-bottom: 10px; padding: 0px; background-color: transparent">
									During the download process a user is not required to
									provide personal information and we will never sell or give
									away any information to other organizations for commercial
									gain. In the event of advertising on our site we may collect
									information from you, whereby proper identification from
									registrant is required during the advertising registration
									process.<br style="color: rgb(102, 102, 102); font-family: Tahoma,Geneva,sans-serif; font-size: 13px; line-height: 22.1px; margin: 0px; padding: 0px; background-color: transparent; background-image: none; background-repeat: repeat; background-position: 0% 0%">
									&nbsp; </p>
									<p align="left" style="color: rgb(102, 102, 102); font-family: Tahoma,Geneva,sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-decoration: none; text-indent: 0px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px; margin-left: 0px; margin-right: 0px; margin-top: 0px; margin-bottom: 10px; padding: 0px; background-color: transparent">
									We may disclose your information as required by law or to
									our select and trusted developers or subcontractors. Such
									developers or contractors should respect your information as
									confidential. </p>
									<p align="left" style="color: rgb(102, 102, 102); font-family: Tahoma,Geneva,sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-decoration: none; text-indent: 0px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px; margin-left: 0px; margin-right: 0px; margin-top: 0px; margin-bottom: 10px; padding: 0px; background-color: transparent">
									<br style="color: rgb(102, 102, 102); font-family: Tahoma,Geneva,sans-serif; font-size: 13px; line-height: 22.1px; margin: 0px; padding: 0px; background-color: transparent; background-image: none; background-repeat: repeat; background-position: 0% 0%">
									If you are asked for usernames or passwords which you
									believe may not originate from iFundFilms™ do not reply.
									This policy is to make its best attempt to ensure that
									confidential information, which you may provide, is not
									given out that may compromise privacy for you or other
									iFundFilms™ members.<br style="color: rgb(102, 102, 102); font-family: Tahoma,Geneva,sans-serif; font-size: 13px; line-height: 22.1px; margin: 0px; padding: 0px; background-color: transparent; background-image: none; background-repeat: repeat; background-position: 0% 0%">
									&nbsp; </p>
									<p align="left" style="color: rgb(102, 102, 102); font-family: Tahoma,Geneva,sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-decoration: none; text-indent: 0px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px; margin-left: 0px; margin-right: 0px; margin-top: 0px; margin-bottom: 10px; padding: 0px; background-color: transparent">
									iFundFilms™ does not collect any donation or credit card
									information directly on our site but you will be directed to
									a third party payment processor, known as PayPal, where you
									may submit donation and credit card information. iFundFilms™
									does not maintain any permanent or temporary credit card
									information on our Internet server. All transactions are
									encrypted using PayPal encryption and travel over a Secure
									Socket Layer (SSL) server through the PayPal service. Users
									should visit PayPal for their policies and procedures. </p>
									<p align="left" style="color: rgb(102, 102, 102); font-family: Tahoma,Geneva,sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-decoration: none; text-indent: 0px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px; margin-left: 0px; margin-right: 0px; margin-top: 0px; margin-bottom: 10px; padding: 0px; background-color: transparent">
									<br style="color: rgb(102, 102, 102); font-family: Tahoma,Geneva,sans-serif; font-size: 13px; line-height: 22.1px; margin: 0px; padding: 0px; background-color: transparent; background-image: none; background-repeat: repeat; background-position: 0% 0%">
									The Corporate Website may contain links to other sites such
									as provider’s pages or other affiliates. While we try to
									link only with sites that share our privacy standards, we
									cannot be liable for the content or the privacy practices
									which may be implemented on any other site(s). Users should
									read &amp; understand the privacy policies of other sites they
									visit as a result of linking through iFundFilms™. </p>
									<p align="left" style="color: rgb(102, 102, 102); font-family: Tahoma,Geneva,sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-decoration: none; text-indent: 0px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px; margin-left: 0px; margin-right: 0px; margin-top: 0px; margin-bottom: 10px; padding: 0px; background-color: transparent">
									<br style="color: rgb(102, 102, 102); font-family: Tahoma,Geneva,sans-serif; font-size: 13px; line-height: 22.1px; margin: 0px; padding: 0px; background-color: transparent; background-image: none; background-repeat: repeat; background-position: 0% 0%">
									iFundFilms™ reserves the right to modify this policy at any
									time without further notice but we will post the date of any
									updates. Users should check back occasionally for any
									updates to this policy.<br style="color: rgb(102, 102, 102); font-family: Tahoma,Geneva,sans-serif; font-size: 13px; line-height: 22.1px; margin: 0px; padding: 0px; background-color: transparent; background-image: none; background-repeat: repeat; background-position: 0% 0%">
									&nbsp; </p>
									<p align="left" style="color: rgb(102, 102, 102); font-family: Tahoma,Geneva,sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-decoration: none; text-indent: 0px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px; margin-left: 0px; margin-right: 0px; margin-top: 0px; margin-bottom: 10px; padding: 0px; background-color: transparent">
									Copyright and Trademark Notice<br style="color: rgb(102, 102, 102); font-family: Tahoma,Geneva,sans-serif; font-size: 13px; line-height: 22.1px; margin: 0px; padding: 0px; background-color: transparent; background-image: none; background-repeat: repeat; background-position: 0% 0%">
									The contents of all material available on this website are
									copyrighted by iFundFilms, LLC All rights reserved and
									content may not be in full or in part --reproduced,
									published, disseminated, downloaded, or transferred in any
									form or by any means, even electronically, except with the
									prior written permission of iFundFilms, LLC Copyright
									infringement is a violation of federal law and subject to
									criminal and civil penalties. Further legal notice can be
									found in the company&#39;s Terms &amp; Conditions.<br>
									<br>
									Last Update; February 09, 2018
								</div>
							</div>
						</div>
					</div>
					<div class="m-grid__item m-body__nav">
						<div class="m-stack m-stack--ver m-stack--desktop">
							<!-- begin::Horizontal Menu -->
							<div class="m-stack__item m-stack__item--middle m-stack__item--fluid ifundfilm-nav-flex">
								<button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-light " id="m_aside_header_menu_mobile_close_btn">
									<i class="la la-close"></i>
								</button>
								<div id="m_header_menu" class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-light m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-light m-aside-header-menu-mobile--submenu-skin-light "  >
									<ul class="m-menu__nav  m-menu__nav--submenu-arrow ">
										<li class="m-menu__item  m-menu__item--active"  aria-haspopup="true">
											<a  href="{{route('welcome')}}" class="m-menu__link ">
												<span class="m-menu__link-text">
													Back to Home
												</span>
											</a>
										</li>
									</ul>
								</div>


							</div>
							<!-- end::Horizontal Menu -->
						</div>
					</div>
					<div style="margin-bottom:20px;"></div>
				</div>
			</div>
			<!-- begin::Body -->
			<!-- begin::Footer -->
			<footer class="m-grid__item	m-footer ">
				<div class="m-container m-container--responsive m-container--lg">
					<div class="m-footer__wrapper">
						<div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
							<div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
								<span class="m-footer__copyright">
									Copyright &copy; 2018 iFundFilms.com
									<a href="#" class="m-link">
										All Rights Reserved
									</a>
								</span>
							</div>
							<div class="m-stack__item m-stack__item--right m-stack__item--middle m-stack__item--first">
								<ul class="m-footer__nav m-nav m-nav--skin-dark m-nav--inline m--pull-right">
									<li class="m-nav__item">
										<a href="{{route('term')}}" target="_blank" class="m-nav__link">
											<span class="m-nav__link-text">
												Terms & Conditions
											</span>
										</a>
									</li>
									<li class="m-nav__item">
										<a href="#" class="m-nav__link">
											<span class="m-nav__link-text">
												|
											</span>
										</a>
									</li>
									<li class="m-nav__item">
										<a href="{{route('privacy')}}" target="_blank" class="m-nav__link">
											<span class="m-nav__link-text">
												Privacy Policy - Legal
											</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</footer>
		</div>
		<!-- end:: Page -->
	    <!-- begin::Scroll Top -->
		<div class="m-scroll-top m-scroll-top--skin-top" data-toggle="m-scroll-top" data-scroll-offset="500" data-scroll-speed="300">
			<i class="la la-arrow-up"></i>
		</div>
		<!-- end::Scroll Top -->
    	<!--begin::Base Scripts -->
		<script src="/assets/plugins/base/vendors.bundle.js" type="text/javascript"></script>
		<script src="/assets/plugins/baseApp/demo4/scripts.bundle.js" type="text/javascript"></script>
		<!--end::Base Scripts -->
		<script>
			window.onload = function () {
				setTimeout(function () {
					$('.loader-container').fadeOut('slow'); // will first fade out the loading animation
					$('.loader').delay(150).fadeOut('slow'); // will fade out the white DIV that covers the website.
					$('body').delay(150).css({'overflow':'visible'});
				}, 500);
			}
		</script>
	</body>
	<!-- end::Body -->
</html>
