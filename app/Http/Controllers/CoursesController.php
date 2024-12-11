<?php

namespace App\Http\Controllers;

use App\Models\Courses;  // Assuming your model is named "Course"
use App\Http\Requests\StoreCoursesRequest;
use App\Http\Requests\UpdateCoursesRequest;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('courses.index', [
            'courses' => Courses::paginate(10)  // Get all courses with pagination (10 per page)
        ]);
    }

    /**
     * Display trashed (soft-deleted) courses.
     */
    public function trashed()
    {
        $courses = Courses::onlyTrashed()->paginate(10);  // Get only soft-deleted courses with pagination
        return view('courses.trashed', [
            'courses' => $courses  // Pass the trashed courses to the view
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('courses.create');  // Show the course creation form
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCoursesRequest $request)
    {
        Courses::create($request->validated());  // Create a new course using validated data
        return redirect()->route('courses.index');  // Redirect to the courses index page
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Courses $course)
    {
        return view('courses.edit', compact('course'));  // Show the edit form with course data
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCoursesRequest $request, Courses $course)
    {
        $course->update($request->validated());  // Update the course with validated data
        return redirect()->route('courses.index');  // Redirect to the courses index page
    }

    /**
     * Soft delete the specified resource.
     */
    public function trash($id)
    {
        Courses::destroy($id);  // Soft delete the course by ID
        return redirect()->route('courses.index');  // Redirect to the courses index page after deletion
    }

    /**
     * Permanently delete the specified resource.
     */
    public function destroy($id)
    {
        $course = Courses::withTrashed()->where('id', $id)->first();  // Get trashed course by ID
        $course->forceDelete();  // Permanently delete the course
        return redirect()->route('courses.trashed');  // Redirect to the trashed courses page
    }

    /**
     * Restore the specified trashed resource.
     */
    public function restore($id)
    {
        $course = Courses::withTrashed()->where('id', $id)->first();  // Get trashed course by ID
        $course->restore();  // Restore the soft-deleted course
        return redirect()->route('courses.index');  // Redirect to the courses index page after restoration
    }
}
