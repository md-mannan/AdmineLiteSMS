<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\AcademicYear;


class ClassesController extends Controller
{
    public function create()
    {
        $academic_year = AcademicYear::pluck('name', 'id');

        return view(
            'admin.classes.create_class',
            compact('academic_year')
        );
    }
    public function index()
    {

        $data = Classes::paginate(10);
        return view('admin.classes.index_class', compact('data'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'started_from' => 'required',
        ]);
        $data = new Classes;

        $data->name = $request->name;
        $data->started_from = $request->started_from;
        if ($data->save()) {
            return redirect()->route('class.index')->with('success', 'Class Created successfully');
        } else {
            return redirect()->route('class.index')->with('error', 'Class Create Failed');
        }
    }
    public function edit(Request $request)

    {
        $academic_year = AcademicYear::pluck('name', 'id');
        $data = Classes::find($request->id);
        if (!$data) {
            return redirect()->route('class.index')->with('error', 'Class not found');
        }
        return view('admin.classes.edit_class', compact('data', 'academic_year'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'started_from' => 'required',
        ]);
        $data = Classes::find($request->id);
        if (!$data) {
            return redirect()->route('class.index')->with('error', 'Class not found');
        }
        $data->name = $request->name;
        $data->started_from = $request->started_from;
        if ($data->update()) {
            return redirect()->route('class.index')->with('success', 'Class updated successfully');
        } else {
            return redirect()->route('class.index')->with('error', 'Class Update Failed');
        }
    }
    public function delete(Request $request)
    {
        $data = Classes::find($request->id);
        if (!$data) {
            return redirect()->route('class.index')->with('error', 'Class not found');
        }
        if ($data->delete()) {
            return redirect()->route('class.index')->with('success', 'Class deleted successfully');
        } else {
            return redirect()->route('class.index')->with('error', 'Class Delete Failed');
        }
    }
}
