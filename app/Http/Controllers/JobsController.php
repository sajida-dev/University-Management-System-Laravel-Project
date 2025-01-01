<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admission\StoreAdmissionAcademicDetailsRequest;
use App\Http\Requests\StoreJobRequest;
use App\Models\AcademicQualification;
use App\Models\AddressDetail;
use App\Models\Application;
use App\Models\Board;
use App\Models\Department;
use App\Models\DisabilityDetail;
use App\Models\Faculty;
use App\Models\Job;
use App\Models\JobApplication;
use App\Models\MajorSubject;
use App\Models\OtherDetail;
use App\Models\PersonalInfo;
use App\Models\Subject;
use App\Models\University;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class JobsController extends Controller
{
    public function index()
    {
        if (\request()->ajax()) {
            $jobs = Job::with('department')->get();
            return DataTables::of($jobs)
                ->addIndexColumn()
                ->addColumn('department', function ($row) {
                    return $row->department ? $row->department->name : 'N/A';
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route('jobs.edit', $row->id) . '"><i class="fas fa-edit text-primary"></i></a> <a href="' . route('jobs.destroy', $row->id) . '"><i class="fas fa-trash text-danger"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        //return view('products.index');
        return view('pages.jobs.index');
    }

    public function allApplications()
    {
        if (\request()->ajax()) {
            $jobs = JobApplication::with('user', 'job')->get();
            // dd($jobs);
            return DataTables::of($jobs)
                ->addIndexColumn()
                ->addColumn('name', function ($row) {
                    return $row->user ? $row->user->fname . ' ' . $row->user->lname : 'N/A';
                })
                ->addColumn('title', function ($row) {
                    return $row->job ? $row->job->title : 'N/A';
                })
                ->addColumn('status', function ($row) {
                    return $row->status == 1 ? 'Approved' : 'Pending';
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route('application.success', $row->id) . '"><i class="fas fa-check text-primary"></i></a> ';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        //return view('products.index');
        return view('pages.jobs.applications');
    }

    public function applicationSuccess($id)
    {
        # code...
        $jobApplication = JobApplication::where('id', $id)->first();
        $jobApplication->status = true;
        $jobApplication->save();
        $jobApplication = $jobApplication->first();
        $faculty = new Faculty();
        $faculty->user_id = $jobApplication->user_id;
        $faculty->is_head = false;
        $faculty->is_permanent = false;
        $faculty->department_id = $jobApplication->job->department_id;
        $faculty->since = date('Y');
        $faculty->save();
        $user = User::find($jobApplication->user_id);
        $user->role_id = 2;
        $user->save();
        return redirect()->back();
    }

    public function allJobs()
    {
        # code...
        $jobs = Job::with('department')->get();
        $jobApplications = JobApplication::ForUser()->pluck('job_id')->toArray();
        return view('pages.jobs.all', compact('jobs', 'jobApplications'));
    }
    public function create()
    {
        $departments = Department::all();
        return view('pages.jobs.create', compact('departments'));
    }
    public function store(StoreJobRequest $request)
    {
        $validatedData = $request->validated();
        $job = new Job();
        //dd($validated);
        $job->create($validatedData);
        return redirect()->route('jobs.index');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        $job = $job->first();
        $departments = Department::all();
        return view('pages.jobs.edit', compact('job', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'title' => 'required|string|max:100|min:2',
            'department_id' => 'required|numeric',
            'vacancies' => 'required|integer|min:1',
            'salaryFrom' => 'required|numeric|min:0',
            'salaryTo' => 'required|numeric|gte:salaryFrom',
            'from' => 'required|date',
            'to' => 'required|date|after_or_equal:from',
            'description' => 'required|string|max:100|min:2',
        ]);
        $department = Job::find($id);
        $department->update($request->all());
        return redirect()->route('jobs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $department = Job::find($id);
        $department->delete();
        return redirect()->back();
    }

    public function createApply($id)
    {
        # code...
        $job = Job::where('id', $id)->first();
        $jobApplications = JobApplication::ForUser()->pluck('job_id')->toArray();
        return view('pages.jobs.job_details', compact('job', 'jobApplications'));
    }

    public function jobApplications()
    {
        # code...
        if (\request()->ajax()) {
            $jobApplications = JobApplication::with('job.department')->where('user_id', Auth::id())->get();
            // dd($jobs);
            return DataTables::of($jobApplications)
                ->addIndexColumn()
                ->addColumn('title', function ($row) {
                    return $row->job ? $row->job->title : 'N/A';
                })
                ->addColumn('department', function ($row) {
                    return $row->job->department ? $row->job->department->name : 'N/A';
                })
                ->addColumn('salaryRange', function ($row) {
                    return $row->job->salaryFrom ? $row->job->salaryFrom . ' - ' . $row->job->salaryTo : '';
                })
                ->addColumn('status', function ($row) {
                    return $row->status == 1 ? 'Approved' : 'Pending';
                })

                ->rawColumns(['action'])
                ->make(true);
        }

        return view('pages.jobs.jobApplications');
    }

    public function checkForJob()
    {
        $host = explode('.', request()->host())[0];
        $isPersonalInfoFilled = PersonalInfo::ForUser()->first();
        $addressDetail = AddressDetail::ForUser()->first();
        $isAddressDetailFilled = $addressDetail && !is_null($addressDetail->user_id);
        $disabilityDetail = DisabilityDetail::ForUser()->first();
        $isDisabilityDetailFilled = $disabilityDetail && !is_null($disabilityDetail->user_id);
        $otherDetail = OtherDetail::ForUser()->first();
        $isOtherDetailFilled = $otherDetail && !is_null($otherDetail->user_id);
        $academicQualification = AcademicQualification::ForUser()->get();
        $disabilityStatus = \App\Models\PersonalInfo::where('user_id', Auth::id())->value('is_disability');

        $route = '';
        if ($host == 'admission') {
            $route = 'admission.';
        } else {
            $route = 'jobs.';
        }


        if (!$isPersonalInfoFilled) {
            return redirect()->route('admission.profile-detail.create')->with('status', [
                'type' => 'danger', // or 'danger'
                'content' => [
                    'icon' => 'fa fa-exclamation',
                    'message' => 'Please fill out your Personal Information first!'
                ]
            ]);
        } else if (!$isAddressDetailFilled) {
            return redirect()->route('admission.address-detail.create')->with('status', [
                'type' => 'danger', // or 'danger'
                'content' => [
                    'icon' => 'fa fa-exclamation',
                    'message' => 'Please fill out your Address Details first!'
                ]
            ]);
        } else if (!$isDisabilityDetailFilled && $disabilityStatus) {
            return redirect()->route('admission.disability-detail.create')->with('status', [
                'type' => 'danger', // or 'danger'
                'content' => [
                    'icon' => 'fa fa-exclamation',
                    'message' => 'Please fill out your Disability Details first!'
                ]
            ]);
        } else if (!$isOtherDetailFilled) {
            return redirect()->route('admission.other-detail.create')->with('status', [
                'type' => 'danger', // or 'danger'
                'content' => [
                    'icon' => 'fa fa-exclamation',
                    'message' => 'Please fill out your Other Details first!'
                ]
            ]);
        } else if ($academicQualification->count() < 2) {

            return redirect()->route($route . 'academic-details.create')->with('status', [
                'type' => 'danger', // or 'danger'
                'content' => [
                    'icon' => 'fa fa-exclamation',
                    'message' => 'Please fill out your Academic Details first!'
                ]
            ]);
        }

        // If all sections are filled, proceed to apply for the job

        if (explode('.', request()->host())[0] == 'jobs') {
            return redirect()->route('jobs.all');
        } else if (explode('.', request()->host())[0] == 'admission') {
            return redirect()->route('admission.choose-program.create');
        }
    }
    public function storeApply(Request $request)
    {
        # code...
        $user_id = Auth::id();
        $academic = AcademicQualification::where('user_id', $user_id)->get();
        if ($academic) {
            $merit = (($academic[0]->obtained_marks + $academic[1]->obtained_marks) / 8) * 100;
        }
        $jobApplication = new JobApplication();
        $jobApplication->user_id = $user_id;
        $jobApplication->job_id = $request->job_id;
        $jobApplication->merit = $merit;
        $jobApplication->save();
        return redirect()->route('jobs.all');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createAcademicDetails()
    {
        $programLevel = Application::where('user_id', Auth::id())->value('program_level_id');
        $board = Board::all();
        $uni = University::all();
        $subjects = Subject::all();
        $academicQualification = AcademicQualification::where('user_id', Auth::id());
        //dd($academicQualification);
        $academicQualification = $academicQualification->get();
        $degree = $academicQualification->pluck('degree_level')->toArray();

        if (!$academicQualification->isEmpty()) {
            foreach ($academicQualification as $a) {
                # code...
                if ($a->degree_level == 3 || $a->degree_level == 4) {
                    $a['board_or_university'] = University::find($a->university_id)->value('name');
                } else {
                    $a['board_or_university'] = Board::find($a->board_id)->value('name');
                }
            }
        }

        return view('pages.jobs.academic-qualification.create', compact('programLevel', 'board', 'uni', 'academicQualification', 'subjects', 'degree'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeAcademicDetails(StoreAdmissionAcademicDetailsRequest $request)
    {
        $validatedData = $request->validated();
        //dd($validatedData);
        if ($validatedData['degree_level'] == 3 || $validatedData['degree_level'] == 4) {
            $validatedData['university_id'] = $validatedData['board_or_university'];
        } else {
            if ($validatedData['degree_level'] == 2) {
                for ($i = 0; $i < 3; $i++) {
                    # code...
                    $majorSubject = new MajorSubject();
                    $majorSubject->user_id = Auth::id();
                    $majorSubject->subject_id = $validatedData['subject'][$i];
                    $majorSubject->obtained_marks = $validatedData['obtainedMarks'][$i];
                    $majorSubject->total_marks = $validatedData['totalMarks'][$i];
                    $majorSubject->save();
                }
            }
            $validatedData['board_id'] = $validatedData['board_or_university'];
        }
        $academicQualification = new AcademicQualification();
        $validatedData['user_id'] = Auth::id();
        $academicQualification->create($validatedData);
        return redirect()->route('jobs.academic-details.create');
    }

    private function calculateMerit($userId)
    {
        // Fetch all academic records for the user
        $academicRecords = AcademicQualification::where('user_id', $userId)->get();

        $totalMarks = 0;
        $obtainedMarks = 0;
        $totalCGPA = 0;
        $cgpaCount = 0;
        $marksPercentage  = 0;


        foreach ($academicRecords as $record) {
            if ($record->degree_level_id == 1 || $record->degree_level_id == 2) {
                // Use marks for Matric and Intermediate levels
                $totalMarks += $record->total_marks;
                $obtainedMarks += $record->obtained_marks;
            } elseif ($record->degree_level_id == 3 || $record->degree_level_id == 4) {
                // For BS and MS
                $cgpaPercentage = ($record->cgpa / 4.00) * 100;
                $totalCGPA += $cgpaPercentage;
                $cgpaCount++;
            }
        }

        if ($obtainedMarks > 0 && $totalMarks > 0) {
            // Calculate percentage from marks
            $marksPercentage = ($obtainedMarks * 100) / $totalMarks;
        }


        // Calculate average CGPA percentage for BS and MS
        $averageCGPA = $cgpaCount > 0 ? $totalCGPA / $cgpaCount : 0;

        // Calculate final merit (you can adjust the weights as needed)
        $merit = ($marksPercentage + $averageCGPA) / 2; // Equal weight for marks and CGPA percentage

        return $merit;
    }
}
