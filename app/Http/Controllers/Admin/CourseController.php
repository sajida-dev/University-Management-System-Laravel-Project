<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Http\Requests\Admin\StoreCourseRequest;
use App\Http\Requests\Admin\UpdateCourseRequest;
use App\Http\Requests\CourseAllocationRequest;
use App\Models\CourseProgram;
use App\Models\CourseType;
use App\Models\Program;
use GuzzleHttp\Handler\Proxy;
use Yajra\DataTables\DataTables;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (\request()->ajax()) {
            $departments = Course::all();
            return DataTables::of($departments)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route('course.edit', $row->id) . '"><i class="fas fa-edit text-primary"></i></a> <a href="' . route('course.destroy', $row->id) . '"><i class="fas fa-trash text-danger"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.admin.courses.index');
    }

    public function allocatedCourses()
    {
        if (\request()->ajax()) {
            $course = CourseProgram::with('course', 'program', 'courseType')->get();
            return DataTables::of($course)
                ->addIndexColumn()
                ->addColumn('name', function ($row) {
                    return $row->course ? $row->course->name : 'N/A';
                })
                ->addColumn('course_code', function ($row) {
                    return $row->course ? $row->course->course_code : 'N/A';
                })
                ->addColumn('credits', function ($row) {
                    return $row->courseType ? $row->courseType->credits : 'N/A';
                })
                ->addColumn('program_name', function ($row) {
                    return $row->program ? $row->program->name : 'N/A';
                })
                ->addColumn('course_type', function ($row) {
                    return $row->courseType->name ? $row->courseType->name : 'N/A';
                })
                ->make(true);
        }
        return view('pages.admin.courses.allocatedIndex');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courseTypes = CourseType::all();
        return view('pages.admin.courses.create', compact('courseTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        $validatedData = $request->validated();
        Course::create($validatedData);
        return redirect()->route('course.index');
    }

    public function allocate()
    {
        $courseTypes = CourseType::all();
        $courses = Course::all();
        $programs = Program::all();
        return view('pages.admin.courses.allocate', compact('courseTypes', 'courses', 'programs'));
    }

    public function allocateStore(CourseAllocationRequest $request)
    {
        // Retrieve validated data
        $validatedData = $request->validated();
        CourseProgram::create($validatedData);
        return redirect()->route('course.allocate.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        $course = $course->first();
        $courseTypes = CourseType::all();
        return view('pages.admin.courses.edit', compact('course', 'courseTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request,  $id)
    {
        $course = Course::find($id);
        $course->update($request->all());
        return redirect()->route('course.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        $course->delete();
        return redirect()->back();
    }
}
