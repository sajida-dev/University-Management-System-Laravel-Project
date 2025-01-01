<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Course;
use App\Models\CourseProgram;
use App\Models\CourseResult;
use App\Models\Program;
use App\Models\Student;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function attendance()
    {
        # code...
        $programs = Program::all();
        return view('pages.faculty.attendence', compact('programs'));
    }


    public function attendanceStore(Request $request)
    {


        $request->validate([
            'course_id' => 'required',
            'student_id' => 'required',
            'status' => 'required',
        ]);

        $status = $request->status;
        $courseId = $request->course_id;
        $studentId = $request->student_id;


        $attendance = Attendance::where('id', $studentId)
            ->where('course_id', $courseId)
            ->whereDate('attendance_date', now()->toDateString())
            ->first();
        if ($attendance) {
            // Update the existing attendance record
            $attendance->status = $status;
            $attendance->save();
        } else {
            // Create a new attendance record
            Attendance::create([
                'student_id' => $studentId,
                'course_id' => $courseId,
                'attendance_date' => now(),
                'status' => $status,
            ]);
        }

        return response()->json(['status' => 'success', 'message' => 'Attendance updated successfully.']);
    }


    public function fetchCoursesForProgram($programId)
    {
        $courseIds = CourseProgram::where('program_id', $programId)->pluck('course_id');
        $courses = Course::whereIn('id', $courseIds)->get(['id', 'name']);

        $students = Student::with('user')->where('program_id', $programId)->get();

        return response()->json([
            'courses' => $courses,
            'students' => $students
        ]);
    }
}
