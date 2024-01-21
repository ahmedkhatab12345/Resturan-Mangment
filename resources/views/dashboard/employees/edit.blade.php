@extends('layouts.dashboard.app')
@section('content') 
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0">Update Employee</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('employees.update',$employees->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="mb-3 col-6">
                                    <label for="name" class="form-label text-primary">Name</label>
                                    <input type="text" value="{{$employees->name}}" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter  name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="photo" class="form-label text-primary">Photo</label>
                                    <img  style="width: 190px; height: 120px;" src="{{asset('images/dashboard/employees/'.$employees->photo)}}">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label text-primary">Position</label>
                                <select name="position" id="position" class="form-control">
                                    <option value="manager" {{ old('position', $employees->position) == 'manager' ? 'selected' : '' }}>Manager</option>
                                    <option value="chef" {{ old('position', $employees->position) == 'chef' ? 'selected' : '' }}>Chef</option>
                                    <option value="waiter" {{ old('position', $employees->position) == 'waiter' ? 'selected' : '' }}>Waiter</option>
                                    <option value="cashier" {{ old('position', $employees->position) == 'cashier' ? 'selected' : '' }}>Cashier</option>
                                    <option value="cleaner" {{ old('position', $employees->position) == 'cleaner' ? 'selected' : '' }}>Cleaner</option>
                                    <option value="bartender" {{ old('position', $employees->position) == 'bartender' ? 'selected' : '' }}>Bartender</option>
                                    <option value="delivery_driver" {{ old('position', $employees->position) == 'delivery_driver' ? 'selected' : '' }}>Delivery Driver</option>
                                    <option value="dishwasher" {{ old('position', $employees->position) == 'dishwasher' ? 'selected' : '' }}>Dishwasher</option>
                                    <option value="security_guard" {{ old('position', $employees->position) == 'security_guard' ? 'selected' : '' }}>Security Guard</option>
                                    <option value="receptionist" {{ old('position', $employees->position) == 'receptionist' ? 'selected' : '' }}>Receptionist</option>
                                    <option value="marketing_specialist" {{ old('position', $employees->position) == 'marketing_specialist' ? 'selected' : '' }}>Marketing Specialist</option>
                                </select>
                                @error('position')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="salary" class="form-label text-primary">Salary</label>
                                <div class="input-group ">
                                    <span class="input-group-text" id="price-addon">$</span>
                                    <input type="text" value="{{$employees->salary}}" name="salary" class="form-control @error('salary') is-invalid @enderror" id="salary"  placeholder="salary" required>
                                </div>
                                @error('salary')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="photo" class="form-label text-primary">Photo</label>
                                <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror">
                                @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">Update Employee</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

