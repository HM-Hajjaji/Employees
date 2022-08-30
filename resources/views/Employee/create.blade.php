@extends("layouts.app")
@section("content")
    <div class="container-sm card card-primary">
        <div class="card-header">
            <h3 class="card-title">Create new Employee</h3>
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

        <form action="{{route('employee.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            @method("POST")
            <div class="card-body">
                <div class="form-group">
                    <label for="full_name">Full name</label>
                    <input type="text" class="form-control" id="full_name" placeholder="Full name" name="full_name" value="{{old('full_name')}}">
                </div>
                <div class="form-group">
                    <label for="registration_number">Registration number</label>
                    <input type="number" class="form-control" id="registration_number" placeholder="Registration number" name="registration_number" value="{{old('registration_number')}}">
                </div>
                <div class="form-group">
                    <label for="department">Department</label>
                    <input type="text" class="form-control" id="department" placeholder="Department" name="department" value="{{old('department')}}">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea class="form-control" rows="3" placeholder="Address" style="height: 86px;" id="address" name="address">{{old('address')}}</textarea>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="number" class="form-control" id="phone" placeholder="Phone" name="phone" value="{{old('phone')}}">
                </div>
                <div class="form-group">
                    <label for="photo">Photo</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="photo" name="photo">
                            <label class="custom-file-label" for="photo">Choose file</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
@endsection
