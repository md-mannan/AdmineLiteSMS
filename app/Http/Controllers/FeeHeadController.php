<?php

namespace App\Http\Controllers;

use App\Models\FeeHead;
use Illuminate\Http\Request;

class FeeHeadController extends Controller
{

    public function index()
    {
        return view('admin.feehead.create_fee_head');
    }


    public function read()
    {
        $data = FeeHead::paginate(10);
        return view('admin.feehead.list_fee_head', compact('data'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $data = new FeeHead();
        $data->name = $request->name;
        $data->save();
        if ($data->save()) {
            return redirect()->route('fee-head.read')->with('success', 'Fee Head created successfully');
        } else {
            return redirect()->route('fee-head.read')->with('error', 'Fee Head Create Failed');
        }
    }




    public function edit(Request $request)
    {
        $data = FeeHead::find($request->id);
        return view('admin.feehead.edit_fee_head', compact('data'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $data = FeeHead::find($request->id);
        $data->name = $request->name;
        $data->update();
        if ($data->update()) {
            return redirect()->route('fee-head.read')->with('success', 'Fee Head Updated successfully');
        } else {
            return redirect()->route('fee-head.read')->with('error', 'Fee Head Update Failed');
        }
    }

    public function delete(Request $request)
    {
        $data = FeeHead::find($request->id);

        if ($data && $data->delete()) {
            return redirect()->route('fee-head.read')->with('success', 'Fee Category Deleted successfully');
        } else {
            return redirect()->route('fee-head.read')->with('error', 'Fee Category Delete Failed');
        }
    }
}
