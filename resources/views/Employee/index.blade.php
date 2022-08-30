@extends("layouts.app")
@section("content")
    @if(session()->has('msg'))
        @foreach(session()->all() as $item)
            <div class="alert alert-success">{{$item}}</div>
        @endforeach
    @endif
    @if($employees->isEmpty())
        <div class="alert alert-light m-2" role="alert">
            The list is empty
        </div>
    @else
        <div class="card card-primary card-outline m-2">
            <div class="card-header">
                <h3 class="card-title">List the employees</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control" placeholder="Search employee">
                        <div class="input-group-append">
                            <div class="btn btn-primary">
                                <i class="fas fa-search"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Photo</th>
                        <th>Full name</th>
                        <th>Registration number</th>
                        <th>Department</th>
                        <th>Hire date</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($employees as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td><img src="{{asset('/storage/'.$item->photo)}}" alt="employee photo"></td>
                            <td>{{$item->full_name}}</td>
                            <td>{{$item->registration_number}}</td>
                            <td>{{$item->department}}</td>
                            <td>{{$item->hire_date}}</td>
                            <td>{{$item->address}}</td>
                            <td>{{$item->phone}}</td>
                            <td></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
