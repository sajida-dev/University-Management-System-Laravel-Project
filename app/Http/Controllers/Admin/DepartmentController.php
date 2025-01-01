<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Http\Requests\Admin\StoreDepartmentRequest;
use App\Http\Requests\Admin\UpdateDepartmentRequest;
use App\Models\Faculty;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (\request()->ajax()) {
            $departments = Department::all();
            return DataTables::of($departments)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route('departments.edit', $row->id) . '"><i class="fas fa-edit text-primary"></i></a> <a href="' . route('departments.destroy', $row->id) . '"><i class="fas fa-trash text-danger"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        //return view('products.index');
        return view('pages.admin.department.index');
    }

    public function allocateCreate()
    {
        $departments = Department::all();


        return view('pages.admin.department.allocate', compact('departments'));
    }

    public function allocateStore(Request $request)
    {
        $request->validate([
            'department_id' => 'required|exists:departments,id',
            'faculity_id' => 'required|exists:faculties,id',
        ], [
            'department_id.required' => 'The department is required.',
            'department_id.exists' => 'The selected department is invalid.',
            'faculity_id.required' => 'The department head is required.',
            'faculity_id.exists' => 'The selected department head is invalid.',
        ]);

        $fac = Faculty::find($request->faculty_id);
        if ($fac) {
            $fac->update(['is_head' => true]);
        }
        return redirect()->back();
    }


    public function getFacultyByDepartment($department_id)
    {
        // Fetch faculty members belonging to the selected department
        $faculty = Faculty::with('user')->where('department_id', $department_id)->get();
        //dd($faculty);
        // Return the data as JSON
        return response()->json($faculty);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.department.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDepartmentRequest $request)
    {
        $validated = $request->validated();
        $dep = new Department();
        //dd($validated);
        $dep->create($validated);
        return redirect()->route('departments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $department = Department::where('id', $id)->first();
        return view('pages.admin.department.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDepartmentRequest $request,  $id)
    {
        $department = Department::find($id);
        $department->update($request->all());
        return redirect()->route('departments.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $department = Department::find($id);
        $department->delete();
        return redirect()->back();
    }
}
