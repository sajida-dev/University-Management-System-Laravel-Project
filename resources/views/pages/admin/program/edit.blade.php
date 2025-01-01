@extends('layouts.app')
@section('page-name', 'Edit Program')
@section('admin-main')
    <link id="vendorsbundle" rel="stylesheet" media="screen, print"
        href="https://admissions.uoel.edu.pk/admin_asset/css/vendors.bundle.css">

    <!--== BODY INNER CONTAINER ==-->
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{ route('program.update', $program->id) }}">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Edit Program</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-6">
                                <div class="form-group ">
                                    <label for="department_id"> Department</label>
                                    <select type="text" name="department_id" id="department_id"
                                        value="{{ old('department_id') }}" class="form-control">
                                        <option value="">Select Department</option>
                                        @foreach ($departments as $dep)
                                            <option value="{{ $dep->id }}"
                                                {{ $program->department_id == $dep->id ? 'selected' : '' }}>
                                                {{ $dep->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <x-input-error class="mt-2 @error('department_id') has-error @enderror"
                                        :messages="$errors->get('department_id')" />
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6">
                                <div class="form-group ">
                                    <label for="program_level_id"> Program Level</label>
                                    <select type="text" name="program_level_id" id="program_level_id"
                                        value="{{ old('program_level_id') }}" class="form-control">
                                        <option value="">Select Program Level</option>
                                        @foreach ($programLevels as $p)
                                            <option value="{{ $p->id }}"
                                                {{ $program->program_level_id == $p->id ? 'selected' : '' }}>
                                                {{ $p->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <x-input-error class="mt-2 @error('program_level_id') has-error @enderror"
                                        :messages="$errors->get('program_level_id')" />

                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6">
                                <div class="form-group ">
                                    <label for="name">Program name</label>
                                    <input type="text" name="name" id="name" value="{{ $program->name }}"
                                        class="form-control" />
                                    <x-input-error class="mt-2 @error('name') has-error @enderror" :messages="$errors->get('name')" />

                                </div>
                            </div>

                            <div class="col-md-12 col-lg-6">
                                <div class="form-group">
                                    <label for="total_credits">Total Credits</label>
                                    <input type="text" name="total_credits" id="total_credits"
                                        value="{{ $program->total_credits }}" class="form-control" />
                                    <x-input-error class="mt-2 @error('total_credits') has-error @enderror"
                                        :messages="$errors->get('total_credits')" />

                                </div>
                            </div>

                            <div class="col-md-12 col-lg-12">
                                <div class="form-group ">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" id="description" rows="5">{{ $program->description }}</textarea>
                                    <x-input-error class="mt-2 @error('description') has-error @enderror"
                                        :messages="$errors->get('description')" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-action text-right">
                        <div class="row mb-3">
                            <div class="col-sm-12 text-right">
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
