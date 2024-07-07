@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">{{ __('Admin Dashboard') }}</h4>
                </div>
                <div class="card-body">
                    <div class="alert alert-success" role="alert">
                        {{ __('You are logged in!') }}
                    </div>

                    <div class="row">
                        <!-- Example Card 1 -->
                        <div class="col-md-4 mb-4">
                            <div class="card text-white bg-info h-100">
                                <div class="card-body">
                                    <div class="card-body-icon">
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <div class="mr-5">Users</div>
                                </div>
                                <a class="card-footer text-white clearfix small z-1" href="#">
                                    <span class="float-left">View Details</span>
                                    <span class="float-right">
                                        <i class="fas fa-angle-right"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                        <!-- Example Card 2 -->
                        <div class="col-md-4 mb-4">
                            <div class="card text-white bg-success h-100">
                                <div class="card-body">
                                    <div class="card-body-icon">
                                        <i class="fas fa-chart-line"></i>
                                    </div>
                                    <div class="mr-5">Reports</div>
                                </div>
                                <a class="card-footer text-white clearfix small z-1" href="#">
                                    <span class="float-left">View Details</span>
                                    <span class="float-right">
                                        <i class="fas fa-angle-right"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                        <!-- Example Card 3 -->
                        <div class="col-md-4 mb-4">
                            <div class="card text-white bg-warning h-100">
                                <div class="card-body">
                                    <div class="card-body-icon">
                                        <i class="fas fa-bell"></i>
                                    </div>
                                    <div class="mr-5">Notifications</div>
                                </div>
                                <a class="card-footer text-white clearfix small z-1" href="#">
                                    <span class="float-left">View Details</span>
                                    <span class="float-right">
                                        <i class="fas fa-angle-right"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Example Table -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table"></i>
                            Example Data Table
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>John Doe</td>
                                            <td>john@example.com</td>
                                            <td>Admin</td>
                                            <td>
                                                <button class="btn btn-sm btn-primary">Edit</button>
                                                <button class="btn btn-sm btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                        <!-- More rows as needed -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
