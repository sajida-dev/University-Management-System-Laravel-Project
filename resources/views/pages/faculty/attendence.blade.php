@extends('layouts.app')
@section('page-name', 'Attendance')
@section('admin-main')

    <link id="vendorsbundle" rel="stylesheet" media="screen, print"
        href="https://admissions.uoel.edu.pk/admin_asset/css/vendors.bundle.css">

    <div class="row">
        <div class="col-xl-12">
            <div id="panel-12" class="card">
                <div class="card-header">
                    <h2 class="card-title">
                        Attendance
                    </h2>
                </div>
                <form action="{{ route('attendance.store') }}" method="post">
                    <div class="card-body show">
                        <div class="row mb-3 ">
                            <span class="col-sm-1"></span>
                            <label for="program_id" class="col-sm-2 col-form-label"> Program: <span
                                    class="text-danger">*</span>
                            </label>
                            <div class="col-sm-3 ">
                                <select type="text" class="form-control" name="program_id" id="program_id">

                                    <option value="">-- Select Programs --</option>
                                    @foreach ($programs as $p)
                                        <option value="{{ $p->id }}">{{ $p->name }}</option>
                                    @endforeach

                                </select>
                                <x-input-error class="mt-2 @error('program_id') has-error @enderror" :messages="$errors->get('program_id')" />
                            </div>
                            <label for="course_id" class="col-sm-2 col-form-label"> Course: <span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-3 ">
                                <select type="text" class="form-control" name="course_id" id="course_id">
                                    <option value="">-- Select Course --</option>
                                </select>
                                <x-input-error class="mt-2 @error('course_id') has-error @enderror" :messages="$errors->get('course_id')" />
                            </div>
                        </div>

                        <table id="studentTable" class="table table-bordered table-hover table-striped w-100">
                            <thead>
                                <tr>
                                    <th>Sr#</th>
                                    <th>Student Id</th>
                                    <th> Student Name </th>
                                    <th> Attendance </th>
                                </tr>
                            </thead>
                            <tbody>


                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>


        <script>
            $('#program_id').change(function() {
                let programId = $(this).val();

                if (!programId) {
                    $('#course_id').html('<option value="">Select Course</option>');
                    $('#studentTable tbody').empty();
                    return;
                }

                $.ajax({
                    url: `/program/${programId}/courses`,
                    method: 'GET',
                    success: function(response) {
                        $('#course_id').empty();

                        if (response.courses.length > 0) {
                            $('#course_id').append('<option value="">Select Course</option>');
                            response.courses.forEach(function(course) {
                                $('#course_id').append(
                                    `<option value="${course.id}">${course.name}</option>`);
                            });
                        } else {
                            $('#course_id').append('<option value="">No courses available</option>');
                        }

                        var students = response.students;
                        var tableBody = $('#studentTable tbody');
                        tableBody.empty();

                        if (students.length > 0) {
                            students.forEach(function(student) {
                                var row = '<tr>' +
                                    '<td>' + student.id + '</td>' +
                                    '<td>' + student.student_id + '</td>' +
                                    '<td>' + student.user.fname + ' ' + student.user.lname +
                                    '</td>' +
                                    '<td><input type="checkbox" name="attendance[' +
                                    student.id +
                                    ']"></td>' +
                                    '</tr>';
                                tableBody.append(row);
                            });

                        } else {

                            var row = '<tr><td colspan="3">No students available</td></tr>';
                            tableBody.append(row);
                        }
                    },
                    error: function() {
                        $('#course_id').html('<option value="">Error loading courses</option>');
                        $('#studentTable tbody').html(
                            '<tr><td colspan="3">Error loading students</td></tr>');
                    }
                });
            });


            $(document).on('change', 'input[type="checkbox"][name^="attendance"]', function() {

                let studentId = $(this).attr('name').match(/\d+/)[0];
                let courseId = $('#course_id').val();
                let isChecked = $(this).is(':checked');

                let attendanceData = {
                    student_id: studentId,
                    course_id: courseId,
                    status: isChecked ? 1 : 0,
                    _token: $('meta[name="csrf-token"]').attr('content')
                };

                $.ajax({
                    url: "/attendance",
                    method: 'POST',
                    data: attendanceData,
                    success: function(response) {
                        if (response.status === 'success') {
                            console.log('Attendance updated successfully for student ID: ' + studentId);
                        }
                    },
                    error: function() {
                        console.log('Error updating attendance for student ID: ' + studentId);
                    }
                });
            });
        </script>

    </div>

@endsection
