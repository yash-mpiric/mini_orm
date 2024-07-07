@extends('layouts.admin')

@section('title', 'Companies')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('companies.create') }}" class="btn btn-primary mb-3">Add Company</a>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">Companies</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Logo</th>
                                <th>Website</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($companies as $company)
                                <tr>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->email }}</td>
                                    <td><img src="{{ Storage::url($company->logo) }}" alt="{{ $company->name }}" width="50" height="50"></td>
                                    <td>{{ $company->website }}</td>
                                    <td>
                                        <a href="{{ route('companies.edit', $company) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('companies.destroy', $company) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $companies->links() }} <!-- Pagination links -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
