<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class InchargeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incharges = User::where('role', 'incharge')->get();

        return view('admin.incharges.index', compact('incharges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.incharges.create');
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
            'name'  => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required'
        ]);

        User::create([
            'name'  => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role'  => 'incharge'
        ]);

        return redirect()->route('admin.incharges.index')->with('success', 'Incharge created successfully.');
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
        $incharge = User::where('id', $id)->first();

        return view('admin.incharges.edit', compact('incharge'));
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
            'name'  => 'required',
            'email' => 'required|unique:users,email,'.$id,
            'password' => 'required'
        ]);

        User::where('id', $id)->update([
            'name'  => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role'  => 'incharge'
        ]);

        return redirect()->route('admin.incharges.index')->with('success', 'Incharge updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $incharge = User::where('id', $id)->delete();

        return redirect()->route('admin.incharges.index')->with('success', 'Incharge deleted successfully.');
    }
}
