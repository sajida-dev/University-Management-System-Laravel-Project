<?php

namespace App\Http\Controllers;

use App\Models\AcademicQualification;
use App\Models\Attendance;
use App\Models\Board;
use App\Models\Course;
use App\Models\CourseProgram;
use App\Models\CourseResult;
use App\Models\Faculty;
use App\Models\Fee;
use App\Models\Program;
use App\Models\Student;
use App\Models\Subject;
use App\Models\University;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class StudentController extends Controller
{
    public function index()
    {
        # code...
        if (\request()->ajax()) {
            $students = Student::with('user', 'program')->get();
            return DataTables::of($students)
                ->addIndexColumn()
                ->addColumn('full_name', function ($row) {
                    return $row->user ? $row->user->fname . ' ' . $row->user->lname : 'N/A';
                })
                ->addColumn('program_name', function ($row) {
                    return $row->program ? $row->program->name : 'N/A';
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route('admin.student.show', $row->id) . '"><i class="fas fa-eye text-primary"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.admin.students.students');
    }






    public function show($id)
    {
        # code...
        $student = Student::with('user', 'program')->where('id', $id)->first();
        $board = Board::all();
        $uni = University::all();
        $academicQualification = AcademicQualification::where('user_id', $student->user_id);
        //dd($academicQualification);
        $academicQualification = $academicQualification->get();
        $degree = $academicQualification->pluck('degree_level')->toArray();
        if (!$academicQualification->isEmpty()) {
            foreach ($academicQualification as $a) {
                # code...
                if ($a->degree_level == 3) {
                    $a['board_or_university'] = University::find($a->university_id)->value('name');
                } else {
                    $a['board_or_university'] = Board::find($a->board_id)->value('name');
                }
            }
        }

        $result = CourseResult::with('course.courseProgram.courseType')
            ->where('student_id', $student->id)
            ->whereHas('course.courseProgram', function ($query) use ($student) {
                $query->where('program_id', $student->program_id);
            })
            ->orderBy('semester')
            ->get();


        return view('pages.admin.students.show', compact('student', 'result', 'board', 'uni', 'academicQualification', 'degree'));
    }

    public function studentView()
    {
        # code...
        $student = Student::with('user', 'program')->where('user_id', Auth::id())->first();
        $result = CourseResult::with('course.courseType.coursePrograms')->where('student_id', $student->id)->get();
        return view('pages.student.grade-book', compact('result'));
    }

    public function profile()
    {
        # code...
        $student = Student::with('user', 'program')->where('user_id', Auth::id())->first();
        $board = Board::all();
        $uni = University::all();
        $academicQualification = AcademicQualification::where('user_id', $student->user_id);
        //dd($academicQualification);
        $academicQualification = $academicQualification->get();
        $degree = $academicQualification->pluck('degree_level')->toArray();
        if (!$academicQualification->isEmpty()) {
            foreach ($academicQualification as $a) {
                # code...
                if ($a->degree_level == 3) {
                    $a['board_or_university'] = University::find($a->university_id)->value('name');
                } else {
                    $a['board_or_university'] = Board::find($a->board_id)->value('name');
                }
            }
        }
        return view('pages.student.profile', compact('student',  'board', 'uni', 'academicQualification', 'degree'));
    }
    public function fee()
    {
        # code...
        $fee = Fee::where('user_id', Auth::id())->get();
        return view('pages.student.fee-hsitory', compact('fee'));
    }
    public function destroy($id)
    {
        # code...
        $student = Student::find($id);
        $student->delete();
        return redirect()->back();
    }
}
