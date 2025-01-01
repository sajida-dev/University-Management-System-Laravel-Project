<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>
        Login - Student Portal
    </title>
    <meta name="description" content="University of Education, Student Portal Login here">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
    <!-- Call App Mode on ios devices -->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no">
    {{-- jquery link --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- base css -->
    <link id="vendorsbundle" rel="stylesheet" media="screen, print"
        href="https://students.uoel.edu.pk/admin_asset/css/vendors.bundle.css">
    <link id="appbundle" rel="stylesheet" media="screen, print"
        href="https://students.uoel.edu.pk/admin_asset/css/app.bundle.css">
    <link id="mytheme" rel="stylesheet" media="screen, print" href="#">
    <link id="myskin" rel="stylesheet" media="screen, print"
        href="https://students.uoel.edu.pk/admin_asset/css/skins/skin-master.css">

    <!-- Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" sizes="180x180" href="https://students.uoel.edu.pk/admin_asset/img/ue-logo.png">
    <link rel="icon" type="image/png" sizes="32x32"
        href="https://students.uoel.edu.pk/admin_asset/img/ue-logo.png">
    <link rel="mask-icon" href="https://students.uoel.edu.pk/admin_asset/img/ue-logo.png" color="#5bbad5">
    <link rel="stylesheet" media="screen, print" href="https://students.uoel.edu.pk/admin_asset/css/page-login-alt.css">
    <style>
        .page-logo {
            background-color: #3f415c;
        }

        .blankpage-footer a {
            color: #3f5c4a;
        }

        .blankpage-footer a:hover {
            color: black;
        }

        .page-logo img {
            width: 40px;
            height: 30px;
        }

        .has-error {
            color: red;
        }
    </style>
</head>


<body>

    <div class="blankpage-form-field">
        <div
            class="page-logo m-0 w-100 align-items-center justify-content-center rounded border-bottom-left-radius-0 border-bottom-right-radius-0 px-4">
            <a href="javascript:void(0)" class="page-logo-link press-scale-down d-flex align-items-center">
                <img src="https://students.uoel.edu.pk/admin_asset/img/ue-logo.png" alt="SmartAdmin WebApp"
                    aria-roledescription="logo">
                <span class="page-logo-text mr-1">UE - Student Portal Login Here </span>

            </a>
        </div>
        <div class="card p-4 border-top-left-radius-0 border-top-right-radius-0">

            <form method="post" action="{{ route('login') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="email">Student Id</label>
                    <input type="text" autofocus id="email" value="{{ old('email') }}" name="email"
                        class="form-control" autocomplete="email" required="required">

                    <span class="help-block @error('email') has-error @enderror">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span><br>


                </div>
                <div class="form-group">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" autofocus autocomplete="password" value="{{ old('password') }}"
                        id="password" name="password" class="form-control" required="required">
                    <span class="help-block">
                        Your password
                    </span><br>
                    <x-input-error class="mt-2 @error('password') has-error @enderror" :messages="$errors->get('password')" />
                </div>
                <center><button type="submit" name="submit" class="btn btn-primary"> Login </button>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="btn btn-warning float-right">
                            <strong>
                                Recover Password
                            </strong>
                        </a>
                    @endif
                </center><br>
            </form>
        </div>

    </div>
    <video poster="https://students.uoel.edu.pk/admin_asset/img/backgrounds/clouds.png" id="bgvid" playsinline
        autoplay muted loop>
        <source src="https://students.uoel.edu.pk/admin_asset/media/video/cc.webm" type="video/webm">
        <source src="https://students.uoel.edu.pk/admin_asset/media/video/cc.mp4" type="video/mp4">
    </video>

    <p id="js-color-profile" class="d-none">
        <span class="color-primary-50"></span>
        <span class="color-primary-100"></span>
        <span class="color-primary-200"></span>
        <span class="color-primary-300"></span>
        <span class="color-primary-400"></span>
        <span class="color-primary-500"></span>
        <span class="color-primary-600"></span>
        <span class="color-primary-700"></span>
        <span class="color-primary-800"></span>
        <span class="color-primary-900"></span>
        <span class="color-info-50"></span>
        <span class="color-info-100"></span>
        <span class="color-info-200"></span>
        <span class="color-info-300"></span>
        <span class="color-info-400"></span>
        <span class="color-info-500"></span>
        <span class="color-info-600"></span>
        <span class="color-info-700"></span>
        <span class="color-info-800"></span>
        <span class="color-info-900"></span>
        <span class="color-danger-50"></span>
        <span class="color-danger-100"></span>
        <span class="color-danger-200"></span>
        <span class="color-danger-300"></span>
        <span class="color-danger-400"></span>
        <span class="color-danger-500"></span>
        <span class="color-danger-600"></span>
        <span class="color-danger-700"></span>
        <span class="color-danger-800"></span>
        <span class="color-danger-900"></span>
        <span class="color-warning-50"></span>
        <span class="color-warning-100"></span>
        <span class="color-warning-200"></span>
        <span class="color-warning-300"></span>
        <span class="color-warning-400"></span>
        <span class="color-warning-500"></span>
        <span class="color-warning-600"></span>
        <span class="color-warning-700"></span>
        <span class="color-warning-800"></span>
        <span class="color-warning-900"></span>
        <span class="color-success-50"></span>
        <span class="color-success-100"></span>
        <span class="color-success-200"></span>
        <span class="color-success-300"></span>
        <span class="color-success-400"></span>
        <span class="color-success-500"></span>
        <span class="color-success-600"></span>
        <span class="color-success-700"></span>
        <span class="color-success-800"></span>
        <span class="color-success-900"></span>
        <span class="color-fusion-50"></span>
        <span class="color-fusion-100"></span>
        <span class="color-fusion-200"></span>
        <span class="color-fusion-300"></span>
        <span class="color-fusion-400"></span>
        <span class="color-fusion-500"></span>
        <span class="color-fusion-600"></span>
        <span class="color-fusion-700"></span>
        <span class="color-fusion-800"></span>
        <span class="color-fusion-900"></span>
    </p>

    <script src="https://students.uoel.edu.pk/admin_asset/js/vendors.bundle.js"></script>
    <script src="https://students.uoel.edu.pk/admin_asset/js/app.bundle.js"></script>
    <!-- Page related scripts -->
</body>
<!-- END Body -->

</html>
