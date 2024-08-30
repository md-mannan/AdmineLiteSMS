<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AcademicYear;
use Illuminate\View\View;

class AcademicYearController extends Controller
{
    public function index()
    {
        return view('admin.academic.create_academic_year');
    }
    public function read(): View
    {
        $data = AcademicYear::paginate(10);
        return view('admin.academic.list_academic_year', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $data = new AcademicYear;
        $data->name = $request->name;
        $data->save();
        if ($data->save()) {
            return redirect()->route('academic-year.read')->with('success', 'Academic Year created successfully');
        } else {
            return redirect()->route('academic-year.read')->with('error', 'Academic Year Create Failed');
        }
    }
    public function edit(Request $request)
    {
        $data = AcademicYear::find($request->id);
        return view('admin.academic.edit_academic_year', compact('data'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $data = AcademicYear::find($request->id);
        $data->name = $request->name;
        $data->update();
        if ($data->update()) {
            return redirect()->route('academic-year.read')->with('success', 'Academic Year Updated successfully');
        } else {
            return redirect()->route('academic-year.read')->with('error', 'Academic Year Update Failed');
        }
    }
    public function delete(Request $request)
    {
        $data = AcademicYear::find($request->id);

        if ($data && $data->delete()) {
            return redirect()->route('academic-year.read')->with('success', 'Academic Year Deleted successfully');
        } else {
            return redirect()->route('academic-year.read')->with('error', 'Academic Year Delete Failed');
        }
    }
}
