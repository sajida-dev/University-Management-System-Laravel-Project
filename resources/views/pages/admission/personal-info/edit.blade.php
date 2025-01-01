@extends('layouts.app')
@section('page-name', 'Edit Personal Details')
@section('admin-main')

    <div class="row">
        <div class="col-xl-12">
            <div id="panel-12" class="card">
                <div class="card-header">
                    <h2 class="card-title">
                        Edit Personal Detail
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
                        <form method="post" action="{{ route('admission.profile-detail.update', $personalInfo->id) }}"
                            enctype="multipart/form-data">@csrf
                            <link id="vendorsbundle" rel="stylesheet" media="screen, print"
                                href="https://admissions.uoel.edu.pk/admin_asset/css/vendors.bundle.css">

                            <div class="mb-12 text-center">
                                <img src="{{ asset($personalInfo->profile) }}" class="rounded-circle profile-picture"
                                    alt="">
                                {{-- <span class="fa fa-user rounded-circle profile-picture"
                                    style="font-size: 65px; padding-top:5px; background-color:dodgerblue; color:white;"></span> --}}
                            </div>
                            <div class="row mb-2 ">
                                <label for="SubjectId" class="col-sm-2 col-form-label"> Name: <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-4 ">
                                    <input type="text" class="form-control" name="Name" id="Name" readonly
                                        value="{{ Auth::user()->fname . ' ' . Auth::user()->lname }}" maxlength="100"
                                        minlength="2" required>

                                </div>
                                <label for="UserPhone" class="col-sm-2 col-form-label"> Mobile#: <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-4 ">
                                    <input type="text" class="form-control" name="UserPhone"
                                        value="{{ Auth::user()->phone_number }}" readonly id="UserPhone" required>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="ProfilePicture" class="col-sm-2 col-form-label">Profile Picture: <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-4">
                                    <input type="hidden" name="OldProfilePicutre" value="{{ old('profile') }}">
                                    <input type="file" name="profile" value="{{ old('profile') }}" class="form-control"
                                        id="profile" accept="image/*">
                                    <x-input-error :messages="$errors->get('profile')" class="mt-2 @error('profile')
