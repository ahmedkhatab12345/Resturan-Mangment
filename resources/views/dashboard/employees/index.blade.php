@extends('layouts.dashboard.app')
@section('content') 
<div class="container">
    <h1>Employees</h1>
    
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Position</th>
                <th scope="col">Salary</th>
                <th scope="col">Joined At</th>
                <th scope="col">Photo</th>
                <th scope="col">Process</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->position }}</td>
                    <td>{{ $employee->salary }}</td>
                    <td>{{ $employee->created_at }}</td>
                    <td><img  style="width: 90px; height: 90px;" src="{{asset('images/dashboard/employees/'.$employee->photo)}}"></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-outline-primary box-shadow-3">Edit</a>
                            <form action="{{route('employees.destroy',$employee->id)}}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger box-shadow-3">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
        <div class="col-md-6" style="margin-bottom: 25px;">        
            <a href="{{ route('employees.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Employee </a>
        </div>
</div>
@endsection
