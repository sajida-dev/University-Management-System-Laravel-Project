<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class RoomController extends Controller
{
    public function index()
    {
        # code...
        if (\request()->ajax()) {
            $rooms = Room::all();
            return DataTables::of($rooms)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route('room.edit', $row->id) . '"><i class="fas fa-edit text-primary"></i></a> <a href="' . route('room.destroy', $row->id) . '"><i class="fas fa-trash text-danger"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.admin.room.index');
    }
    public function create()
    {
        # code...
        return view('pages.admin.room.create');
    }
    public function store(Request $request)
    {
        # code...
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'capacity' => ['required', 'integer', 'min:1'],
        ]);
        Room::create($validated);
        return redirect()->route('room.index');
    }
    public function edit($id)
    {
        # code...
        $room = Room::where('id', $id)->first();
        return view('pages.admin.room.edit', compact('room'));
    }
    public function update(Request $request, $id)
    {
        # code...
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'capacity' => ['required', 'integer', 'min:1'],
        ]);
        $room = Room::where('id', $id)->first();
        $room->name = $request->name;
        $room->capacity = $request->capacity;
        $room->save();
        return redirect()->route('room.index');
    }
    public function destroy($id)
    {
        # code...
        $room = Room::find($id);
        $room->delete();
        return redirect()->back();
    }
}
