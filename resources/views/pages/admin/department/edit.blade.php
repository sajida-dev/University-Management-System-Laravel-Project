@extends('layouts.app')
@section('page-name', 'Edit Department')
@section('admin-main')
    <link id="vendorsbundle" rel="stylesheet" media="screen, print"
        href="https://admissions.uoel.edu.pk/admin_asset/css/vendors.bundle.css">

    <!--== BODY INNER CONTAINER ==-->
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{ route('departments.update', $department->id) }}">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-header">
                        <div class="card-title"> Edit Department</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-9">
                                <div class="form-group">
                                    <label for="name">Department</label>
                                    <input type="text" name="name" id="name" value="{{ $department->name }}"
                                        class="form-control" />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2 @error('name')
has-error
@enderror" />
                                </div>
                                <div class="form-group ">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" id="description" rows="5">{{ $department->description }}</textarea>
                                    <x-input-error :messages="$errors->get('description')"
                                        class="mt-2 @error('description')
has-error
@enderror" />
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
