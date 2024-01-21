@extends('layouts.dashboard.app')
@section('content') 
<div class="container">
    <h1>Customers</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email_Address</th>
                <th scope="col">Joined At</th>
                <th scope="col">Process</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->created_at }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <form action="{{route('customers.destroy',$customer->id)}}" method="POST" style="display: inline-block;">
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
</div>
@endsection
