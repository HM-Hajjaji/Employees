<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use Illuminate\Support\Str;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $employees = Employee::latest()->paginate(7);
        return view("Employee.index",compact("employees"));
    }


    public function create()
    {
        return view("Employee.create");
    }

    public function store(StoreEmployeeRequest $request)
    {
        if ($request->hasFile("photo"))
        {
            $photo = time() ."_". $request->file('photo')->getClientOriginalName();
            $path = $request->photo->storeAs('Employees', $photo, 'public');
            Employee::create([
                'full_name'=> $request->full_name,
                'photo'=> $path,
                'slag'=> Str::slug($request->full_name,"-"),
                'registration_number'=> $request->registration_number,
                'department'=> $request->department,
                'address'=> $request->address,
                'phone'=> $request->phone
            ]);
        }
        else
        {
            Employee::create([
                'full_name'=> $request->full_name,
                'slag'=> Str::slug($request->full_name,"-"),
                'registration_number'=> $request->registration_number,
                'department'=> $request->department,
                'address'=> $request->address,
                'phone'=> $request->phone
            ]);
        }
        return redirect()->route('employee.all')->with(['msg_add'=> 'Create employee successful']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmployeeRequest  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
