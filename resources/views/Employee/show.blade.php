@extends('layouts.app')
@section('content')
    <div class="card m-3">
        <div class="card-header bg-info row align-items-center">
            <div class="col-6">
                <p class="lead"><strong>Hire Date : </strong> {{$employee->hire_date}}</p>
            </div>
            <div class="col-6 d-flex justify-content-end" >
                <img src="{{asset('/storage/'.$employee->photo)}}" class="rounded w-50 shadow img-bordered" alt="employee">
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                    <tr>
                        <th style="width:50%">Full name</th>
                        <td>{{$employee->full_name}}</td>
                    </tr>
                    <tr>
                        <th style="width:50%">Registration number</th>
                        <td>{{$employee->registration_number}}</td>
                    </tr>
                    <tr>
                        <th style="width:50%">Department</th>
                        <td>{{$employee->department}}</td>
                    </tr>
                    <tr>
                        <th style="width:50%">Address</th>
                        <td>{{$employee->address}}</td>
                    </tr>
                    <tr>
                        <th style="width:50%">Phone</th>
                        <td>{{$employee->phone}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{route('employee.edit',$employee->slag)}}" class="btn btn-success" title="edit">Edit <i class="fas fa-edit"></i></a>
            <form action="{{route('employee.destroy',$employee->slag)}}" method="post" class="btn btn-danger">
                @csrf
                @method('DELETE')
                <button type="submit" title="delete" >Delete <i class="fa fa-trash"></i></button>
            </form>
        </div>
        <div class="row justify-content-center">
            <a href="{{route('employee.all')}}" title="Back to list">
                <i class="fas fa-arrow-circle-left"></i>
            </a>
        </div>
    </div>
@endsection
