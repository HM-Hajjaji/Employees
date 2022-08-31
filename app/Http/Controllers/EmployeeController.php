<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $employees = Employee::latest()->paginate(2);
        return view("Employee.index",compact("employees"));
    }


    public function create()
    {
        return view("Employee.create");
    }

    public function store(StoreEmployeeRequest $request)
    {
        $path = "";
        if ($request->hasFile("photo"))
        {
            $photo = time() ."_". $request->file('photo')->getClientOriginalName();
            Image::make($request->file('photo'))->resize(300,300)->save(public_path('/storage/Employees/'.$photo));
            $path = 'Employees/'.$photo;
        }
        Employee::create([
            'full_name'=> $request->full_name,
            'photo'=> $path,
            'slag'=> Str::slug($request->full_name.$request->address,"-"),
            'registration_number'=> $request->registration_number,
            'department'=> $request->department,
            'address'=> $request->address,
            'phone'=> $request->phone
        ]);
        return redirect()->route('employee.all')->with(['msg_add'=> 'Create employee successful']);
    }


    public function show($slug)
    {
        $employee = Employee::where('slag',$slug)->first();
        return view('Employee.show',compact("employee"));
    }


    public function edit($slug)
    {
        $employee = Employee::where('slag',$slug)->first();
        return view('Employee.edit',compact("employee"));
    }


    public function update(UpdateEmployeeRequest $request,$slug)
    {
        $employee = Employee::where('slag',$slug)->first();
        $path = $employee->photo;
        if ($request->hasFile('photo'))
        {
            $photo = time()."_".$request->file('photo')->getClientOriginalName();
            Image::make($request->file('photo'))->resize(300,300)->save(public_path('/storage/Employees/'.$photo));
            $path = 'Employees/'.$photo;
            Storage::disk('public')->delete($employee->photo);
        }
        $employee->full_name = $request->full_name;
        $employee->photo= $path;
        $employee->slag = Str::slug($request->full_name.$request->address,"-");
        $employee->registration_number= $request->registration_number;
        $employee->department= $request->department;
        $employee->address= $request->address;
        $employee->phone= $request->phone;
        $employee->save();
        return redirect()->route('employee.all')->with(['msg_update'=> 'updated employee successful']);
    }

    public function destroy($slug)
    {
        $emp= Employee::where('slag',$slug)->first();
        $emp->delete();
        return redirect()->route('employee.all')->with(['msg_destroy'=> 'delete employee successful']);
    }
    public function trashed()
    {
        $employees = Employee::onlyTrashed()->latest()->paginate(2);
        return view("Employee.trashed",compact("employees"));

    }
    public function force_trashed($slug)
    {
        $employee = Employee::withTrashed()->where('slag',$slug)->first();
        Storage::disk('public')->delete($employee->photo);
        $employee->forceDelete();
        return redirect()->route('employee.trashed')->with(['msg_force_delete'=> 'delete employee successful']);
    }
    public function restore($slug)
    {
        $employee = Employee::withTrashed()->where('slag',$slug)->restore();
        return redirect()->route('employee.all')->with(['msg_restore'=> 'Restore employee successful']);
    }

}