has-error
@enderror" />
                                </div>
                                <label for="blood_group_id" class="col-sm-2 col-form-label">Blood Group: <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-4">
                                    <select name="blood_group_id" value="{{ old('blood_group_id') }}" id="blood_group_id"
                                        class="form-control select2" required>
                                        <option value="">Choose Blood Group</option>
                                        @foreach ($bloodGroups as $bg)
                                            <option value="{{ $bg->id }}"
                                                @if ($bg->id == $personalInfo->blood_group_id) {{ 'selected' }} @endif
                                                {{ old('blood_group_id') == $bg->id ? 'selected' : '' }}>
                                                {{ $bg->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('blood_group_id')"
                                        class="mt-2 @error('blood_group_id')
has-error
@enderror" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="Nationality" class="col-sm-2 col-form-label">Nationality: <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-4">
                                    <input type="text" value="Pakistan" class="form-control" readonly="readonly">
                                    <input type="hidden" id="Nationality" name="Nationality" value="1"
                                        class="form-control" readonly="readonly">
                                </div>
                                <label for="CNIC" class="col-sm-2 col-form-label cnic">CNIC:
                                    <a href="#" data-toggle="tooltip"
                                        title=" You have applied. Now you are not able to edit this field now!  "><i
                                            class="fa fa-exclamation-circle"></i></a>
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-sm-4 cnic">
                                    <input type="text" name="cnic" class="form-control num" id="CNIC"
                                        required="required" value="{{ Auth::user()->cnic }}" readonly maxlength="13"
                                        minlength="13">
                                </div>
                                <label for="DOB" class="col-sm-2 col-form-label passport">Passport:
                                    <a href="#" data-toggle="tooltip"
                                        title=" You have applied. Now you are not able to edit this field now!  ">
                                        <i class="fa fa-exclamation-circle"></i></a>
                                    <span class="text-danger">*</span></label>
                                <div class="col-sm-4 passport">
                                    <input type="text" name="Passport" class="form-control" id="Passport"
                                        required="required" value="" readonly maxlength="9" minlength="9">
                                </div>

                            </div>
                    </div>
                    <div class="row mb-3">
                        <label for="marital_status" class="col-sm-2 col-form-label">Marital Status: <span
                                class="text-danger">*</span></label>
                        <div class="col-sm-4">
                            <select name="marital_status" value="{{ old('marital_status') }}" id="marital_status"
                                class="form-control select2" required>
                                <option value="">-- Choose Marital Status --</option>
                                <option value="1" {{ old('marital_status') == '1' ? 'selected' : '' }}
                                    @if ('1' == $personalInfo->marital_status) {{ 'selected' }} @endif>
                                    Married
                                </option>
                                <option value="0" {{ old('marital_status') == '0' ? 'selected' : '' }}
                                    @if ('0' == $personalInfo->marital_status) {{ 'selected' }} @endif>Un
                                    Married
                                </option>
                            </select>
                            <x-input-error :messages="$errors->get('marital_status')" class="mt-2 @error('marital_status')
has-error
@enderror" />
                        </div>
                        <label for="date_of_birth" class="col-sm-2 col-form-label">Date of Birth: <span
                                class="text-danger">*</span></label>
                        <div class="col-sm-4">
                            <input type="date" name="date_of_birth" class="form-control" id="date_of_birth"
                                required="required" value="{{ $personalInfo->date_of_birth }}">
                            <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2 @error('date_of_birth')
has-error
@enderror" />
                        </div>
                    </div>
                    <div class="row mb-3">

                        <label for="relgion_id" class="col-sm-2 col-form-label">Religion: <span
                                class="text-danger">*</span></label>
                        <div class="col-sm-4">
                            <select name="relgion_id" value="{{ old('relgion_id') }}" id="relgion_id"
                                class="form-control select2" required>
                                <option value="">-- Choose Religion --</option>
                                @foreach ($religions as $r)
                                    <option value="{{ $r->id }}"
                                        @if ($r->id == $personalInfo->relgion_id) {{ 'selected' }} @endif
                                        {{ old('relgion_id') == $r->id ? 'selected' : '' }}>{{ $r->name }}
                                    </option>
                                @endforeach

                            </select>
                            <x-input-error :messages="$errors->get('relgion_id')" class="mt-2 @error('relgion_id')
has-error
@enderror" />
                        </div>
                        <label for="UserEmail" class="col-sm-2 col-form-label"> Email: <span
                                class="text-danger">*</span></label>
                        <div class="col-sm-4">
                            <input type="email" class="form-control" name="UserEmail" readonly id="UserEmail"
                                value="{{ Auth::user()->email }}" required>
                        </div>
                    </div>
                    <div class="row mb-3">

                        <label for="gender_id" class="col-sm-2 col-form-label">Gender: <span
                                class="text-danger">*</span></label>
                        <div class="col-sm-4">
                            <select name="gender_id" value="{{ old('gender_id') }}" id="gender_id"
                                class="form-control select2">
                                <option value="">-- Choose Gender --</option>
                                @foreach ($genders as $g)
                                    <option value="{{ $g->id }}"
                                        @if ($g->id == $personalInfo->gender_id) {{ 'selected' }} @endif
                                        {{ old('gender_id') == $g->id ? 'selected' : '' }}>
                                        {{ $g->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('gender_id')" class="mt-2 @error('gender_id')
has-error
@enderror" />
                        </div>
                        <label for="is_disability" class="col-sm-2 col-form-label"> Is Disability:
                            <a href="#" data-toggle="tooltip"
                                title="Please enter Land line number without dashes. "><i
                                    class="fa fa-exclamation-circle"></i></a> </label>
                        <div class="col-sm-4">
                            <select type="text" class="form-control num" name="is_disability" autocomplete="off"
                                id="Phone" maxlength="11">
                                <option value="">-- Select Is Disabled --</option>
                                <option value="1" {{ old('is_disability') == '1' ? 'selected' : '' }}
                                    @if ($personalInfo->is_disability == '1') {{ 'selected' }} @endif>Yes
                                </option>
                                <option value="0" {{ old('is_disability') == '0' ? 'selected' : '' }}
                                    @if ($personalInfo->is_disability == '0') {{ 'selected' }} @endif>No
                                </option>
                            </select>
                            <x-input-error :messages="$errors->get('is_disability')" class="mt-2 @error('is_disability')
has-error
@enderror" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="father_name" class="col-sm-2 col-form-label"> Father's Name: <span
                                class="text-danger">*</span></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="father_name" id="father_name"
                                value="{{ $personalInfo->father_name }}" required maxlength="100" minlength="2">
                            <x-input-error :messages="$errors->get('father_name')" class="mt-2 @error('father_name')
has-error
@enderror" />
                        </div>
                        <label for="father_cnic" class="col-sm-2 col-form-label"> Father's CNIC:
                            <a href="#" data-toggle="tooltip"
                                title=" You have applied. Now you are not able to edit this field now!  "><i
                                    class="fa fa-exclamation-circle"></i></a> <span class="text-danger">*</span></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control num" name="father_cnic" id="father_cnic"
                                required="required" value="{{ $personalInfo->father_cnic }}" maxlength="13"
                                minlength="13">
                            <x-input-error :messages="$errors->get('father_cnic')" class="mt-2 @error('father_cnic')
has-error
@enderror" />
                        </div>
                    </div>
                    <div class="row mb-3 ">
                        <label for="is_father_alive" class="col-sm-2 col-form-label"> Is Father Alive ? <span
                                class="text-danger">*</span></label>
                        <div class="col-sm-4">
                            <select name="is_father_alive" value="{{ old('is_father_alive') }}" id="is_father_alive"
                                class="form-control select2">
                                <option value="1" {{ old('is_father_alive') == '1' ? 'selected' : '' }}
                                    @if ($personalInfo->is_father_alive == '1') {{ 'selected' }} @endif>Yes
                                </option>
                                <option value="0" {{ old('is_father_alive') == '1' ? 'selected' : '' }}
                                    @if ($personalInfo->is_father_alive == '0') {{ 'selected' }} @endif>No
                                </option>
                            </select>
                            <x-input-error :messages="$errors->get('is_father_alive')" class="mt-2 @error('is_father_alive')
has-error
@enderror" />
                        </div>

                        <label for="father_phone_number" class="col-sm-2 col-form-label father"> Father's Mobile#:
                            <a href="#" data-toggle="tooltip"
                                title="Please enter cell number/phone number without dashes. "><i
                                    class="fa fa-exclamation-circle"></i></a>
                            <span class="text-danger">*</span></label>
                        <div class="col-sm-4 father">
                            <input type="text" class="form-control num" name="father_phone_number"
                                id="father_phone_number" value=" {{ $personalInfo->father_phone_number }} " required
                                maxlength="11">
                            <x-input-error :messages="$errors->get('father_phone_number')"
                                class="mt-2 @error('father_phone_number')
has-error
@enderror" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="is_old_student" class="col-sm-2 col-form-label text-danger"> Old Student of
                            UE?: <a href="#" data-toggle="tooltip"
                                title="If you are old students. Registration fee will be less in your total fee. "><i
                                    class="fa fa-exclamation-circle"></i></a> </label>
                        <div class="col-sm-4">
                            <select name="is_old_student" onchange="handleOldStudent()" id="OldStudent"
                                class="form-control select2">
                                <option value="">-- Select Is Old Student --</option>
                                <option value="1" {{ old('is_old_student') == '1' ? 'selected' : '' }}
                                    @if ($personalInfo->is_old_student == '1') {{ 'selected' }} @endif>Yes
                                </option>
                                <option value="2" {{ old('is_old_student') == '1' ? 'selected' : '' }}
                                    @if ($personalInfo->is_old_student == '0') {{ 'selected' }} @endif>No
                                </option>
                            </select>
                            <x-input-error :messages="$errors->get('is_old_student')" class="mt-2 @error('is_old_student')
has-error
@enderror" />
                        </div>
                        <label for="registration_no" class="col-sm-2 col-form-label old-student-registration"
                            style="display: none;">
                            Registration#:
                            <a href="#" data-toggle="tooltip"
                                title="Please enter the old registration number of UE. "><i
                                    class="fa fa-exclamation-circle"></i></a>
                            <span class="text-danger">*</span></label>
                        <div class="col-sm-4 old-student-registration" style="display: none;">
                            <input type="text" class="form-control" name="registration_no" id="registration_no"
                                value="{{ $personalInfo->registration_no }}">
                            <x-input-error :messages="$errors->get('registration_no')" class="mt-2 @error('registration_no')
has-error
@enderror" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12 text-right">
                            <button type="submit" class="btn btn-primary personalDetail"> Save <span
                                    class="fa fa-save"></span></button>

                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        function handleOldStudent() {
            var oldStudent = document.getElementById('OldStudent');
            var oldRegistrationNo = document.getElementsByClassName('old-student-registration');
            if (oldStudent.value == '1') {
                for (let index = 0; index < oldRegistrationNo.length; index++) {
                    oldRegistrationNo[index].style.display = "";
                }
                //oldRegistrationNo.style.display = "";
            } else {
                //oldRegistrationNo.style.display = "none";
                for (let index = 0; index < oldRegistrationNo.length; index++) {
                    oldRegistrationNo[index].style.display = "none";
                }
            }
        }
    </script>
@endsection
