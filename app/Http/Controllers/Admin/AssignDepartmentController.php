<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignDepartment;
use App\Models\User;
use App\Models\Department;

class AssignDepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assignedDepartments = AssignDepartment::all();

        return view('admin.assign-department.index', compact('assignedDepartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $incharges = User::where('role', 'incharge')->get();
        $departments = Department::all();

        return view('admin.assign-department.create', compact('incharges', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'incharge' => 'required',
            'department' => 'required'
        ]);

        $existData = AssignDepartment::where('incharge_id', $request->incharge)->where('department_id', $request->department)->first();
        if (!$existData) {
            AssignDepartment::create([
                'incharge_id' => $request->incharge,
                'department_id' => $request->department
            ]);
        }

        return redirect()->route('admin.assign-department.index')->with('success', 'Department assigned to incharge');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $assignedDepartment = AssignDepartment::where('id', $id)->first();
        $incharges = User::where('role', 'incharge')->get();
        $departments = Department::all();

        return view('admin.assign-department.edit', compact('incharges', 'departments', 'assignedDepartment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'incharge_id' => 'required',
            'department'  => 'required'
        ]);

        $existData = AssignDepartment::where('incharge_id', $request->incharge_id)->where('department_id', $request->department)->first();
        if ($existData) {
            return back()->with('error', 'This subject is already assigned to Incharge');
        }

        $assignedDepartment = AssignDepartment::where('id', $id)->update([
            'department_id' => $request->department
        ]);

        return redirect()->route('admin.assign-department.index')->with('success', 'Edited assigned department.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
