@extends('layouts.app')
@section('page-name', 'Update Job')
@section('admin-main')

    <link id="vendorsbundle" rel="stylesheet" media="screen, print"
        href="https://admissions.uoel.edu.pk/admin_asset/css/vendors.bundle.css">

    <div class="row">
        <div class="col-xl-12">
            <div id="panel-12" class="card">
                <div class="card-header">
                    <h2 class="card-title">
                        Update Job
                    </h2>

                </div>
                <div class="card-body show">
                    <div class="panel-content">
                        <form method="post" action="{{ route('jobs.update', $job->id) }}" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="row mb-2 ">
                                <label for="title" class="col-sm-2 col-form-label"> Title: <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10 ">
                                    <input type="text" value="{{ $job->title }}" class="form-control" name="title"
                                        id="title" maxlength="100" minlength="2">
                                    <x-input-error class="mt-2 @error('title') has-error @enderror" :messages="$errors->get('title')" />

                                </div>
                                <label for="department_id" class="col-sm-2 col-form-label"> Department: <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-4 ">
                                    <select type="text" value="{{ old('department_id') }}" class="form-control"
                                        name="department_id" id="department_id">
                                        <option value="">-- Select Department --</option>
                                        @foreach ($departments as $dep)
                                            <option value="{{ $dep->id }}"
                                                {{ $job->department_id == $dep->id ? 'selected' : '' }}>{{ $dep->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <x-input-error class="mt-2 @error('department_id') has-error @enderror"
                                        :messages="$errors->get('department_id')" />

                                </div>
                                <label for="vacancies" class="col-sm-2 col-form-label"> Vacancies#: <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-4 ">
                                    <input type="number" class="form-control" name="vacancies"
                                        value="{{ $job->vacancies }}" id="vacancies" required>
                                    <x-input-error class="mt-2 @error('vacancies') has-error @enderror" :messages="$errors->get('vacancies')" />
                                </div>
                            </div>
                            <div class="row mb-2 ">
                                <label for="salaryFrom" class="col-sm-2 col-form-label"> Min Starting: <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-4 ">
                                    <input type="text" value="{{ $job->salaryFrom }}" class="form-control"
                                        name="salaryFrom" id="salaryFrom" maxlength="100" minlength="2">
                                    <x-input-error class="mt-2 @error('salaryFrom') has-error @enderror"
                                        :messages="$errors->get('salaryFrom')" />

                                </div>
                                <label for="salaryTo" class="col-sm-2 col-form-label"> Maximum Salary#: <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-4 ">
                                    <input type="number" class="form-control" name="salaryTo" value="{{ $job->salaryTo }}"
                                        id="salaryTo" required>
                                    <x-input-error class="mt-2 @error('salaryTo') has-error @enderror" :messages="$errors->get('salaryTo')" />
                                </div>
                            </div>
                            <div class="row mb-2 ">
                                <label for="from" class="col-sm-2 col-form-label"> Posted Date: <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-4 ">
                                    <input type="date" value="{{ $job->from }}" class="form-control" name="from"
                                        id="from" maxlength="100" minlength="2">
                                    <x-input-error class="mt-2 @error('from') has-error @enderror" :messages="$errors->get('from')" />

                                </div>
                                <label for="to" class="col-sm-2 col-form-label"> Due Date#: <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-4 ">
                                    <input type="date" class="form-control" name="to" value="{{ $job->to }}"
                                        id="to" required>
                                    <x-input-error class="mt-2 @error('to') has-error @enderror" :messages="$errors->get('to')" />
                                </div>
                            </div>
                            <div class="row mb-2 ">
                                <label for="description" class="col-sm-2 col-form-label"> Description: <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10 ">
                                    <textarea class="form-control" rows="5" name="description" id="description" maxlength="100" minlength="2">{{ $job->description }}</textarea>
                                    <x-input-error class="mt-2 @error('description') has-error @enderror"
                                        :messages="$errors->get('description')" />

                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-12 text-right">
                                    <button type="submit" class="btn btn-primary">Save <span
                                            class="fa fa-save"></span></button>
                                    <a href="{{ route('admission.choose-program.create') }}" class="btn btn-info"> Next
                                        <span class="fa fa-arrow-alt-right"></span></a>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
