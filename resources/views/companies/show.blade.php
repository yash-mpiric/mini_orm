<!-- resources/views/companies/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $company->name }}</h2>
                @if ($company->logo)
                    <img src="{{ asset('storage/' . $company->logo) }}" alt="{{ $company->name }} Logo">
                @else
                    <p>No logo available</p>
                @endif
                <p>Email: {{ $company->email }}</p>
                <p>Website: {{ $company->website }}</p>
            </div>
        </div>
    </div>
@endsection
