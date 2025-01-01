@extends('layouts.app')
@section('page-name', ' Grade Book')
@section('admin-main')
    <style>
        .table {
            zoom: 0.8;
        }
    </style>

    <div class="row">
        @if (!$result->isEmpty())
            <div class="col-xl-12">
                <div id="panel-12" class="card">
                    <div class="card-header">
                        <h2 class="card-title">
                            Grade Book
                        </h2>
                    </div>
                    <div class="card-body show">
                        @foreach ($result as $i => $r)
                            <table class="table table-bordered table-hover mb-5">
                                <thead class="thead-themed">
                                    <tr>
                                        <th colspan='11' style="text-align: center;">Semester {{ $r->semester }}
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Course Code</th>
                                        <th>Course Name</th>
                                        <th>Credit Hours</th>
                                        <th>Mid</th>
                                        <th>Practical</th>
                                        <th>Sessional</th>
                                        <th>Final</th>
                                        <th>Score</th>
                                        <th>Grade</th>
                                        <th>Grade Point</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">{{ $i + 1 }}</th>
                                        <td>{{ $r->course->course_code }}</td>
                                        <td>{{ $r->course->name }}</td>

                                        <td>{{ $r->course->courseProgram[0]->courseType->credits }}</td>
                                        <td>{{ $r->mid_marks }} </td>
                                        <td>{{ $r->practical_marks }}</td>
                                        <td>{{ $r->sessional_marks }}</td>
                                        <td>{{ $r->final_marks }}</td>
                                        <td>{{ $r->mid_marks + $r->practical_marks + $r->sessional_marks + $r->final_marks }}
                                        </td>
                                        <td>D</td>
                                        <td>{{ $r->percentage }} </td>
                                    </tr>

                                    <tr>
                                        <td colspan="3" class="text-right"><b>GPA</b></td>
                                        <td colspan="2">3.61</td>
                                        <td colspan="3" class="text-right"><b>Status</b></td>
                                        <td colspan="3">Promoted</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="text-right"><b>Total Courses</b></td>
                                        <td colspan="2">6</td>
                                        <td colspan="3" class="text-right"><b>Credits Earned</b></td>
                                        <td colspan="3">18</td>
                                    </tr>

                                </tbody>
                            </table>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
