@extends('layouts.app')
@section('page-name', 'All Applications')
@section('admin-main')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">All Applications</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Department</th>
                                    <th>Salary</th>
                                    <th> Merit</th>
                                    <th>Status</th>
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
                ajax: "{{ route('jobs.my-application.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'department',
                        name: 'department'
                    },
                    {
                        data: 'salaryRange',
                        name: 'salaryRange'
                    },
                    {
                        data: 'merit',
                        name: 'merit'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },

                ]
            });
        });
    </script>
@endsection
