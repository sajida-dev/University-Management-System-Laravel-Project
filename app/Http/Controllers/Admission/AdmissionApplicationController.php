<?php

namespace App\Http\Controllers\Admission;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admission\StoreAdmissionAcademicDetailsRequest;
use App\Http\Requests\Admission\StoreAdmissionChooseProgramRequest;
use App\Models\AcademicQualification;
use App\Models\Application;
use App\Models\Board;
use App\Models\Fee;
use App\Models\MajorSubject;
use App\Models\Program;
use App\Models\ProgramLevel;
use App\Models\Subject;
use App\Models\University;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AdmissionApplicationController extends Controller
{


    public function index()
    {
        $application = Application::where('user_id', Auth::id())->get();
        //dd($application);
        return view('pages.admission.applications.my-applications', compact('application'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createProgram()
    {
        $programLevels = ProgramLevel::all();
        return view('pages.admission.applications.choose-program', compact('programLevels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeProgram(StoreAdmissionChooseProgramRequest $request)
    {
        $validatedData = $request->validated();
        $application = new Application();
        $validatedData['user_id'] = Auth::id();
        $validatedData['merit'] = 0;
        $application->create($validatedData);
        $fee = new Fee();
        $fee->user_id = Auth::id();
        $fee->fee_type = 1;
        $fee->challan_no = rand();
        $fee->amount_to_pay = 500;
        $fee->due_date = Carbon::now()->addWeek();
        $fee->fine_amount = 0;
        $fee->fine_date = Carbon::now()->addWeek();
        $fee->save();
        return redirect()->route('admission.academic-details.create');
    }

    public function getPrograms($level)
    {
        // Assuming you have a Program model with a 'level' field that stores the program level.
        $programs = Program::where('program_level_id', $level)->get();

        // Return a JSON response with the programs.
        return response()->json($programs);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createApply()
    {
        return view('pages.admission.applications.choose-program');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeApply(StoreAdmissionAcademicDetailsRequest $request)
    {
        //
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
                if ($a->degree_level == 3) {
                    $a['board_or_university'] = University::find($a->university_id)->value('name');
                } else {
                    $a['board_or_university'] = Board::find($a->board_id)->value('name');
                }
            }
        }

        return view('pages.admission.academic-qualification.create', compact('programLevel', 'board', 'uni', 'academicQualification', 'subjects', 'degree'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeAcademicDetails(StoreAdmissionAcademicDetailsRequest $request)
    {
        $validatedData = $request->validated();
        //dd($validatedData);
        if ($validatedData['degree_level'] == 3) {
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

        $userId = Auth::id();
        // Calculate merit based on all academic records
        $merit = $this->calculateMerit($userId);

        // Store merit in the user or application record
        $latestApplication = Application::where('user_id', $userId)
            ->orderBy('created_at', 'desc') // or 'updated_at' if that's more appropriate
            ->first();
        $latestApplication->merit = $merit;
        $latestApplication->save();

        return redirect()->route('admission.academic-details.create');
    }

    private function calculateMerit($userId)
    {
        // Fetch all academic records for the user
        $academicRecords = AcademicQualification::where('user_id', $userId)->get();

        $totalMarks = 0;
        $obtainedMarks = 0;
        $totalCGPA = 0;
        $cgpaCount = 0;


        foreach ($academicRecords as $record) {
            if ($record->degree_level == 1 || $record->degree_level == 2) {
                // Use marks for Matric and Intermediate levels
                $totalMarks += $record->total_marks;
                $obtainedMarks += $record->obtained_marks;
            } elseif ($record->degree_level == 3 || $record->degree_level == 4) {
                // For BS and MS
                $cgpaPercentage = ($record->cgpa / 4.00) * 100;
                $totalCGPA += $cgpaPercentage;
                $cgpaCount++;
            }
        }


        $marksPercentage = ($obtainedMarks * 100) / $totalMarks;

        $averageCGPA = $cgpaCount > 0 ? $totalCGPA / $cgpaCount : 0;
        if ($averageCGPA > 0) {
            $merit = ($marksPercentage + $averageCGPA) / 2;
        } else {
            $merit = ($marksPercentage + $averageCGPA);
        }
        // Equal weight for marks and CGPA percentage

        return $merit;
    }
}
