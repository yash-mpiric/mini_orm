@extends('layouts.admin')

@section('title', 'Edit Company')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">Edit Company</div>
                <div class="card-body">
                    <form action="{{ route('companies.update', $company) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $company->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $company->email }}">
                        </div>
                        <div class="form-group">
                            <label for="logo">Logo</label>
                            <input type="file" name="logo" class="form-control">
                            @if($company->logo)
                                <img src="{{ Storage::url($company->logo) }}" alt="{{ $company->name }}" width="100" height="100">
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="website">Website</label>
                            <input type="url" name="website" class="form-control" value="{{ $company->website }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Update Company</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
