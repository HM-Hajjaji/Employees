@extends("layouts.app")
@section("content")
    @if(session()->has('msg_add'))
        <div class="alert alert-success m-2 shadow">{{session('msg_add')}}</div>
    @elseif(session()->has('msg_destroy'))
        <div class="alert alert-success m-2 shadow">{{session('msg_destroy')}}</div>
    @elseif(session()->has('msg_restore'))
        <div class="alert alert-success m-2 shadow">{{session('msg_restore')}}</div>
    @elseif(session()->has('msg_update'))
        <div class="alert alert-success m-2 shadow">{{session('msg_update')}}</div>
    @endif
    @if($employees->isEmpty())
        <div class="alert alert-light m-2" role="alert">
            There are no employees on the list
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
                <table class="table table-striped table-hover text-center ">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Photo</th>
                        <th>Full name</th>
{{--                        <th>Registration number</th>--}}
                        <th>Department</th>
{{--                        <th>Hire date</th>--}}
{{--                        <th>Address</th>--}}
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($employees as $item)
                        <tr >
                            <td class="align-middle">{{$item->id}}</td>
                            <td class="align-middle d-flex justify-content-center"><img class="img-md img-circle img-bordered" src="{{asset('/storage/'.$item->photo)}}" alt="employee photo"></td>
                            <td class="align-middle">{{$item->full_name}}</td>
{{--                            <td>{{$item->registration_number}}</td>--}}
                            <td class="align-middle">{{$item->department}}</td>
{{--                            <td>{{$item->hire_date}}</td>--}}
{{--                            <td>{{$item->address}}</td>--}}
                            <td class="align-middle">{{$item->phone}}</td>
                            <td class="text-right py-0 align-middle">
                                <div class="btn-group btn-group-sm">
                                    <a href="{{route('employee.show',$item->slag)}}" class="btn btn-info" title="Show"><i class="fas fa-eye"></i></a>
                                    <a href="{{route('employee.edit',$item->slag)}}" class="btn btn-success" title="edit"><i class="fas fa-edit"></i></a>
                                    <form action="{{route('employee.destroy',$item->slag)}}" method="post" class="btn btn-danger">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" title="delete" ><i class="fa fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{$employees->links()}}
            </div>
        </div>
    @endif
@endsection
