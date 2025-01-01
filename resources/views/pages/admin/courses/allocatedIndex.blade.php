@extends('layouts.app')
@section('page-name', 'Allocated Course')
@section('add_button_url', route('course.allocate.create'))
@section('add_button', 'Allocate new Course')

@section('admin-main')
    </script>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">All Courses</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Course name</th>
                                    <th>Course Code</th>
                                    <th>Course Type</th>
                                    <th>Credits</th>
                                    <th>Program</th>
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
                ajax: "{{ route('course.allocate.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'course_code',
                        name: 'course_code'
                    },
                    {
                        data: 'course_type',
                        name: 'course_type'
                    },
                    {
                        data: 'credits',
                        name: 'credits'
                    },
                    {
                        data: 'program_name',
                        name: 'program_name'
                    },
                ]
            });
        });
    </script>
@endsection
