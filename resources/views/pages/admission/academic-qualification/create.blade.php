@extends('layouts.app')
@section('page-name', 'Academic Qualification Details')
@section('admin-main')


    <link id="myskin" rel="stylesheet" media="screen, print"
        href="https://admissions.uoel.edu.pk/admin_asset/css/skins/skin-master.css">
    {{-- <link id="vendorsbundle" rel="stylesheet" media="screen, print"
        href="https://admissions.uoel.edu.pk/admin_asset/css/vendors.bundle.css"> --}}
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-12" class="card">
                <div class="card-header">
                    <h2 class="card-title">
                        Academic Detail For Enrollment
                    </h2>
                </div>
                <div class="card-body show">
                    <div class="panel-content">
                        <div class="alert alert-warning">
                            <strong>Careful!</strong> Please ensure your academic details are filled out correctly. You will
                            not be able to edit them later.
                        </div>
                        <form action="{{ route('admission.academic-details.store') }}" method="post">@csrf
                            <div class="row mb-3" data-select2-id="25">
                                <label for="degree_level" class="col-sm-3 col-form-label"> Degree Level: <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-8" data-select2-id="24">
                                    <select value="{{ old('degree_level') }}" name="degree_level" id="degree_level"
                                        onchange="handleMajorSubjects()" class="form-control ">
                                        <option value="">Choose Degree </option>
                                        @if (!in_array(1, $degree))
                                            <option value="1" {{ old('degree_level') == '1' ? 'selected' : '' }}>
                                                Matric</option>
                                        @endif
                                        @if (!in_array(2, $degree))
                                            <option value="2" {{ old('degree_level') == '2' ? 'selected' : '' }}>
                                                Intermediate</option>
                                        @endif

                                        @if ($programLevel == 3)
                                            @if (!in_array(3, $degree))
                                                <option value="3" {{ old('degree_level') == '3' ? 'selected' : '' }}>
                                                    Bachelors (BS/4years)</option>
                                            @endif
                                        @endif
                                    </select>
                                    <x-input-error class="mt-2 @error('degree_level') has-error @enderror"
                                        :messages="$errors->get('degree_level')" />
                                </div>
                            </div>

                            <div class="row mb-3 " data-select2-id="25">
                                <label for="board_or_university" class="col-sm-3 col-form-label"> Board / University: <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-8" data-select2-id="24">
                                    <select value="{{ old('board_or_university') }}" name="board_or_university"
                                        id="board_or_university" class="form-control ">


                                    </select>
                                    <x-input-error class="mt-2 @error('board_or_university') has-error @enderror"
                                        :messages="$errors->get('board_or_university')" />
                                </div>
                            </div>
                            <div class="row mb-3 ">
                                <label for="registration_no" class="col-sm-3 col-form-label"> Registration Number: <span
                                        class="text-danger">*</span> </label>
                                <div class="col-sm-3 ">
                                    <input type="text" class="form-control" value="{{ old('registration_no') }}"
                                        name="registration_no" id="registration_no" value="" required="">
                                    <x-input-error class="mt-2 @error('registration_no') has-error @enderror"
                                        :messages="$errors->get('registration_no')" />
                                </div>
                                <label for="roll_no" class="col-sm-2 col-form-label"> Roll Number: <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-3 ">
                                    <input type="text" class="form-control" value="{{ old('roll_no') }}" name="roll_no"
                                        id="roll_no" value="" required="">
                                    <x-input-error class="mt-2 @error('roll_no') has-error @enderror" :messages="$errors->get('roll_no')" />
                                </div>
                            </div>

                            <div class="row mb-2">
                                <label for="passing_year" class="col-sm-3 col-form-label"> Passing Year: <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-3 ">
                                    <select value="{{ old('passing_year') }}" name="passing_year" class="form-control">
                                        <option value="">Choose Passing Year </option>
                                        <option value="2024">2024</option>
                                        <option value="2023">2023</option>
                                        <option value="2022">2022</option>
                                        <option value="2021">2021</option>
                                        <option value="2020">2020</option>
                                        <option value="2019">2019</option>
                                        <option value="2018">2018</option>
                                        <option value="2017">2017</option>
                                        <option value="2016">2016</option>
                                        <option value="2015">2015</option>
                                        <option value="2014">2014</option>
                                        <option value="2013">2013</option>
                                        <option value="2012">2012</option>
                                        <option value="2011">2011</option>
                                        <option value="2010">2010</option>
                                        <option value="2009">2009</option>
                                        <option value="2008">2008</option>
                                        <option value="2007">2007</option>
                                        <option value="2006">2006</option>
                                        <option value="2005">2005</option>
                                        <option value="2004">2004</option>
                                        <option value="2003">2003</option>
                                        <option value="2002">2002</option>
                                        <option value="2001">2001</option>
                                        <option value="2000">2000</option>
                                    </select>
                                    <x-input-error class="mt-2 @error('passing_year') has-error @enderror"
                                        :messages="$errors->get('passing_year')" />
                                </div>
                                <label for="exam_type" class="col-sm-2 col-form-label"> Examination Type: <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-3 ">
                                    <select value="{{ old('exam_type') }}" name="exam_type" id="exam_type"
                                        class="form-control">
                                        <option value="">Choose Examination Type </option>
                                        <option value="1" {{ old('exam_type') == '1' ? 'selected' : '' }}>
                                            Annual</option>
                                        <option value="0" {{ old('exam_type') == '0' ? 'selected' : '' }}>
                                            Semester</option>
                                    </select>
                                    <x-input-error class="mt-2 @error('exam_type') has-error @enderror"
                                        :messages="$errors->get('exam_type')" />

                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="obtained_marks" class="col-sm-3 col-form-label"> Obtained <span
                                        class="marks-type">Marks</span> : <span class="text-danger">*</span></label>
                                <div class="col-sm-3 ">
                                    <input type="text" class="form-control num" value="{{ old('obtained_marks') }}"
                                        name="obtained_marks" value="" id="obtained_marks" required="">
                                    <x-input-error class="mt-2 @error('obtained_marks') has-error @enderror"
                                        :messages="$errors->get('obtained_marks')" />
                                </div>
                                <label for="total_marks" class="col-sm-2 col-form-label"> Total <span
                                        class="marks-type">Marks</span>: <span class="text-danger">*</span></label>
                                <div class="col-sm-3 ">
                                    <input type="text" class="form-control num" value="{{ old('total_marks') }}"
                                        name="total_marks" id="total_marks" value="" required="">
                                    <x-input-error class="mt-2 @error('total_marks') has-error @enderror"
                                        :messages="$errors->get('total_marks')" />
                                </div>
                            </div>
                            @php
                                // Check if any of the fields have errors
                                $hasErrors =
                                    $errors->has('degree_level') ||
                                    $errors->has('board_or_university') ||
                                    $errors->has('registration_no') ||
                                    $errors->has('roll_no') ||
                                    $errors->has('passing_year') ||
                                    $errors->has('exam_type') ||
                                    $errors->has('obtained_marks') ||
                                    $errors->has('total_marks') ||
                                    $errors->has('subject.0') ||
                                    $errors->has('obtainedMarks.0') ||
                                    $errors->has('totalMarks.0') ||
                                    $errors->has('subject.1') ||
                                    $errors->has('obtainedMarks.1') ||
                                    $errors->has('totalMarks.1') ||
                                    $errors->has('subject.2') ||
                                    $errors->has('obtainedMarks.2') ||
                                    $errors->has('totalMarks.2');
                            @endphp
                            <div class="row mb-2" id="major_subjects"
                                style="display: {{ $hasErrors ? 'block' : 'none' }}; ">

                                <div style="margin-top: 50px;" id="panel-12" class="card">
                                    <div class="card-header">
                                        <h2 class="card-title">
                                            Major Subjects
                                        </h2>
                                    </div>
                                    <div class="card-body show">
                                        <div class="panel-content">
                                            <div class="row mb-2">
                                                <label class="col-sm-4 col-form-label">Major Subject 1 : <span
                                                        class="text-danger">*</span></label>
                                                <label class="col-sm-4 col-form-label"> Obtained <span
                                                        class="marks-type">Marks</span>
                                                    : <span class="text-danger">*</span></label>
                                                <label class="col-sm-4 col-form-label"> Total <span
                                                        class="marks-type">Marks</span>:
                                                    <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-sm-4 ">
                                                    {{-- <input type="text" class="form-control num" name=""
                                                        value="{{ old('subject.0') }}"> --}}
                                                    <select name="subject[]" class="form-control num" id="">
                                                        @foreach ($subjects as $s)
                                                            <option value="{{ $s->id }}"
                                                                {{ old('subject.0') == $s->id ? 'selected' : '' }}>
                                                                {{ $s->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('subject.0')
                                                        <x-input-error :messages="$message" class="mt-2 has-error" />
                                                    @enderror
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control num" name="obtainedMarks[]"
                                                        value="{{ old('obtainedMarks.0') }}">
                                                    @error('obtainedMarks.0')
                                                        <x-input-error :messages="$message" class="mt-2 has-error" />
                                                    @enderror

                                                </div>
                                                <div class="col-sm-4 ">
                                                    <input type="number" class="form-control num" name="totalMarks[]"
                                                        value="{{ old('totalMarks.0') }}">
                                                    @error('totalMarks.0')
                                                        <x-input-error :messages="$message" class="mt-2 has-error" />
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <label class="col-sm-4 col-form-label">Major Subject 2 : <span
                                                        class="text-danger">*</span></label>
                                                <label class="col-sm-4 col-form-label"> Obtained <span
                                                        class="marks-type">Marks</span>
                                                    : <span class="text-danger">*</span></label>
                                                <label class="col-sm-4 col-form-label"> Total <span
                                                        class="marks-type">Marks</span>:
                                                    <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-sm-4 ">
                                                    <select name="subject[]" class="form-control num" id="">
                                                        @foreach ($subjects as $s)
                                                            <option value="{{ $s->id }}"
                                                                {{ old('subject.1') == $s->id ? 'selected' : '' }}>
                                                                {{ $s->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('subject.1')
                                                        <x-input-error :messages="$message" class="mt-2 has-error" />
                                                    @enderror
                                                </div>
                                                <div class="col-sm-4 ">
                                                    <input type="text" class="form-control num" name="obtainedMarks[]"
                                                        value="{{ old('obtainedMarks.1') }}">
                                                    @error('obtainedMarks.1')
                                                        <x-input-error :messages="$message" class="mt-2 has-error" />
                                                    @enderror
                                                </div>
                                                <div class="col-sm-4 ">
                                                    <input type="number" class="form-control num" name="totalMarks[]"
                                                        value="{{ old('totalMarks.1') }}">
                                                    @error('totalMarks.1')
                                                        <x-input-error :messages="$message" class="mt-2 has-error" />
                                                    @enderror

                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <label class="col-sm-4 col-form-label">Major Subject 3 : <span
                                                        class="text-danger">*</span></label>
                                                <label class="col-sm-4 col-form-label"> Obtained <span
                                                        class="marks-type">Marks</span>
                                                    : <span class="text-danger">*</span></label>
                                                <label class="col-sm-4 col-form-label"> Total <span
                                                        class="marks-type">Marks</span>:
                                                    <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-sm-4 ">
                                                    <select name="subject[]" class="form-control num" id="">
                                                        @foreach ($subjects as $s)
                                                            <option value="{{ $s->id }}"
                                                                {{ old('subject.2') == $s->id ? 'selected' : '' }}>
                                                                {{ $s->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('subject.2')
                                                        <x-input-error :messages="$message" class="mt-2 has-error" />
                                                    @enderror
                                                </div>
                                                <div class="col-sm-4 ">
                                                    <input type="text" class="form-control num" name="obtainedMarks[]"
                                                        value="{{ old('obtainedMarks.2') }}">
                                                    @error('obtainedMarks.2')
                                                        <x-input-error :messages="$message" class="mt-2 has-error" />
                                                    @enderror
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="number" class="form-control num" name="totalMarks[]"
                                                        value="{{ old('totalMarks.2') }}">
                                                    @error('totalMarks.2')
                                                        <x-input-error :messages="$message" class="mt-2 has-error" />
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class=" card-action col-sm-12 text-right">
                                    <input type="submit" class="btn btn-primary" name="add"
                                        value="Add qualification">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-12">
            <div id="panel-12" class="card">
                <div class="card-header">
                    <h2 class="card-title">
                        Academic Details
                    </h2>
                </div>
                <div class="card-body show">
                    {{-- <div class="panel-content"> --}}
                    <style>
                        .table {
                            zoom: 0.8;
                        }
                    </style>
                    <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Degree</th>
                                <th> Board/University </th>
                                <th> RegNo </th>
                                <th> RollNo </th>
                                <th> Exam Type </th>
                                <th> Year</th>
                                <th> Obt. Marks </th>
                                <th> Max. Marks</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!$academicQualification->isEmpty())
                                @foreach ($academicQualification as $a)
                                    <tr>
                                        <td>{{ $a->id }}</td>
                                        <td>
                                            @if ($a->degree_level == 1)
                                                {{ __('Matric') }}
                                            @elseif ($a->degree_level == 2)
                                                {{ __('Intermediate') }}
                                            @else
                                                {{ __('Bachelors (BS/4years)') }}
                                            @endif
                                        </td>
                                        <td> {{ $a->board_or_university }} </td>
                                        <td>{{ $a->registration_no }}</td>
                                        <td> {{ $a->roll_no }} </td>
                                        <td>
                                            @if ($a->exam_type == 1)
                                                {{ 'Annual' }}
                                            @else
                                                {{ 'Semester' }}
                                            @endif
                                        </td>
                                        <td> {{ $a->passing_year }} </td>
                                        <td> {{ $a->total_marks }}</td>
                                        <td> {{ $a->obtained_marks }} </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr style="text-align: center">
                                    <td colspan="10">No Data</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>
    <script>
        function handleMajorSubjects() {
            //
            var degree = document.getElementById('degree_level');
            var major_subject = document.getElementById('major_subjects');
            if (degree.value == "2") {
                major_subject.style.display = '';
            } else {
                major_subject.style.display = 'none';
            }
        }
        document.addEventListener('DOMContentLoaded', function() {
            var degree = document.getElementById('degree_level');
            var relatedDropdown = document.getElementById('board_or_university');

            degree.addEventListener('change', function() {
                var degreeValue = this.value;
                //relatedDropdown.innerHTML = ''; // Clear existing options

                if (degreeValue == '3') {
                    // Example of adding university options
                    relatedDropdown.innerHTML = `
                    <option value="">Select University</option>
                    @foreach ($uni as $u)
                        <option value="{{ $u->id }}" {{ old('board_or_university') == $u->id ? 'selected' : '' }}>{{ $u->name }}</option>
                    @endforeach
                `;
                } else {
                    // Example of adding board options
                    relatedDropdown.innerHTML = `
                    <option value="">Select Board</option>
                    @foreach ($board as $b)
                        <option value="{{ $b->id }}" {{ old('board_or_university') == $b->id ? 'selected' : '' }}>{{ $b->name }}</option>
                    @endforeach
                `;
                }
            });
        });
    </script>

@endsection
