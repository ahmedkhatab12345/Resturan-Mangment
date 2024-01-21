@extends('layouts.dashboard.app')
@section('content') 
<div class="container">
    <h1>Menu</h1>
    
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Process</th>
            </tr>
        </thead>
        <tbody>
            @foreach($menus as $menu)
                <tr>
                    <td>{{ $menu->id }}</td>
                    <td><a href="{{route('menus.show',$menu->id)}}">{{$menu->name}}</a> </td>
                    <td>{{ Str::limit($menu->description, 100) }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-outline-primary box-shadow-3">Edit</a>
                            <form action="{{route('menus.destroy',$menu->id)}}" method="POST" style="display: inline-block;">
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
            <a href="{{ route('menus.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Menu </a>
        </div>
</div>
@endsection
