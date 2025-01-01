<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Faculty;
use App\Models\Fee;
use App\Models\Student;
use App\Models\User;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Charge;
use Stripe\Stripe;
use Yajra\DataTables\DataTables;

class DashboardController extends Controller
{
    public static $lastStudent = '';

    public function faculty()
    {
        if (\request()->ajax()) {
            $faculties = Faculty::all();
            return DataTables::of($faculties)
                ->addIndexColumn()
                ->addColumn('name', function ($row) {
                    return $row->user ? $row->user->fname . ' ' . $row->user->lname : 'N/A';
                })
                ->addColumn('email', function ($row) {
                    return $row->user ? $row->user->email : 'N/A';
                })
                ->addColumn('is_permanent', function ($row) {
                    return $row->is_permanent ? "Permanent" : 'Visiting';
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route('course.edit', $row->id) . '" class="edit btn btn-success btn-sm">Edit</a> <a href="' . route('course.destroy', $row->id) . '" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.admin.faculties');
    }

    public function createCheckout()
    {
        # code...
        $fee_id = Fee::where('user_id', Auth::id())->where('fee_type', 1)->value('id');


        return view('pages.admission.checkOut', compact('fee_id'));
    }

    public function storeCheckout(Request $request)
    {
        # code...

        // Name: Test
        // Number: 4242 4242 4242 4242
        // CSV: 123
        // Expiration Month: 12
        // Expiration Year: 2028


        Stripe::setApiKey(env('STRIPE_SECRET'));
        $request->validate([
            'card_name' => 'required|string|max:255',
            'card_number' => 'required|numeric|digits_between:13,19',
            'card_cvc' => 'required|numeric|digits:3',
            'card_expiry_month' => 'required|numeric|between:1,12',
            'card_expiry_year' => 'required|numeric|digits:4|min:' . date('Y'),
        ]);
        try {

            // Create the charge on Stripe's servers
            Charge::create([
                "amount" => 500,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Admission application Payment checkout."
            ]);

            $fee = Fee::find($request->fee_id);
            $fee->amount_paid = 500;
            $fee->bank_name = 'Temp bank';
            $fee->status = true;
            $fee->save();


            return redirect()->route('admission.my-application.index')->with('status', [
                'type' => 'success', // or 'danger'
                'content' => [
                    'icon' => 'fa fa-bell',
                    'message' => 'Payment Successfully!'
                ]
            ]);
        } catch (Exception $e) {
            // Handle errors returned by Stripe
            return back()->with('status', [
                'type' => 'danger',
                'content' => [
                    'icon' => 'fa fa-exclamation-triangle',
                    'message' => 'Error: ' . $e->getMessage()
                ]
            ])->withInput();
        }
    }

    public function admissionApplication()
    {
        # code...
        if (\request()->ajax()) {
            $application = Application::with('user', 'programLevel', 'program')->get();

            return DataTables::of($application)
                ->addIndexColumn()
                ->addColumn('name', function ($row) {
                    return $row->user ? $row->user->fname . ' ' . $row->user->lname : 'N/A';
                })
                ->addColumn('program_level', function ($row) {
                    return $row->programLevel ? $row->programLevel->name : 'N/A';
                })
                ->addColumn('program', function ($row) {
                    return $row->program ? $row->program->name : 'N/A';
                })
                ->addColumn('status', function ($row) {
                    return $row->status == 1 ? 'Approved' : 'Pending';
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route('admission.application.success', $row->id) . '"><i class="fas fa-check text-primary"></i></a> ';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.admin.applications');
    }
    public function admissionApplicationSuccess($id)
    {
        # code...
        $application = Application::where('id', $id)->update(['status' => true]);
        $application = Application::where('id', $id)->first();
        $user = User::find($application->user_id);
        $user->role_id = 3;
        $user->save();
        $student = new Student();
        $currentYear = date('y');
        $programPrefix = '';
        if ($application->program_level_id == 1) {
            $programPrefix = 'BS';
        } elseif ($application->program_level_id == 3) {
            $programPrefix = 'MS';
        }
        $latestStudent = Student::where(
            'student_id',
            'LIKE',
            $programPrefix . 'F' . $currentYear . '%'
        )
            ->orderBy('student_id', 'desc')
            ->first();

        if ($latestStudent) {
            $latestSequentialId = intval(substr($latestStudent->student_id, -4));
        } else {
            $latestSequentialId = 0;
        }
        $newSequentialId = str_pad($latestSequentialId + 1, 4, '0', STR_PAD_LEFT);

        $student->student_id = $programPrefix . 'F' . $currentYear . $newSequentialId;
        $student->user_id = $application->user_id;
        $student->program_id = $application->program_id;
        $student->enrollment_date = now();
        $student->from = date('Y');
        $date = new DateTime();

        if ($application->program_level_id == 3) {
            $date->modify('+2 years');
        } elseif ($application->program_level_id == 1) {
            $date->modify('+4 years');
        }

        $student->to = $date->format('Y');

        $student->save();
        return redirect()->back();
    }
}
