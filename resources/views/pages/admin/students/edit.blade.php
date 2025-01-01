@extends('layouts.app')
@section('page-name', 'Student Details')
@section('admin-main')


    <link id="myskin" rel="stylesheet" media="screen, print"
        href="https://admissions.uoel.edu.pk/admin_asset/css/skins/skin-master.css">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-12" class="card">
                <div class="card-header">
                    <h2 class="card-title">
                        Student Detail
                    </h2>
                </div>
                <div class="card-body show">
                    <div class="panel-content">

                        <table class="table table-bordered m-0">
                            <tbody>
                                <tr>
                                    <th scope="row">Name</th>
                                    <td>{{ $student->user->fname . ' ' . $student->user->lname }}</td>
                                    <th>Study Status</th>
                                    <td>Regular</td>
                                </tr>
                                <tr>
                                    <th scope="row">Student ID</th>
                                    <td> {{ $student->student_id }} </td>
                                    <th>Campus Name</th>
                                    <td>UE Jauharabad Campus</td>
                                </tr>

                                <tr>
                                    <th>Study Program</th>
                                    <td colspan="3"><span class="font-weight-bold">{{ $student->program->name }} </span>
                                        (Open
                                        Merit) </td>
                                </tr>
                                <tr>
                                    <th scope="row">Credits Required.</th>
                                    <td> 133 </td>
                                    <th>Credits Earned</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">CGPA</th>
                                    <td>3.78</td>
                                    <th>Percentage</th>
                                    <td>86</td>
                                </tr>
                                <tr>
                                    <th scope="row">Required Semester GPA</th>
                                    <td>2</td>
                                    <th>Required Semester GPA for Probation</th>
                                    <td>1.7</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-12">
            <div id="panel-12" class="card">
                <div class="card-header">
                    <h2 class="card-title">
                        Academic Details
                    </h2>
                </div>
                <div class="card-body show">
                    {{-- <div class="panel-content"> --}}
                    <style>
                        .table {
                            zoom: 0.8;
                        }
                    </style>
                    <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Degree</th>
                                <th> Board/University </th>
                                <th> RegNo </th>
                                <th> RollNo </th>
                                <th> Exam Type </th>
                                <th> Year</th>
                                <th> Obt. Marks </th>
                                <th> Max. Marks</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!$academicQualification->isEmpty())
                                @foreach ($academicQualification as $a)
                                    <tr>
                                        <td>{{ $a->id }}</td>
                                        <td>
                                            @if ($a->degree_level == 1)
                                                {{ __('Matric') }}
                                            @elseif ($a->degree_level == 2)
                                                {{ __('Intermediate') }}
                                            @else
                                                {{ __('Bachelors (BS/4years)') }}
                                            @endif
                                        </td>
                                        <td> {{ $a->board_or_university }} </td>
                                        <td>{{ $a->registration_no }}</td>
                                        <td> {{ $a->roll_no }} </td>
                                        <td>
                                            @if ($a->exam_type == 1)
                                                {{ 'Annual' }}
                                            @else
                                                {{ 'Semester' }}
                                            @endif
                                        </td>
                                        <td> {{ $a->passing_year }} </td>
                                        <td> {{ $a->total_marks }}</td>
                                        <td> {{ $a->obtained_marks }} </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr style="text-align: center">
                                    <td colspan="10">No Data</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    {{-- </div> --}}
                </div>
            </div>
        </div>

        <div class="col-xl-12">
            <div id="panel-12" class="card">
                <div class="card-header">
                    <h2 class="card-title">
                        Grade Book
                    </h2>
                </div>
                <div class="card-body show">
                    <table class="table table-bordered table-hover mb-5">
                        <thead class="thead-themed">
                            <tr>
                                <th colspan='11' style="text-align: center;">Semester 1</th>
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
                            @foreach ($result as $i => $r)
                                <tr>
                                    <th scope="row">{{ $i + 1 }}</th>
                                    <td>{{ $r->course->course_code }}</td>
                                    <td>{{ $r->course->name }}</td>
                                    <td></td>
                                    {{-- <td>{{ $r->courseType->credits }}</td> --}}
                                    <td>{{ $r->mid_marks }} </td>
                                    <td>{{ $r->practical_marks }}</td>
                                    <td>{{ $r->sessional_marks }}</td>
                                    <td>{{ $r->final_marks }}</td>
                                    <td>{{ $r->mid_marks + $r->practical_marks + $r->sessional_marks + $r->final_marks }}
                                    </td>
                                    <td>D</td>
                                    <td>{{ $r->percentage }} </td>
                                </tr>
                            @endforeach
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
                </div>
            </div>
        </div>
    </div>

@endsection
