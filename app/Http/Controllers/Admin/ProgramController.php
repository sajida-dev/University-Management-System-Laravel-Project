<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Http\Requests\Admin\StoreProgramRequest;
use App\Http\Requests\Admin\UpdateProgramRequest;
use App\Models\Department;
use App\Models\ProgramLevel;
use Yajra\DataTables\DataTables;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (\request()->ajax()) {
            $programs = Program::with('department', 'programLevel')->get();
            return DataTables::of($programs)
                ->addIndexColumn()
                ->addColumn('department_name', function ($row) {
                    return $row->department ? $row->department->name : 'N/A';
                })
                ->addColumn('program_level_name', function ($row) {
                    return $row->programLevel ? $row->programLevel->name : 'N/A';
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route('program.edit', $row->id) . '"><i class="fas fa-edit text-primary"></i></a> <a href="' . route('program.destroy', $row->id) . '"><i class="fas fa-trash text-danger"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.admin.program.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        $programLevels = ProgramLevel::all();
        return view('pages.admin.program.create', compact('departments', 'programLevels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProgramRequest $request)
    {
        $validatedData = $request->validated();
        Program::create($validatedData);
        return redirect()->route('program.index');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $departments = Department::all();
        $programLevels = ProgramLevel::all();
        $program = Program::where('id', $id)->first();
        return view('pages.admin.program.edit', compact('program', 'departments', 'programLevels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProgramRequest $request,  $id)
    {
        $program = Program::find($id);
        $program->update($request->all());
        return redirect()->route('program.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $program = Program::find($id);
        $program->delete();
        return redirect()->back();
    }
}
