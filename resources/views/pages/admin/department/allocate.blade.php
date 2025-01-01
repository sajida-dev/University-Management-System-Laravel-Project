@extends('layouts.app')
@section('page-name', 'Allocate Department Head')
@section('admin-main')

    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

    <!--== BODY INNER CONTAINER ==-->
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{ route('departments.allocate.store') }}">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Allocate Department Head</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-9">
                                <div class="form-group ">
                                    <label for="department_id">Department</label>
                                    <select name="department_id" id="department_id" onchange="handleDepHead(event)"
                                        class="form-control">
                                        <option value="">Select Department</option>
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}">{{ $department->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <x-input-error class="mt-2 @error('department_id') has-error @enderror"
                                        :messages="$errors->get('department_id')" />
                                </div>
                                <div class="form-group ">
                                    <label for="faculity_id">Department Head</label>
                                    <select name="faculity_id" id="faculity_id" value="{{ old('faculity_id') }}"
                                        class="form-control">
                                        <option value="">Select Department Head</option>

                                    </select>
                                    <x-input-error class="mt-2 @error('faculity_id') has-error @enderror"
                                        :messages="$errors->get('faculity_id')" />
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-action">
                        <button class="btn btn-success">Submit</button>
                        {{-- <button class="btn btn-danger">Cancel</button> --}}
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        // $(function() {
        //     $('#department').change(function() {
        //         console.log("Anonymous function: Department changed");
        //     });
        // });
        // document.getElementById('department').addEventListener('change', function() {
        //     console.log('Department changed (plain JS)');
        // });

        function handleDepHead(e) {
            var departmentId = e.target.value;
            if (departmentId) {
                $.ajax({
                    url: '/department/get-faculty/' + departmentId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {

                        $('#faculity_id').empty();
                        $('#faculity_id').append(
                            '<option value="">Select Department Head</option>');

                        $.each(data, function(key, value) {
                            $('#faculity_id').append('<option value="' + value.id +
                                '">' + value.user.fname + ' ' + value.user.lname + '</option>');
                        });
                    }
                });
            } else {
                $('#faculity_id').empty();
                $('#faculity_id').append('<option value="">Select Department Head</option>');
            }
        }
    </script>
@endsection
