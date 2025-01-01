<?php

namespace App\Http\Controllers;

use App\Models\CourseProgram;
use App\Models\CourseResult;
use App\Models\Program;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ResultController extends Controller
{

    public function indexMids()
    {
        # code...
        if (\request()->ajax()) {
            $departments = CourseResult::with('student.user', 'course')->get();
            return DataTables::of($departments)
                ->addIndexColumn()
                ->addColumn('student_id', function ($row) {
                    return $row->student->student_id;
                })
                ->addColumn('course_name', function ($row) {
                    return $row->course->name;
                })
                ->addColumn('name', function ($row) {
                    $name = $row->student->user->fname ? $row->student->user->fname . ' ' . $row->student->user->lname : 'N/A';
                    return $name;
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route('faculty.mids.edit', $row->id) . '"><i class="fas fa-edit text-primary"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        //return view('products.index');
        return view('pages.result.faculty.mids.index');
    }

    public function indexFinals()
    {
        # code...
        if (\request()->ajax()) {
            $departments = CourseResult::with('student.user')->get();
            return DataTables::of($departments)
                ->addIndexColumn()
                ->addColumn('student_id', function ($row) {
                    return $row->student->student_id;
                })
                ->addColumn('course_name', function ($row) {
                    return $row->course->name;
                })
                ->addColumn('name', function ($row) {
                    $name = $row->student->user->fname ? $row->student->user->fname . ' ' . $row->student->user->lname : 'N/A';
                    return $name;
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route('faculty.final.edit', $row->id) . '"><i class="fas fa-edit text-primary"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        //return view('products.index');
        return view('pages.result.faculty.finals.index');
    }

    public function createMids()
    {

        $programs = Program::all();
        return view('pages.result.faculty.mids.create', compact('programs'));
    }


    public function storeMids(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'student_id' => 'required|array',
            'student_id.*' => 'required|exists:students,id',
            'mid_marks' => 'required|array',
            'mid_marks.*' => 'required|numeric|min:0|max:20',
        ]);

        foreach ($request->student_id as $index => $studentId) {
            $semester = CourseProgram::where('course_id', $request->course_id)->where('program_id', $request->program_id)->value('semester');
            CourseResult::updateOrCreate(
                [
                    'student_id' => $studentId,
                    'course_id' => $request->course_id,
                    'semester' => $semester,
                    'year' => date('Y'),
                ],
                [
                    'mid_marks' => $request->mid_marks[$index],
                ]
            );
        }

        return redirect()->route('faculty.mids.index')->with('status', [
            'type' => 'success', // or 'danger'
            'content' => [
                'icon' => 'fa fa-check',
                'message' => 'Mid-term result stored successfully!'
            ]
        ]);
    }


    public function createFinals()
    {

        $programs = Program::all();
        return view('pages.result.faculty.finals.create', compact('programs'));
    }


    public function storeFinals(Request $request)
    {

        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'student_id' => 'required|array',
            'student_id.*' => 'required|exists:students,id',
            'practical_marks' => 'nullable|array',
            'practical_marks.*' => 'nullable|numeric|min:0|max:15',
            'sessional_marks' => 'required|array',
            'sessional_marks.*' => 'required|numeric|min:0|max:20',
            'final_marks' => 'required|array',
            'final_marks.*' => 'required|numeric|min:0|max:60',
        ]);


        foreach ($request->student_id as $index => $studentId) {
            $practical = $request->practical_marks[$index];
            $sessional = $request->sessional_marks[$index];
            $final = $request->final_marks[$index];
            $mids = $this->getMids($request->student_id, $request->course_id);
            $total = $mids + $practical + $sessional + $final;
            $percentage = 2.0 + ($total - 50) * 0.05;
            $percentage = max(0, min($percentage, 4.0));
            CourseResult::updateOrCreate(
                [
                    'student_id' => $studentId,
                    'course_id' => $request->course_id,
                ],
                [
                    'practical_marks' => $request->practical_marks[$index],
                    'sessional_marks' => $request->sessional_marks[$index],
                    'final_marks' => $request->final_marks[$index],
                    'percentage' => $percentage,
                ]
            );
        }

        return redirect()->route('faculty.final.index')->with('status', [
            'type' => 'success', // or 'danger'
            'content' => [
                'icon' => 'fa fa-check',
                'message' => 'Final-term result stored successfully!'
            ]
        ]);
    }

    private function getMids($studentId, $courseId)
    {
        //
        return CourseResult::where('student_id', $studentId)->where('course_id', $courseId)->value('mid_marks');
    }


    public function editMids($id)
    {

        $result = CourseResult::with('student.user')->where('id', $id)->first();
        return view('pages.result.faculty.mids.edit', compact('result'));
    }


    public function updateMids(Request $request, $id)
    {

        $request->validate([
            'mid_marks' => 'required|numeric|min:0|max:100',
        ]);


        $result = CourseResult::where('id', $id)->first();
        $result->mid_marks = $request->mid_marks;
        $result->save();

        return redirect()->route('faculty.mids.index')->with('status', [
            'type' => 'success', // or 'danger'
            'content' => [
                'icon' => 'fa fa-check',
                'message' => 'Mid-term result updated successfully!'
            ]
        ]);
    }


    public function editFinals($id)
    {

        $result = CourseResult::with('student.user')->where('id', $id)->first();
        return view('pages.result.faculty.finals.edit', compact('result'));
    }


    public function updateFinals(Request $request, $id)
    {
        $validated = $request->validate([
            'mid_marks' => 'required|numeric|min:0|max:20',
            'final_marks' => 'required|numeric|min:0|max:60',
            'practical_marks' => 'nullable|numeric|min:0|max:15',
            'sessional_marks' => 'required|numeric|min:0|max:20',
        ]);


        $result = CourseResult::where('id', $id)->first();
        $result->mid_marks = $request->mid_marks;
        $result->final_marks = $request->final_marks;
        $result->practical_marks = $request->practical_marks;
        $result->sessional_marks = $request->sessional_marks;

        $result->save();

        return redirect()->route('faculty.final.index')->with('status', [
            'type' => 'success', // or 'danger'
            'content' => [
                'icon' => 'fa fa-check',
                'message' => 'Final-term result updated successfully!'
            ]
        ]);
    }
}
