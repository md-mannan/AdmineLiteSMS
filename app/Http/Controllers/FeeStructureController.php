<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\FeeHead;
use App\Models\FeeStructure;

class FeeStructureController extends Controller
{
    public function index()
    {
        $data['data'] = FeeStructure::paginate(10);
        return view('admin.feestructure.index_fee_structure', $data);
    }
    public function create()

    {
        $data['class'] = Classes::pluck('name', 'id');
        $data['feename'] = FeeHead::pluck('name', 'id');
        $data['year'] = AcademicYear::pluck('name', 'id');
        return view('admin.feestructure.create_fee_structure', $data);
    }
    public function store(Request $request)
    {
        $request->validate([
            'class' => 'required',
            'fee_head_id' => 'required',
            'academic_year_id' => 'required',
        ]);
        $data = new FeeStructure;
        $data->class_id = $request->class;
        $data->academic_year_id = $request->academic_year_id;
        $data->fee_head_id = $request->fee_head_id;
        $data->january = $request->january;
        $data->february = $request->class;
        $data->march = $request->february;
        $data->april = $request->april;
        $data->may = $request->may;
        $data->june = $request->june;
        $data->july = $request->july;
        $data->august = $request->august;
        $data->september = $request->september;
        $data->october = $request->october;
        $data->november = $request->november;
        $data->december = $request->december;
        $data->save();
        if ($data->save()) {
            return redirect()->route('fee-structure.index')->with('success', 'Fee Structure Added successfully');
        } else {
            return redirect()->route('fee-structure.index')->with('error', 'Fee Structure Add Failed');
        }
    }
    public function edit(Request $request)
    {
        $data['class'] = Classes::pluck('name', 'id');
        $data['feename'] = FeeHead::pluck('name', 'id');
        $data['year'] = AcademicYear::pluck('name', 'id');
        $data['info'] = FeeStructure::find($request->id);

        return view('admin.feestructure.edit_fee_structure', $data);
    }
    public function update(Request $request)
    {
        $data = FeeStructure::find($request->id);
        $data->class_id = $request->class_id;
        $data->academic_year_id = $request->academic_year_id;
        $data->fee_head_id = $request->fee_head_id;
        $data->january = $request->january;
        $data->february = $request->class;
        $data->march = $request->february;
        $data->april = $request->april;
        $data->may = $request->may;
        $data->june = $request->june;
        $data->july = $request->july;
        $data->august = $request->august;
        $data->september = $request->september;
        $data->october = $request->october;
        $data->november = $request->november;
        $data->december = $request->december;
        $data->update();
        if ($data && $data->update()) {
            return redirect()->route('fee-structure.index')->with('success', 'Fee Structure Update successfully');
        } else {
            return redirect()->route('fee-structure.index')->with('error', 'Fee Structure Update Failed');
        }
    }
    public function delete(Request $request)
    {
        $data = FeeStructure::find($request->id);

        if ($data && $data->delete()) {
            return redirect()->route('fee-structure.index')->with('success', 'Fee Structure Deleted successfully');
        } else {
            return redirect()->route('fee-structure.index')->with('error', 'Fee Structure Delete Failed');
        }
    }
}
