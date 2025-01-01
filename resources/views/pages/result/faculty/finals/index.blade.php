@extends('layouts.app')
@section('page-name', 'Finals')
@section('add_button', 'Add Finals Marks')
@section('add_button_url', route('faculty.final.create'))
@section('admin-main')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Finals</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Student Id</th>
                                    <th>Name</th>
                                    <th>Course</th>
                                    <th>Mids</th>
                                    <th>Practical</th>
                                    <th>Sessional</th>
                                    <th>Final</th>
                                    <th>GPA</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function() {
            var table = $('#myTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('faculty.final.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'student_id',
                        name: 'student_id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'course_name',
                        name: 'course_name',
                    },
                    {
                        data: 'mid_marks',
                        name: 'mid_marks'
                    },
                    {
                        data: 'practical_marks',
                        name: 'practical_marks'
                    },
                    {
                        data: 'sessional_marks',
                        name: 'sessional_marks'
                    },
                    {
                        data: 'final_marks',
                        name: 'final_marks'
                    },
                    {
                        data: 'percentage',
                        name: 'percentage'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },
                ]
            });
        });
    </script>
@endsection
