@extends('layouts.app')
@section('page-name', 'Update Course')
@section('admin-main')
    <link id="vendorsbundle" rel="stylesheet" media="screen, print"
        href="https://admissions.uoel.edu.pk/admin_asset/css/vendors.bundle.css">

    <!--== BODY INNER CONTAINER ==-->
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{ route('course.update', $course->id) }}">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Update Course</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-9">
                                <div class="form-group ">
                                    <label for="name">Course</label>
                                    <input type="text" name="name" id="name" value="{{ $course->name }}"
                                        class="form-control" />
                                    <x-input-error class="mt-2 @error('name') has-error @enderror" :messages="$errors->get('name')" />
                                </div>
                                <div class="form-group ">
                                    <label for="course_code">Course Code</label>
                                    <input type="text" name="course_code" id="course_code"
                                        value="{{ $course->course_code }}" class="form-control" />
                                    <x-input-error class="mt-2 @error('course_code') has-error @enderror"
                                        :messages="$errors->get('course_code')" />
                                </div>
                                <div class="form-group ">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" id="description" rows="5">{{ $course->description }}</textarea>
                                    <x-input-error class="mt-2 @error('description') has-error @enderror"
                                        :messages="$errors->get('description')" />
                                </div>
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
                </div>
            </form>
        </div>
    </div>
@endsection
