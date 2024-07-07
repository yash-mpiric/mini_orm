@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
    
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Add Company</div>
                <div class="card-body">
                    <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="logo">Logo</label>
                            <input type="file" name="logo" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="website">Website</label>
                            <input type="url" name="website" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Add Company</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Add Employee</div>
                <div class="card-body">
                    <form action="{{ route('employees.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" name="first_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" name="last_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="company_id">Company</label>
                            <select name="company_id" class="form-control" required>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Add Employee</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Add Company (Link)</div>
                <div class="card-body">
                    <a href="{{ route('companies.create') }}" class="btn btn-primary">Add New Company</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Add Employee (Link)</div>
                <div class="card-body">
                    <a href="{{ route('employees.create') }}" class="btn btn-primary">Add New Employee</a>
                </div>
            </div>
        </div>
    </div>
@stop
