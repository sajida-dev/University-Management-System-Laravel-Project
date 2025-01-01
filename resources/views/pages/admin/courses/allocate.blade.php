@extends('layouts.app')
@section('page-name', 'Allocate Courses')
@section('admin-main')
    <link id="vendorsbundle" rel="stylesheet" media="screen, print"
        href="https://admissions.uoel.edu.pk/admin_asset/css/vendors.bundle.css">

    <!--== BODY INNER CONTAINER ==-->
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{ route('course.allocate.store') }}">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Allocate Courses</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-6">
                                <div class="form-group ">
                                    <label for="course_id">Course </label>
                                    <select type="text" name="course_id" id="course_id" class="form-control">
                                        <option value="">Select Course </option>
                                        @foreach ($courses as $c)
                                            <option value="{{ $c->id }}"
                                                {{ old('course_id') == $c->id ? 'selected' : '' }}>
                                                {{ $c->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error class="mt-2 @error('course_type_id') has-error @enderror"
                                        :messages="$errors->get('course_type_id')" />
                                </div>
                                <div class="form-group ">
                                    <label for="program_id">Program </label>
                                    <select type="text" name="program_id" id="program_id" class="form-control">
                                        <option value="">Select Program Type</option>
                                        @foreach ($programs as $p)
                                            <option value="{{ $p->id }}"
                                                {{ old('program_id') == $p->id ? 'selected' : '' }}>
                                                {{ $p->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error class="mt-2 @error('program_id') has-error @enderror"
                                        :messages="$errors->get('program_id')" />
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6">

                                <div class="form-group ">
                                    <label for="course_type_id">Course Type</label>
                                    <select type="text" name="course_type_id" id="course_type_id" class="form-control">
                                        <option value="">Select Course Type</option>
                                        @foreach ($courseTypes as $c)
                                            <option value="{{ $c->id }}"
                                                {{ old('course_type_id') == $c->id ? 'selected' : '' }}>
                                                {{ $c->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error class="mt-2 @error('course_type_id') has-error @enderror"
                                        :messages="$errors->get('course_type_id')" />
                                </div>
                                <div class="form-group ">
                                    <label for="semester">Semester </label>
                                    <select name="semester" id="semester" class="form-control">
                                        <option value="">Select Semester</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                    </select>
                                    <x-input-error class="mt-2 @error('semester') has-error @enderror" :messages="$errors->get('semester')" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action text-right">
                        <div class="row mb-3">
                            <div class="col-sm-10 text-right">
                                <button type="submit" class="btn btn-primary">Save <span
                                        class="fa fa-save"></span></button>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
