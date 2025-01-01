@extends('layouts.app')
@section('page-name', 'Choose Program')
@section('admin-main')

    <div class="row">
        <div class="col-xl-12">
            <div id="panel-12" class="card">
                <div class="card-header">
                    <h2 class="card-title">
                        Choose Program
                    </h2>
                </div>
                <div class="card-body show">

                    <div class="panel-content">
                        <form method="post" action="{{ route('admission.choose-program.store') }}"
                            enctype="multipart/form-data">@csrf
                            <div class="row mb-3">
                                <label for="program_level_id" class="col-sm-2 col-form-label"> Program Level: <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <select name="program_level_id" id="program_level_id"
                                        class="form-control form-select select2">
                                        <option value="">Choose Program Level</option>
                                        @foreach ($programLevels as $pl)
                                            <option value="{{ $pl->id }}"
                                                {{ old('program_level_id') == $pl->id ? 'selected' : '' }}>
                                                {{ $pl->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('program_level_id')"
                                        class="mt-2 @error('program_level_id')
has-error
@enderror" />
                                </div>
                            </div>
                            <div class="row mb-3 programs-for-ms" style="display: none;">
                                <label for="program_id" class="col-sm-2 col-form-label"> Select Program: <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <select name="program_id" id="program_id" class="form-select form-control select2"
                                        required>
                                        <option value="">Choose Programs</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('program_id')"
                                        class="mt-2 @error('program_id')
has-error
@enderror" />
                                </div>
                            </div>
                            <div class="row mb-3 m-0">
                                <label for="Instructions" class="col-sm-1 col-form-label"> </label>
                                <div class="col-sm-10">
                                    <h3 class="text-dark">Instructions:</h3>
                                    <p style="text-align: justify;">
                                        Once you have submitted your admission application(s), you can only update/change
                                        selected data of
                                        your academic qualifications. However, to change academic qualification data before
                                        submission, you
                                        can remove the qualification and add it again with correct data.
                                    </p>
                                    <h3 class="text-danger">Important Note for candidates applying in BS (4 years) program:
                                    </h3>
                                    <ol>
                                        <li>1st year passed candidates of <strong> FA/FSC or equivalent </strong>and 2nd
                                            year passed
                                            candidates of<strong> DAE </strong>are also eligible to apply for admission in
                                            <strong>BS(4
                                                years) </strong>programs.
                                        </li>
                                        <li>The final year result awaited candidates of <strong>FA/FSC or equivalent
                                            </strong>are required
                                            to enter 1st year marks (i.e. obtained marks/Total marks) and candidates of
                                            <strong>DAE</strong>
                                            are required to enter 2nd years marks (i.e., obtained marks/Total marks).
                                        </li>
                                        <li>The candidates with complete results of<strong> FA/FSC/DAE or
                                                equivalent</strong> will enter
                                            their complete result.</li>
                                        <li> The candidates whose any paper of 1st year/2nd year of<strong> FA/FSC/DAE or
                                                equivalent</strong> is failed, are not eligible for admission.</li>
                                        <li> The admission of result awaited candidates will be provisional until they pass
                                            their complete
                                            examination in <strong>Annual 2024</strong>.</li>
                                        <li> The provisionally admitted candidates, if fail in <strong>Annual 2024
                                                examination</strong>,
                                            their admission will be cancelled and deposited fee shall be considered
                                            consumed.</li>
                                    </ol>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-10 text-right">
                                    <button type="submit" class="btn btn-primary"> Next <span
                                            class="fa fa-arrow-alt-right"></span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#program_level_id').on('change', function() {
                var level = $(this).val();

                if (level) {
                    $.ajax({
                        url: "{{ url('/get-programs') }}/" + level,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#program_id').empty(); // Clear the previous options

                            $('#program_id').append(
                                '<option value="">Choose Programs</option>');

                            $.each(data, function(key, value) {
                                $('#program_id').append('<option value="' + value
                                    .id + '">' + value.name + '</option>');
                            });

                            $('.programs-for-ms').show(); // Show the program selection dropdown
                        },
                        error: function(xhr, status, error) {
                            console.error("An error occurred: " +
                                error); // Debugging: Log errors to the console
                            // Optionally, you can handle errors here, like showing an alert or message to the user.
                        }
                    });
                } else {
                    $('#program_id').empty();
                    $('#program_id').append('<option value="">Choose Programs</option>');
                    $('.programs-for-ms')
                        .hide(); // Hide the program selection dropdown if no program level is selected
                }
            });
        });
    </script>
@endsection
