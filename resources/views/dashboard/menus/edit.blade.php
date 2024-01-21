@extends('layouts.dashboard.app')
@section('content') 
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0">Update Menu</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('menus.update',$menus->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label  class="form-label text-primary">Name</label>
                                <input type="text" value="{{$menus->name}}" name="name" class="form-control @error('name') is-invalid @enderror" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label  class="form-label text-primary">Description</label>
                                <input type="text" value="{{$menus->description}}" name="description" class="form-control @error('description') is-invalid @enderror" required>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                                           <div class="mb-3">
                                <button type="submit" class="btn btn-success">Update Menu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
