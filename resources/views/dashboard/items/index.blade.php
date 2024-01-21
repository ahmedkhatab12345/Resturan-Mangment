@extends('layouts.dashboard.app')
@section('content') 
<div class="container">
        <h1>Item</h1>
        <table class="table" id="table_id">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">menu_id</th>
                    <th scope="col">Price</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Process</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ Str::limit($item->description, 100) }}</td>
                        <td>{{$item->menu->name}}</td>
                        <td>{{ $item->price }}</td>
                        <td><img  style="width: 90px; height: 90px;" src="{{asset('images/dashboard/items/'.$item->photo)}}"></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('items.edit', $item->id) }}" class="btn btn-outline-primary box-shadow-3">Edit</a>
                                <form action="{{ route('items.destroy', $item->id) }}" method="POST" style="display: inline-block;">
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