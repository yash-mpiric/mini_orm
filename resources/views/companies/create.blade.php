@extends('layouts.admin')

@section('title', 'Add Company')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4>Add Company</h4>
                </div>
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
                            <input type="file" name="logo" class="form-control-file">
                        </div>
                        <div class="form-group">
                            <label for="website">Website</label>
                            <input type="url" name="website" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Add Company</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
