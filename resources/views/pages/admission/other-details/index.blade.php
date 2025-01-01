@extends('layouts.app')
@section('page-name', 'Other Details')
@section('admin-main')



    <script src="https://admissions.uoel.edu.pk/admin_asset/js/formplugins/select2/select2.bundle.js"></script>
    <script>
        $(document).ready(function() {
            $(function() {
                $('.select2').select2();

            });
        });
    </script>

    <div class="row">
        <div class="col-xl-12">
            <div id="panel-12" class="card">
                <div class="card-header">
                    <h2 class="card-title">
                        Add Other Detail
                    </h2>

                </div>
                <div class="card-body show">
                    <div class="panel-content">
                        <form method="post" action="{{ route('admission.other-detail.store') }}"
                            enctype="multipart/form-data">@csrf
                            <div class="row mb-3">
                                <label for="Vaccinated" class="col-sm-2 col-form-label"> Vaccinated: <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <select name="Vaccinated" id="Vaccinated" class="form-control select2" required>
                                        <option value="">Choose Status</option>
                                        <option value="1">Yes</option>
                                        <option selected value="0">No</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('Vaccinated')"
                                        class="mt-2 @error('Vaccinated')
has-error
@enderror" />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="Transport" class="col-sm-2 col-form-label"> Transport Required: <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <select name="Transport" id="Transport" class="form-control select2" required>
                                        <option value="">Choose Transport Required</option>
                                        <option value="1">Yes</option>
                                        <option selected value="0">No</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('Transport')" class="mt-2 @error('Transport')
has-error
@enderror" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="Hostel" class="col-sm-2 col-form-label"> Hostel Required: <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <select name="Hostel" id="Hostel" class="form-control select2" required>
                                        <option value="">Choose Hostel Required</option>
                                        <option value="1">Yes</option>
                                        <option selected value="0">No</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('Hostel')" class="mt-2 @error('Hostel')
has-error
@enderror" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-10 text-right">
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
