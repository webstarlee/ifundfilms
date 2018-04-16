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
		<title>{{$setting->app_name}} | Terms and Condition</title>
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
				                  <p align="left"><strong><font size="4">
									<img border="0" src="/assets/images/terms-image.jpg" alt="ifundfilms_terms_legal" width="318" height="159" align="right"></font></strong></p>
									<p align="left"><b><font size="3">Terms &amp; Conditions</font></b> – Please Read<br>
									<br>
									www.iFundFilms.com, (our website) is operated by iFundFilms,
									LLC, and affiliates (herein which may be referred to as
									“our”, “we”, and/or “us&quot;). The website is subject to certain
									Terms &amp; Conditions, set forth in our legally binding terms
									for your use of our website.<br>
									<br>
									Your Consent<br>
									<br>
									By using iFundFilms™website, you hereby agree to all Terms &amp;
									Conditions (iFundFilms™ Agreement) as explained herein.
									Please read this entire Agreement with utmost care. You are
									not required to subscribe to iFundFilms™.<br>
									<br>
									By using our services you agree to be bound by these Terms &amp;
									Conditions. Please read all of our terms &amp; conditions with
									care before using our website. If you do not agree with any
									part of these Terms &amp; Conditions, please do not use our
									website.<br>
									<br>
									We reserve the right to modify/update this Agreement at our
									discretion and at any time and we shall post the modified
									version to our website and revising the effective date as
									indicated below. All changes will automatically be effective
									upon posting to our website, and you agree to be bound by
									all such modifications, revisions and updates. You are
									encouraged to visit this page from time to time to review
									current terms.<br>
									<br>
									A. GENERAL WEBSITE USE<br>
									<br>
									User License<br>
									<br>
									Anyone can download at iFundFilms™. You are granted a
									nonexclusive, limited and nontransferable license to access
									the website and its contents in accordance with these Terms
									&amp; Conditions. If you are under 18 years of age you may only
									use our website with the involvement and discretion of a
									parent or guardian. Our Corporation is located in the United
									States. All donations shall be conducted in U.S. dollars.
									Those who access this website from locations other than the
									United States do so acceding to their own accord and shall
									be bound to compliance of all local laws.<br>
									&nbsp; </p>
									<p align="left">(iv). You are solely responsible for your
									use of our website, and you agree to hold harmless, and
									defend iFundFilms.com from any claims, liabilities, losses,
									damages, costs, and/or expenses, including all attorney fees
									resulting from your use or misuse of our website. Posting or
									transmitting any indecent, obscene, unlawful, infringing,
									libelous, threatening, defamatory, inflammatory or profane
									material, or any material that could constitute or encourage
									tactics that would be considered a criminal offense, give
									rise to civil liability, or otherwise violate any law is
									prohibited on our website. Further, you waive, release,
									discharge and covenant not to sue iFundFilms, LLC, its
									officers, directors, agents and employees (hereinafter
									referred to as &quot;releasee&quot;) from any and all liability,
									claims, demands, actions and causes of action whatsoever
									arising out of or relating to any loss, damage or injury,
									including death, that may be sustained by me, or to any
									property belonging to me, whether caused by the negligence
									of the releasee, or otherwise, while using our program.<br>
									<br>
									(ii). you are fully aware that there may be risks unknown to
									you connected with participation in our platform, and you
									hereby elect to voluntarily engage in activities in which
									you voluntarily assume complete responsibility for any risks
									of loss.<br>
									<br>
									(iii). you hereby agree to indemnify and hold harmless
									iFundFilms™ from any liability, damage, loss or costs it may
									incur due to your participation. More on indemnification can
									be found on our webpages.<br>
									<br>
									Limitations of Your Use<br>
									<br>
									No material from our website may be displayed, transmitted,
									copied, reproduced, republished, posted or distributed in
									any form without iFundFilms™ prior written permission. You
									may not reverse engineer nor attempt to spin a competing
									business out of the iFundFilms™ business model and agree not
									to contact the iFundFilms™ programmers or providers. You
									hereby warrant to us that all information supplied is true
									and verifiably accurate.<br>
									<br>
									Terms &amp; Conditions and Your Personal Information<br>
									<br>
									By using our website you are also subject to the terms of
									our terms &amp; conditions. You acknowledge that you have read
									and understand our Privacy Policy, and you consent to the
									use of any personal information provided in accordance with
									the terms of, and for the purpose set forth in the
									iFundFilms.com Privacy Policy.<br>
									<br>
									Links to Third-Party Websites<br>
									<br>
									Our website could contain hyperlinks to other 3rd party
									websites for your information and/or convenience. These 3rd
									party websites are solely responsible for their own website
									terms of use. We suggest you carefully review the terms of
									each 3rd party website you may access from our website.
									iFundFilms™ cannot guarantee that it monitors the content
									and accuracy of third-party websites.<br>
									<br>
									Intellectual Property Rights of iFundFilms.com<br>
									<br>
									Copyright(s)<br>
									<br>
									The website design, arrangement of elements, text, content,
									selection, organization, graphics, compilation, look &amp; feel,
									digital conversion, and other matters related to the website
									are protected under applicable copyright law(s), ALL RIGHTS
									RESERVED as posted. The posting of any such elements on the
									website does not constitute a waiver of any right of use
									such elements in use. You do not acquire ownership rights to
									any elements viewed through iFundFilms.com website. Except
									as otherwise provided herewith, none of these elements may
									be used, copied, reproduced, displayed, downloaded, posted,
									modified, transmitted, or distributed in any form or by any
									means, including, without limitation, electronic,
									mechanical, photocopying, recording, or otherwise, without
									iFundFilms™ prior written permission, NO EXCEPTIONS.<br>
									<br>
									Trademark(s)<br>
									<br>
									iFundFilms™, the iFundFilms™ logo, and all company names,
									product names, and all trademarks &amp; logos, unless contrarily
									noted, are trademarks and/or trade dress of iFundFilms, LLC,
									in the United States of America. The use or misuse of any
									marks or any other materials contained on the website
									--without the prior written permission of their owner, is
									expressly forbidden.<br>
									<br>
									B. CONTENT POSTED BY USERS<br>
									<br>
									Content<br>
									<br>
									B.1 All information, music, sound, video, software, data,
									graphics, text, photographs, messages, products, services,
									and other materials posted to the website by users,
									including any content by you (&quot;Content&quot;), are the sole
									responsibility of the person whom the Content was posted.
									This means that you, and not iFundFilms™, are solely
									responsible for all the Content that you upload, post,
									transmit, or make available through our website. You are
									also solely responsible for all Content that you post under
									your user account. You represent and warrant that you own or
									otherwise control all of the rights in and to the content
									that you post; (ii) that the content is accurate; (iii) your
									supplied Content does not violate these Terms; (iv) your
									Content does not infringe, violate, or interfere with any
									other intellectual property or other rights of any 3rd party
									nor does it violate any applicable law or regulation; and
									(v) your Content will not cause injury to any other person
									or entity including iFundFilms™.<br>
									<br>
									User Submissions. We are always delighted to receive your
									comments and suggestions when conducted through the proper
									channels. If you submit comments, suggestions, ideas, etc.,
									(collectively “Submissions”) in response to any content on
									this website, you grant us a non-exclusive, royalty-free,
									perpetual and irrevocable right to use, publish, modify,
									reproduce, translate, adapt, distribute or incorporate such
									Submission and the names identified on the Submission
									throughout the world in any media. iFundFilms™ may post your
									feedback on the website and reserves the right (but not the
									obligation) to monitor, edit and/or remove any Submission.
									When you send a Submission, you represent and warrant that
									you own or otherwise control all of the rights to the
									content in your Submission, that the content you provide is
									accurate, and that use of the content in your Submission
									does not violate this agreement and will not cause injury to
									any other person or entity including iFundFilms™.<br>
									<br>
									B.2. Should any Content be deemed illegal, we will cooperate
									with the proper authorities, including but not limited to
									submitting all necessary information to them when requested
									or subpoenaed.<br>
									<br>
									B.3. If we determine, in our sole discretion, that any
									Content submitted for ad purposes by you is offensive or
									inappropriate, we shall reject, remove the Content
									immediately or ask you to retract or modify any Content in
									question. If you fail to meet our request within the time
									specified, we may remove or reject the Content. We have no
									obligation however, to restrict or monitor an or all Content
									in any way.<br>
									<br>
									B.4. You may see or read things that you do not like or
									agree with on our website. You understand that by using our
									website, you may be exposed to Content from other members
									that are offensive, indecent, or objectionable. We will
									strive to maintain a clean environment at all times and
									encourage your participation in helping us keep the content
									clean. Further, if you see submissions that you feel are not
									professional you may contact us about the submission though
									the abuse email provided herein.<br>
									<br>
									B.5. Under no circumstances will we be liable for any
									Content in any way, including, but not limited to; any
									errors or omissions in any Content, or for any loss or
									damage of any kind incurred as a result of the use of any
									Content posted, transmitted, or otherwise made available
									through the website.<br>
									<br>
									B.6. We do not control all of the Content posted on or
									through the website and, therefore, we do not guarantee the
									integrity, accuracy, or quality of all Content. You and you
									alone are responsible solely for any use or reliance on the
									Content, including accuracy, condition, completeness, or its
									usefulness.<br>
									<br>
									B.7. You acknowledge that we are under no obligation to
									pre-screen any Content, but that our designees and we
									--shall have the right (but not the obligation) in our sole
									discretion to refuse or remove Content that is made
									available through our website. Without limiting the
									foregoing, our designees and we shall have the right to
									remove any Content that violates any Terms or any other
									iFundFilms.com policy or is otherwise objectionable, in our
									sole discretion.<br>
									<br>
									B.8. Any material, information, or idea you submit to us or
									the website by any means may be disseminated or used by us
									without compensation or liability to you for any purpose
									whatsoever, including, but not limited to, developing and
									marketing products. We have no obligation to keep any
									submissions confidential, return any materials that you
									submit to us, or compensate you for the use of any such
									materials under any circumstances. You hereby irrevocably
									waive any claims based on our use of any materials, ideas,
									or information that you willingly submit to us.<br>
									<br>
									B.9. We reserve the right to monitor all, some or none of
									the areas of the website for adherence to all Terms and
									Conditions. You acknowledge that by providing you with the
									ability to post information on the website, we act as a
									passive conduit for distribution and are not undertaking any
									obligation or liability relating to any or all postings or
									activities on the website and we hold no obligation or
									liability for the information in which you may post now or
									in the future.<br>
									<br>
									B.10. Content License<br>
									<br>
									We never claim ownership of the Content you upload or post
									through the website. You are responsible for protecting your
									rights in such Content and are not entitled to our
									assistance in protecting such Content. By uploading, posting
									or placing Content through the website you grant us a
									perpetual, worldwide, irrevocable, royalty-free, fully
									sub-licensable, non-exclusive license, and under all
									intellectual property and other rights, including, without
									limitation, privacy &amp; publicity to use, reproduce,
									translate, modify, distribute, publicly perform, adapt,
									publicly display, exploit, transmit, or create derivative
									works from the Content (in whole or in part), and
									incorporate such Content into other works in any format or
									medium now known or which could later be developed, for any
									purpose associated with the website. You grant our
									sub-licensees and iFundFilms.com the right to use the name
									that you submit in connection with such Content, if we
									choose. You hereby irrevocably waive any claims based on
									“moral rights” and analogous theories, if any. Please note,
									however, that certain activities that may involve the
									submission of Content by you may have terms applicable to
									your Content that differ from those above. In the event such
									terms differ with these terms herein, such terms will govern
									and take precedence over these terms with respect to your
									Content.<br>
									<br>
									C. YOUR CONDUCT ONLINE<br>
									<br>
									Conduct Guidelines/Community Standards. The following is a
									non-inclusive list of behaviors that are not permitted on
									the website. You agree not to:<br>
									<br>
									upload, transmit, post, or contrarily make available Content
									that is defamatory, harmful, unlawful, obscene, threatening,
									libelous, abusive, harassing, vulgar, or invasive of another
									person&#39;s privacy (up to, but not excluding any address,
									email, phone number, or any other contact information
									without the written consent of the owner of such
									information), hateful, racially, or objectionable;<br>
									<br>
									harm to minors in any method;<br>
									<br>
									impersonate any person or an entity, including but not
									limited to any of our members, company officials,
									representatives, directors, shareholders, agents, or users,
									or falsely state or otherwise misrepresent any affiliation
									with a person or entity that is untrue;<br>
									<br>
									forge headers or manipulate any identifiers in order to
									cloak the origin of Content transmitted, posted, or
									otherwise ready available through the website;<br>
									<br>
									upload, transmit, or otherwise post any Content in which you
									do not have a right to upload or otherwise transmit under
									any law or under contractual or fiduciary alliance; such as
									any proprietary information and confidential information
									discovered or disclosed as part of relationships or under
									non-disclosure agreement(s);<br>
									<br>
									upload otherwise transmit any Content or otherwise engage in
									any activity that violates, infringes, or interferes with
									any copyright, trademark, patent, trade secret, rights of
									privacy or publicity, or other proprietary rights of any
									direct or 3rd party;<br>
									<br>
									upload or otherwise transmit unsolicited commercial email or
									&quot;spam.&quot; This includes unethical advertising, marketing,
									&quot;chain letters,&quot; or any other practice that is in any way
									connected with &quot;spam,&quot; such as (a) sending mass email to
									recipients who haven&#39;t requested email from you or with a
									fake address, (b) promote a website with inappropriate
									titles, descriptions, links, or (c) promote your website by
									posting multiple submissions in public forums that are
									identical;<br>
									<br>
									upload or otherwise transmit any material that contains
									potential software viruses, malware, or any other
									manipulated computer code, files or programming which is
									designed to destroy, interrupt, or limit the function of any
									computer hardware, software or telecommunication equipment,
									or intercept messages sent from any communication device or
									computer;<br>
									<br>
									interfere or disrupt the webservers, website or any network
									connected to our website, or disobey any policies,
									procedures, requirements, or regulation of any network(s)
									connected to the website;<br>
									<br>
									intentionally or unintentionally contravene any applicable
									local laws, state laws, national laws, or international
									laws;<br>
									<br>
									“stalk&quot; or otherwise harass another person or entity;<br>
									<br>
									promote or provide instructional information concerning
									illegal activities;<br>
									<br>
									use the website as a forwarding service to another website;<br>
									<br>
									allow usage by others in such a way as to violate the Terms
									and Conditions or any other iFundFilms.com policy;<br>
									<br>
									take any steps to interfere with or in any manner compromise
									any of our security measures;<br>
									<br>
									use the website ad platform for any fraudulent purposes;<br>
									<br>
									collect or harvest any information about or regarding other
									Account holders, including, without limitations, any
									personal information or data;<br>
									<br>
									sell, lease, lend, barter, trade, rent, transfer,
									sublicense, assign, or grant any rights in any manner to
									your Account or password including, without limitation, on
									or through the use of any 3rd party website or service;<br>
									<br>
									copy the website or any portion thereof (other than as
									provided under United States of America copyright laws);<br>
									<br>
									remove any proprietary notices from the website;<br>
									<br>
									permit, cause, or authorize any modification, creation of
									derivative works, or translation of the website without our
									express written permission;<br>
									<br>
									act as a service bureau, assign, sell, lease, rent, or grant
									rights in the website including without limitation, through
									sublicense --to any other person or entity;<br>
									<br>
									attempt to reverse engineer, decompile, modify, disassemble
									or hack the website or attempt to defeat or overcome any
									encryption and/or digital rights management technology
									implemented by us or by our third-party providers with
									respect to the website and/or data transmitted, stored, or
									processed by us or the website;<br>
									<br>
									use this proprietary website in any manner not permitted by
									this policy, or otherwise exceed the scope of our services
									that you have subscribed for by accessing and/or using the
									tools and services in which you do not have the right to use
									as outlined herein.<br>
									<br>
									D. Indemnification<br>
									<br>
									You agree to indemnify and hold harmless iFundFilms™, its
									directors, affiliates, and its officers, employees,
									managers, agents, and licensors, from and against all
									losses, damages, expenses and costs, including all
									reasonable attorneys’ fees resulting from any violation of
									these Terms &amp; Conditions or other applicable agreements
									between you and iFundFilms™. We reserve the right to acquire
									the exclusive defense of any claim for which we are entitled
									for indemnification under the Terms &amp; Conditions as stated
									herein. In any such event, you shall provide us with
									cooperation as is reasonably requested by iFundFilms.com.<br>
									<br>
									Applicable Law. This website is created and controlled by
									iFundFilms, LLC, in the State of Oklahoma, USA. The laws of
									the State of Oklahoma govern these terms and conditions,
									without giving effect to any principles of conflicts of
									laws. iFundFilms™ makes no representation that the
									information in the website is appropriate or available for
									use in other locations, and access to the website from
									territories where the content of the website may be illegal
									is prohibited. Those who choose to access the website from
									other locations do so on their own initiative and are solely
									responsible for compliance with applicable local laws. These
									Terms &amp; Conditions constitute the entire agreement between
									iFundFilms™ and website visitors with respect to the
									website.<br>
									<br>
									E. Limitation of Liability<br>
									<br>
									IN NO EVENT WILL WE BE LIABLE, NOR DO WE ASSUME
									RESPONSIBILITY, DIRECTLY OR INDIRECTLY, INCIDENTAL, SPECIAL
									OR CONSEQUENTIAL DAMAGES ARISING OUT OF/OR IN CONNECTION
									WITH THE USE OR INABILITY TO USE THIS EXCLUSIVE WEBSITE OR
									THE CONTENT OR SERVICES PROVIDED ON, OR ACCESSIBLE FROM,
									THIS WEBSITE, OR OTHERWISE, EVEN IF WE ARE ADVISED OF THE
									POSSIBILITY OF SUCH DAMAGES.<br>
									<br>
									F. GENERAL TERMS<br>
									<br>
									F.1. Errors and Corrections<br>
									<br>
									While we use reasonable efforts to include accurate and
									current information on our website, we do not represent or
									warrant that the website will be error-free. Data entry
									errors or other technical problems could sometimes result in
									inaccurate information being displayed. We reserve the right
									to correct any inaccuracies or typographical errors on our
									website, including pricing &amp; availability of products and/or
									services, and shall claim no liability for any such errors.
									We may also make improvements and/or changes to the
									website&#39;s functionality, features, or content at any time.<br>
									<br>
									G. Governing Law and Jurisdiction<br>
									<br>
									These Terms &amp; Conditions are governed by and in accordance
									with the laws of the State of Oklahoma, USA, without giving
									effect to conflict of law principles. Any controversy or
									dispute arising out of your use of our website shall be
									submitted, and you irrevocably consent, to the personal
									jurisdiction and venue of any state or federal court located
									in, or whose district includes, Davidson County, Oklahoma.
									If any provision of these Terms &amp; Conditions is found to be
									unlawful, void, or for any reason unenforceable, then that
									provision shall be deemed removed and shall not affect the
									validity or enforceability of any enduring provisions.<br>
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
