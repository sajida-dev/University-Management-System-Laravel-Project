<!DOCTYPE html>
<!--
Template Name:  SmartAdmin Responsive WebApp - Template build with Twitter Bootstrap 4
Version: 4.5.1
Author: Sunnyat A.
Website: http://gootbootstrap.com
Purchase: https://wrapbootstrap.com/theme/smartadmin-responsive-webapp-WB0573SK0?ref=myorange
License: You must have a valid license purchased only from wrapbootstrap.com (link above) in order to legally use this theme for your project.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>
        Sign Up - UE Job Portal
    </title>
    <meta name="description" content="Login">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
    <!-- Call App Mode on ios devices -->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no">
    <!-- base css -->
    <link id="vendorsbundle" rel="stylesheet" media="screen, print"
        href="https://admissions.uoel.edu.pk/admin_asset/css/vendors.bundle.css">
    <link id="appbundle" rel="stylesheet" media="screen, print"
        href="https://admissions.uoel.edu.pk/admin_asset/css/app.bundle.css">
    <link id="mytheme" rel="stylesheet" media="screen, print" href="#">
    <link id="myskin" rel="stylesheet" media="screen, print"
        href="https://admissions.uoel.edu.pk/admin_asset/css/skins/skin-master.css">
    <!-- Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" sizes="180x180"
        href="https://admissions.uoel.edu.pk/admin_asset/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32"
        href="https://admissions.uoel.edu.pk/admin_asset/img/favicon/favicon-32x32.png">
    <link rel="mask-icon" href="https://admissions.uoel.edu.pk/admin_asset/img/favicon/safari-pinned-tab.svg"
        color="#5bbad5">
    <link rel="stylesheet" media="screen, print" href="https://admissions.uoel.edu.pk/admin_asset/css/fa-brands.css">
    <style>
        .others {
            display: none;
        }

        .form-group {
            margin-bottom: 0.50rem;
        }

        .p-4 {
            padding: 1rem !important;
        }
    </style>
</head>
<!-- BEGIN Body -->
<!-- Possible Classes

    * 'header-function-fixed'         - header is in a fixed at all times
    * 'nav-function-fixed'            - left panel is fixed
    * 'nav-function-minify'           - skew nav to maximize space
    * 'nav-function-hidden'           - roll mouse on edge to reveal
    * 'nav-function-top'              - relocate left pane to top
    * 'mod-main-boxed'                - encapsulates to a container
    * 'nav-mobile-push'               - content pushed on menu reveal
    * 'nav-mobile-no-overlay'         - removes mesh on menu reveal
    * 'nav-mobile-slide-out'          - content overlaps menu
    * 'mod-bigger-font'               - content fonts are bigger for readability
    * 'mod-high-contrast'             - 4.5:1 text contrast ratio
    * 'mod-color-blind'               - color vision deficiency
    * 'mod-pace-custom'               - preloader will be inside content
    * 'mod-clean-page-bg'             - adds more whitespace
    * 'mod-hide-nav-icons'            - invisible navigation icons
    * 'mod-disable-animation'         - disables css based animations
    * 'mod-hide-info-card'            - hides info card from left panel
    * 'mod-lean-subheader'            - distinguished page header
    * 'mod-nav-link'                  - clear breakdown of nav links

    >>> more settings are described inside documentation page >>>
-->

