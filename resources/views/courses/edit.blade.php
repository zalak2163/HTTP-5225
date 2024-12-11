@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col">
            <h2 class="display-2">Edit Course</h2>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="{{ route('courses.update', $course->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="Coursename" class="form-label">Course Name</label>
                    <input type="text" class="form-control" id="Coursename" name="Coursename" value="{{ $course->Coursename }}">
                </div>
                <div class="mb-3">
                    <label for="Coursenumber" class="form-label">Course Number</label>
                    <input type="text" class="form-control" id="Coursenumber" name="Coursenumber" value="{{ $course->Coursenumber }}">
                </div>
                <div class="mb-3">
                    <label for="Coursefeculty" class="form-label">Course Faculty</label>
                    <input type="text" class="form-control" id="Coursefeculty" name="Coursefeculty" value="{{ $course->Coursefeculty }}">
                </div>
                <button type="submit" class="btn btn-primary">Update Course</button>
            </form>
        </div>
    </div>
@endsection
