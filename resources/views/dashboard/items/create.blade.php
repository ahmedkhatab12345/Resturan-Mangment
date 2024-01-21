@extends('layouts.dashboard.app')
@section('content') 
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0 text-center">Add New Item</h3>
                </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('items.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 col-6">
                                <label for="name" class="form-label text-primary">Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"  placeholder="Enter name of item" value="{{ old('name') }}" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label text-primary">Description</label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Enter description" rows="4" required>{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="mb-3 col-6">
                                    <label for="price" class="form-label text-primary">Price</label>
                                    <div class="input-group ">
                                        <span class="input-group-text" id="price-addon">$</span>
                                        <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="00.00" value="{{ old('price') }}" required>
                                    </div>
                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="menu_id" class="form-label text-primary">Menu ID</label>
                                    <select name="menu_id" class="form-control @error('menu_id') is-invalid @enderror" id="menu_id" required>
                                        <option value="" selected disabled>Select Menu ID</option>
                                        @foreach($menus as $menu)
                                            <option value="{{ $menu->id }}" {{ old('menu_id') == $menu->id ? 'selected' : '' }}>{{ $menu->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('menu_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-4">
                                    <label for="photo" class="form-label text-primary">Photo</label>
                                    <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror">
                                    @error('photo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">Add Item</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