<body>
    <!-- DOC: script to save and load page settings -->
    <script>
        /**
         *  This script should be placed right after the body tag for fast execution
         *  Note: the script is written in pure javascript and does not depend on thirdparty library
         **/
        'use strict';

        var classHolder = document.getElementsByTagName("BODY")[0],
            /**
             * Load from localstorage
             **/
            themeSettings = (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) :
            {},
            themeURL = themeSettings.themeURL || '',
            themeOptions = themeSettings.themeOptions || '';
        /**
         * Load theme options
         **/
        if (themeSettings.themeOptions) {
            classHolder.className = themeSettings.themeOptions;
            console.log("%c✔ Theme settings loaded", "color: #148f32");
        } else {
            console.log("%c✔ Heads up! Theme settings is empty or does not exist, loading default settings...",
                "color: #ed1c24");
        }
        if (themeSettings.themeURL && !document.getElementById('mytheme')) {
            var cssfile = document.createElement('link');
            cssfile.id = 'mytheme';
            cssfile.rel = 'stylesheet';
            cssfile.href = themeURL;
            document.getElementsByTagName('head')[0].appendChild(cssfile);

        } else if (themeSettings.themeURL && document.getElementById('mytheme')) {
            document.getElementById('mytheme').href = themeSettings.themeURL;
        }
        /**
         * Save to localstorage
         **/
        var saveSettings = function() {
            themeSettings.themeOptions = String(classHolder.className).split(/[^\w-]+/).filter(function(item) {
                return /^(nav|header|footer|mod|display)-/i.test(item);
            }).join(' ');
            if (document.getElementById('mytheme')) {
                themeSettings.themeURL = document.getElementById('mytheme').getAttribute("href");
            };
            localStorage.setItem('themeSettings', JSON.stringify(themeSettings));
        }
        /**
         * Reset settings
         **/
        var resetSettings = function() {
            localStorage.setItem("themeSettings", "");
        }
    </script>
    <style>
        .nav-function-fixed:not(.nav-function-top):not(.nav-function-hidden):not(.nav-function-minify) .page-content-wrapper {
            padding-left: 0;
        }

        .col-xl-6 {

            max-width: 100% !important;
        }

        .has-error {
            color: red;
        }
    </style>
    <div class="page-wrapper auth">
        <div class="page-inner">
            <div class="page-content-wrapper bg-transparent m-0">
                <!-- url(img/svg/pattern-1.svg)  -->
                <div class="flex-1"
                    style="background: url(https://admissions.uoel.edu.pk/admin_asset/img/svg/pattern-4.svg) no-repeat center bottom fixed; background-size: cover;">
                    <div class="container py-5 px-4 px-sm-0">
                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 ">
                                <img src="https://admissions.uoel.edu.pk/admin_asset/img/ue-logo.png"
                                    alt="University of Education" class="img img-responsive hidden-sm-down">
                                <h2 class="fs-xxl fw-500 mt-4 font-weight-bold hidden-sm-down">
                                    Account Registration
                                    <small class="h3 fw-300 mt-3 mb-5 hidden-sm-down">
                                        <strong> Contact:</strong> career@ue.edu.pk
                                    </small>
                                </h2>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 text-center">
                                <div class="card p-4 rounded-plus bg-faded">
                                    <div class="text-left">
                                        <h2 class="font-weight-bold">Sign Up</h2>
                                        <p>The University of Education - Job Portal</p>
                                    </div>
                                    <form id="js-login" method="post" action="{{ route('register') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-12 pr-1">
                                                <label class="col-xl-12 form-label text-left" for="Name">Full Name:
                                                    <span class="text-danger">*</span></label>
                                                <input type="text" id="Name" name="name" class="form-control"
                                                    value="{{ old('name') }}" required maxlength="100" minlength="2">
                                                @error('name')
                                                    <span class="mt-2 has-error ">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">

                                            <label class="col-xl-12 form-label text-left" for="Email">Email: <span
                                                    class="text-danger">*</span></label>
                                            <input type="email" name="email" id="Email"
                                                value="{{ old('email') }}" class="form-control" required
                                                maxlength="100">
                                            @error('email')
                                                <span class=" has-error ">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-6 pr-1">
                                                <label class="col-xl-12 form-label text-left" for="Phone">Mobile:
                                                    <span class="text-danger">*</span></label>
                                                <input type="text" id="Phone" name="phone"
                                                    pattern="^((\+92)|(0092))-{0,1}\d{3}-{0,1}\d{7}$|^\d{11}$|^\d{4}-\d{7}$"
                                                    value="{{ old('phone') }}" class="form-control num" required>
                                                @error('phone')
                                                    <span class="mt-2 has-error ">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-6 pr-1">
                                                <label class="col-xl-6 form-label text-left"
                                                    for="CNIC">CNIC:[without dashes] <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" id="CNIC" name="cnic"
                                                    value="{{ old('cnic') }}" class="form-control num"
                                                    maxlength="13" minlength="13" required>
                                                @error('cnic')
                                                    <span class="mt-2 has-error ">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-xl-6 form-label text-left" for="Password">Password:
                                                [Password must be minimum of 8 characters.]<span
                                                    class="text-danger">*</span></label>
                                            <input type="password" id="Password" name="password"
                                                class="form-control" maxlength="200" required>
                                            @error('password')
                                                <span class="mt-2 has-error ">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="col-xl-6 form-label text-left" for="ConfirmPassword">Confirm
                                                Password: <span class="text-danger">*</span></label>
                                            <input type="password" id="ConfirmPassword" name="password_confirmation"
                                                class="form-control" maxlength="200" required>
                                            @error('password_confirmation')
                                                <span class="mt-2 has-error ">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group demo text-left">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" name="terms" class="custom-control-input"
                                                    id="terms" required>
                                                <label class="custom-control-label" for="terms"> I agree to terms &
                                                    conditions:</label>
                                                <a href="https://ue.edu.pk/admissions/{{ date('Y') }}/"
                                                    target="_blank">click here to download</a>
                                                <div class="invalid-feedback">You must agree before proceeding</div>
                                            </div>
                                            @error('terms')
                                                <span class="mt-2 has-error ">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="row no-gutters">
                                            <div class="col-md-4 ml-auto text-right">
                                                <button id="admission_register" type="submit"
                                                    class="btn btn-block btn-primary btn-sm mt-3">Register</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="text-left font-weight-bold p-4">If you already register please <a
                                            href="{{ route('login') }}" class="font-weight-bold"
                                            title="Click here for Login">Login Here</a> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://admissions.uoel.edu.pk/admin_asset/js/vendors.bundle.js"></script>
    <script src="https://admissions.uoel.edu.pk/admin_asset/js/app.bundle.js"></script>
    <script>
        $("#js-login-btn").click(function(event) {

            // Fetch form to apply custom Bootstrap validation
            var form = $("#js-login")

            if (form[0].checkValidity() === false) {
                event.preventDefault()
                event.stopPropagation()
            }

            form.addClass('was-validated');
            // Perform ajax submit here...
        });
        $(".num").on("keypress", function(e) {
            var evt = (e) ? e : window.event;
            var charCode = (evt.keyCode) ? evt.keyCode : evt.which;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        });
    </script>
</body>
<!-- END Body -->

</html>
