<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Complaint;
use App\Models\Department;
use App\Models\AssignDepartment;
use Illuminate\Support\Facades\Auth;

class ComplaintsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $complaints = Complaint::where('user_id', Auth::id())->get();

        return view('user.complaints.index', compact('complaints'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $assignDepartmentIds = AssignDepartment::pluck('department_id')->toArray();
        $departments = Department::whereIn('id', $assignDepartmentIds)->get();

        return view('user.complaints.create', compact('departments'));
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
            'department' => 'required',
            'complaint'  => 'required'
        ]);

        Complaint::create([
            'user_id'       => Auth::id(),
            'department_id' => $request->department,
            'complaint'     => $request->complaint
        ]);

        return redirect()->route('user.complaints.index')->with('success', 'Complaint created successfully.');
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
        $complaint = Complaint::where('id', $id)->first();
        $assignDepartmentIds = AssignDepartment::pluck('department_id')->toArray();
        $departments = Department::whereIn('id', $assignDepartmentIds)->get();

        return view('user.complaints.edit', compact('departments', 'complaint'));
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
            'complaint'  => 'required'
        ]);

        Complaint::where('id', $id)->update([
            'user_id'       => Auth::id(),
            'complaint'     => $request->complaint
        ]);

        return redirect()->route('user.complaints.index')->with('success', 'Complaint updated successfully.');
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
