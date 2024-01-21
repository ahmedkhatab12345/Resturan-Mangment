@extends('layouts.dashboard.app')
@section('content') 
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0">Add New Employee</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('employees.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label text-primary">Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter  name" value="{{ old('name') }}" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                            <label for="name" class="form-label text-primary">Position</label>
                                <select name="position" id="position" class="form-control">
                                    <option value="" disabled selected>Select from the list</option>
                                    <option value="manager">Manager</option>
                                    <option value="chef">Chef</option>
                                    <option value="waiter">Waiter</option>
                                    <option value="cashier">Cashier</option>
                                    <option value="cleaner">Cleaner</option>
                                    <option value="bartender">Bartender</option>
                                    <option value="delivery_driver">Delivery Driver</option>
                                    <option value="dishwasher">Dishwasher</option>
                                    <option value="security_guard">Security Guard</option>
                                    <option value="receptionist">Receptionist</option>
                                    <option value="marketing_specialist">Marketing Specialist</option>
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
                                    <input type="text" name="salary" class="form-control @error('salary') is-invalid @enderror" id="salary"  placeholder="salary" required>
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
                                <button type="submit" class="btn btn-success">Add Employee</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

