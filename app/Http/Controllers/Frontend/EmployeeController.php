<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $read_emp = Employee::orderBy('name', 'asc')->get();
        return view('frontend.employee.manage',compact('read_emp'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $add_emp = new Employee;

        $add_emp->name     = $request->fname;
        $add_emp->email    = $request->email;
        $add_emp->phone    = $request->phone;
        $add_emp->address  = $request->address;

        $add_emp->save();
        return redirect()->route('employee.manage');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $edit_emp = Employee::find($id);

        if (!is_null($edit_emp)) {
            $edit_emp = Employee::where('id', $edit_emp->id)->first();
            return view('frontend.employee.edit',compact('edit_emp'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $update_emp = Employee::find($id);

        if (!is_null($update_emp)) {
            $update_emp->name     = $request->fname;
            $update_emp->email    = $request->email;
            $update_emp->phone    = $request->phone;
            $update_emp->address  = $request->address;

            $update_emp->save();
            return redirect()->route('employee.manage');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $del_emp = Employee::find($id);

        if (!is_null($del_emp)) {
            $del_emp->delete();
            return redirect()->route('employee.manage');
        }
    }
}
