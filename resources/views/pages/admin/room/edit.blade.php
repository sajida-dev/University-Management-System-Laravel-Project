@extends('layouts.app')
@section('page-name', 'Update Room')
@section('admin-main')
    <link id="vendorsbundle" rel="stylesheet" media="screen, print"
        href="https://admissions.uoel.edu.pk/admin_asset/css/vendors.bundle.css">

    <!--== BODY INNER CONTAINER ==-->
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{ route('room.update', $room->id) }}">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Update Room</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-6">
                                <div class="form-group ">
                                    <label for="name"> Room</label>
                                    <input type="text" name="name" id="name" value="{{ $room->name }}"
                                        class="form-control">
                                    <x-input-error class="mt-2 @error('name') has-error @enderror" :messages="$errors->get('name')" />
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6">
                                <div class="form-group ">
                                    <label for="capacity">Capacity</label>
                                    <input type="text" name="capacity" id="capacity" value="{{ $room->capacity }}"
                                        class="form-control">
                                    <x-input-error class="mt-2 @error('capacity') has-error @enderror" :messages="$errors->get('capacity')" />

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-action text-right">
                        <div class="row mb-3">
                            <div class="col-sm-12 text-right">
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
