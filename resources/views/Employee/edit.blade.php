@extends("layouts.app")
@section("content")
    <div class="container-sm card card-primary">
        <div class="card-header">
            <h3 class="card-title">Update the Employee</h3>
        </div>
        @if($errors->any())
            <div class="alert alert-danger m-2">
                <ul>
                    @foreach ($errors->all() as $message)
                        <li>{{$message}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @php

        @endphp
        <form action="{{route('employee.update',$employee->slag)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method("put")
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-4 d-flex flex-column ">
                        <div class="d-flex justify-content-center">
                            <img src="{{asset('/storage/'.$employee->photo)}}" alt="employee" class="w-75 h-100 img-circle img-bordered">
                        </div>
                        <div class="custom-file mt-1">
                            <input type="file" class="custom-file-input" id="photo" name="photo">
                            <label class="custom-file-label" for="photo">Change photo</label>
                        </div>
                    </div>
                    <div class="col-8 d-flex flex-column justify-content-center">
                        <label for="full_name">Full name</label>
                        <input type="text" class="form-control" id="full_name" placeholder="Full name" name="full_name" value="{{$employee->full_name}}">
                        <div class="form-group mt-1">
                            <label for="registration_number">Registration number</label>
                            <input type="number" class="form-control" id="registration_number" placeholder="Registration number" name="registration_number" value="{{$employee->registration_number}}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="department">Department</label>
                    <input type="text" class="form-control" id="department" placeholder="Department" name="department" value="{{$employee->department}}">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea class="form-control" rows="3" placeholder="Address" style="height: 86px;" id="address" name="address">{{$employee->address}}</textarea>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="number" class="form-control" id="phone" placeholder="Phone" name="phone" value="{{$employee->phone}}">
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{route('employee.all')}}" class="btn btn-warning">Cancel</a>
            </div>
        </form>
    </div>
@endsection
