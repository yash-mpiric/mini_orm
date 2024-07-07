@extends('layouts.admin')

@section('title', 'Edit Employee')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">Edit Employee</div>
                <div class="card-body">
                    <form action="{{ route('employees.update', $employee) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" name="first_name" class="form-control" value="{{ $employee->first_name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" name="last_name" class="form-control" value="{{ $employee->last_name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="company_id">Company</label>
                            <select name="company_id" class="form-control" required>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}" {{ $company->id == $employee->company_id ? 'selected' : '' }}>
                                        {{ $company->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $employee->email }}">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" class="form-control" value="{{ $employee->phone }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Update Employee</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
