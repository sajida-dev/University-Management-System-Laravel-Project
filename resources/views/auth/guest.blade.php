<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>
        @yield('title') -- University of Education
    </title>
    <meta name="description" content="Login">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
    <!-- Call App Mode on ios devices -->
    <meta name="apple-mobile-web-app-capable" content="yes" />
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
    <link rel="stylesheet" media="screen, print"
        href="https://admissions.uoel.edu.pk/admin_asset/css/page-login-alt.css">
    <link rel="stylesheet" media="screen, print" href="https://admissions.uoel.edu.pk/admin_asset/css/fa-brands.css">
    <style type="text/css">
        .ue-text-color {
            color: #3f5c4a;
        }

        .has-error {
            color: red;
        }
    </style>
</head>

<body>
    <style>
        #modal {
            position: fixed;
            font-family: Arial, Helvetica, sans-serif;
            top: 0;
            left: 0;
            background: rgba(0, 0, 0, 0.8);
            z-index: 99999;
            height: 100%;
            width: 100%;
            overflow: auto;
        }

        .modalconent {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #fff;
            width: 80%;
            padding: 20px;
            overflow: auto;
        }

        .modalheadingone {
            text-align: center;
            color: red;
        }

        .cross {
            text-align: right;
        }

        #modalimage {
            text-align: center;
            width: 90%;
            height: auto;
            margin: 0 auto;
            font-size: 20px;
        }

        @media only screen and (max-width: 600px) {
            .modalconent {
                position: absolute;
                top: 70%;
                left: 50%;
                transform: translate(-50%, -50%);
                background: #fff;
                width: 80%;
                padding: 20px;
                overflow: auto;
            }
        }
    </style>

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
    <div class="page-wrapper auth">
        <div class="page-inner">
            <div class="page-content-wrapper bg-transparent m-0">
                <div class="flex-1"
                    style="background: url(https://admissions.uoel.edu.pk/admin_asset/img/svg/pattern-3.svg) no-repeat center bottom fixed; background-size: cover;">

                    <div class="container py-4 py-lg-5 my-lg-5 px-4 px-sm-0">
                        <div class="row">

                            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 ">
                                <img src="https://admissions.uoel.edu.pk/admin_asset/img/ue-logo.png"
                                    alt="University of Education" class="img img-responsive hidden-sm-down">
                                <h2 class="fs-xxl fw-500 mt-4 font-weight-bold hidden-sm-down">
                                    Welcome to University of Education
                                    <small class="h3 fw-300 mt-3 mb-5 hidden-sm-down">
                                        {{-- Already registered? Please Log in! <br> --}}
                                        <strong>Contact:</strong> @yield('contact')
                                    </small>
                                </h2>
                                <div class="d-sm-flex flex-column align-items-center justify-content-center d-md-block">
                                    <div class="px-0 py-1 mt-5 fs-nano ue-text-color font-weight-bold">
                                        Find us on social media
                                    </div>
                                    <div class="d-flex flex-row">
                                        <a href="https://www.facebook.com/ue.edu.pk.official/"
                                            class="mr-2 fs-xxl ue-text-color">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                        <a href="https://twitter.com/ue_edu_pk" class="mr-2 fs-xxl ue-text-color">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                        <a href="https://www.youtube.com/c/UniversityofEducation"
                                            class="mr-2 fs-xxl ue-text-color">
                                            <i class="fa fa-youtube"></i>
                                        </a>
                                        <a href="https://www.linkedin.com/school/universityofeducation/"
                                            class="mr-2 fs-xxl ue-text-color">
                                            <i class="fa fa-linkedin"></i>
                                        </a>
                                        <a href="https://www.instagram.com/ue.edu.pk/"
                                            class="mr-2 fs-xxl ue-text-color">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-5 col-xl-4 ml-auto">
                                <div class="card p-4 rounded-plus bg-faded">
                                    {{-- <div class="text-left w-50"> --}}
                                    <h2 style="margin: 10px 0 15px 0;" class="font-weight-bold left">@yield('heading')
                                    </h2>
                                    {{-- </div> --}}

                                    <form method="post" id="js-login" novalidate="" action="@yield('action')"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @yield('guest-admission')
                                        <div class="row ">
                                            <div class="col-md-12 ml-auto p-1 font-weight-bold">
                                                Don't have an account? <a href="{{ route('register') }}"
                                                    title="Click here for Password Recovery">
                                                    Click Here</a>
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
    <!-- BEGIN Color profile -->
    <!-- this area is hidden and will not be seen on screens or screen readers -->
    <!-- we use this only for CSS color refernce for JS stuff -->
    <!-- END Color profile -->
    <!-- base vendor bundle:
     DOC: if you remove pace.js from core please note on Internet Explorer some CSS animations may execute before a page is fully loaded, resulting 'jump' animations
                + pace.js (recommended)
                + jquery.js (core)
                + jquery-ui-cust.js (core)
                + popper.js (core)
                + bootstrap.js (core)
                + slimscroll.js (extension)
                + app.navigation.js (core)
                + ba-throttle-debounce.js (core)
                + waves.js (extension)
                + smartpanels.js (extension)
                + src/../jquery-snippets.js (core) -->
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
    </script>
</body>
<!-- END Body -->

</html>
