@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col">
        <h1 class="display-2">All Courses</h1>
    </div>
</div>

<div class="row">
    @foreach ($courses as $course)
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">{{ $course->Coursename }}</h5>
                    <p class="card-text">Course Number: {{ $course->Coursenumber }}</p>
                    <p class="card-text">Faculty: {{ $course->Coursefeculty }}</p>
                    <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-primary">
                        Edit
                    </a>
                    |
                    <a href="{{ route('courses.trash', $course->id) }}" class="btn btn-danger">
                        Delete
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>

<!-- Pagination Links -->
<div class="d-flex justify-content-center">
    {{ $courses->links() }}  <!-- Pagination for the list of courses -->
</div>

@endsection
