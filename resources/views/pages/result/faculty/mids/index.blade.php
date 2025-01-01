@extends('layouts.app')
@section('page-name', 'Mids')
@section('add_button', 'Add Mids Marks')
@section('add_button_url', route('faculty.mids.create'))
@section('admin-main')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Mids</h4>
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
                ajax: "{{ route('faculty.mids.index') }}",
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
                        data: 'action',
                        name: 'action'
                    },
                ]
            });
        });
    </script>
@endsection
