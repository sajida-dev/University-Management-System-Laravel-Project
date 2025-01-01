@extends('layouts.app')
@section('page-name', 'Result')
@section('admin-main')

    <link id="vendorsbundle" rel="stylesheet" media="screen, print"
        href="https://admissions.uoel.edu.pk/admin_asset/css/vendors.bundle.css">

    <div class="row">
        <div class="col-xl-12">
            <div id="panel-12" class="card">
                <div class="card-header">
                    <h2 class="card-title">
                        Result
                    </h2>
                </div>
                <form action="{{ route('faculty.final.update', $result->id) }}" method="post">@csrf

                    <div class="card-body show">
                        <div class="row mb-3 ">
                            <span class="col-sm-1"></span>
                            <label for="program_id" class="col-sm-2 col-form-label"> Student Id :
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-3 m-2">
                                {{ $result->student->student_id }}
                                <input type="hidden" name="student_id" value="{{ $result->student->student_id }}">
                            </div>
                            <label for="course_id" class="col-sm-2 col-form-label"> Student Name:
                                <span class="text-danger">*</span></label>
                            <div class="col-sm-3  m-2">
                                {{ $result->student->user->fname . $result->student->user->lname }}
                            </div>
                        </div>
                        <div class="row mb-3 ">
                            <span class="col-sm-1"></span>
                            <label for="mid_marks" class="col-sm-2 col-form-label"> Mids: <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-3 ">
                                <input type="text" class="form-control" name="mid_marks"
                                    value="{{ $result->mid_marks }}">
                                <x-input-error class="mt-2 @error('mid_marks') has-error @enderror" :messages="$errors->get('mid_marks')" />
                            </div>
                            <label for="final_marks" class="col-sm-2 col-form-label"> Finals <span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-3 ">
                                <input type="text" class="form-control" name="final_marks"
                                    value="{{ $result->final_marks }}">
                                <x-input-error class="mt-2 @error('final_marks') has-error @enderror" :messages="$errors->get('final_marks')" />
                            </div>
                        </div>
                        <div class="row mb-3 ">
                            <span class="col-sm-1"></span>
                            <label for="practical_marks" class="col-sm-2 col-form-label"> Practical: <span
                                    class="text-danger">*</span>
                            </label>
                            <div class="col-sm-3 ">
                                <input type="text" class="form-control" name="practical_marks"
                                    value="{{ $result->practical_marks }}">
                                <x-input-error class="mt-2 @error('practical_marks') has-error @enderror"
                                    :messages="$errors->get('practical_marks')" />
                            </div>
                            <label for="sessional_marks" class="col-sm-2 col-form-label"> Sessionals <span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-3 ">
                                <input type="text" class="form-control" name="sessional_marks"
                                    value="{{ $result->sessional_marks }}">
                                <x-input-error class="mt-2 @error('sessional_marks') has-error @enderror"
                                    :messages="$errors->get('sessional_marks')" />
                            </div>
                        </div>
                    </div>
                    <div class="card-action text-right">
                        <div class="row mb-3">
                            <div class="col-sm-10 text-right">
                                <button type="submit" class="btn btn-primary">Update <span
                                        class="fa fa-save"></span></button>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
