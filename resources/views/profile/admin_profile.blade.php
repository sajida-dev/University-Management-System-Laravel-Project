@extends('layouts.app')
@section('page-name', 'Edit Personal Details')
@section('admin-main')

    <div class="row">
        <div class="col-xl-12">
            <div id="panel-12" class="card">
                <div class="card-header">
                    <h2 class="card-title">
                        Personal Info
                    </h2>
                </div>
                <div class="card-body  show">
                    <div class="panel-content">
                        <style>
                            .profile-picture {
                                width: 90px;
                                margin: 0 auto;
                                position: relative;
                                bottom: 50px;
                                ;
                                border: 3px solid dodgerblue;
                                height: 87px;
                            }
                        </style>
                        <form method="post" action="" enctype="multipart/form-data">@csrf
                            <link id="vendorsbundle" rel="stylesheet" media="screen, print"
                                href="https://admissions.uoel.edu.pk/admin_asset/css/vendors.bundle.css">

                            <div class="mb-12 text-center">
                                {{-- <img src="{{ asset($user->personalInfo->profile) }}" class="rounded-circle profile-picture"
                                    alt=""> --}}
                                <span class="fa fa-user rounded-circle profile-picture"
                                    style="font-size: 65px; padding-top:5px; background-color:dodgerblue; color:white;"></span>
                            </div>
                            <div class="row mb-2 ">
                                <label for="SubjectId" class="col-sm-2 col-form-label"> Name: <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-4 ">
                                    <input type="text" class="form-control" name="Name" id="Name"
                                        value="{{ Auth::user()->fname . ' ' . Auth::user()->lname }}" maxlength="100"
                                        minlength="2" required>

                                </div>
                                <label for="UserPhone" class="col-sm-2 col-form-label"> Mobile#: <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-4 ">
                                    <input type="text" class="form-control" name="UserPhone"
                                        value="{{ Auth::user()->phone_number }}" id="UserPhone" required>

                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="Nationality" class="col-sm-2 col-form-label">Nationality: <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-4">
                                    <input type="text" value="Pakistan" class="form-control"="">

                                </div>
                                <label for="CNIC" class="col-sm-2 col-form-label cnic">CNIC:
                                    <a href="#" data-toggle="tooltip"
                                        title=" You have applied. Now you are not able to edit this field now!  "><i
                                            class="fa fa-exclamation-circle"></i></a>
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-sm-4 cnic">
                                    <input type="text" name="cnic" class="form-control num" id="CNIC"
                                        required="required" value="{{ Auth::user()->cnic }}" maxlength="13" minlength="13">
                                </div>


                            </div>
                    </div>

                    <div class="row mb-3">
                        <label for="UserEmail" class="col-sm-2 col-form-label"> Email: <span
                                class="text-danger">*</span></label>
                        <div class="col-sm-4">
                            <input type="email" class="form-control" name="UserEmail" id="UserEmail"
                                value="{{ Auth::user()->email }}" required>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
