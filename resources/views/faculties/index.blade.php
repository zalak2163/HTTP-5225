@extends('layouts.admin')
@section('content')

<div class="container my-5">
    <div class="row mb-4">
        <div class="col text-center">
            <h1 class="display-4 text-primary">All Faculty Members</h1>
        </div>
    </div>
    <div class="row">
        @foreach ($faculties as $faculty)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $faculty->name }}</h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection