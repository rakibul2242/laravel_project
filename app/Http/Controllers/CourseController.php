<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // Display all courses
    public function index()
    {
        $courses = Course::with('teacher')->paginate(10);
        return view('courses.index', compact('courses'));
    }

    // Show form to create a new course
    public function create()
    {
        $teachers = Teacher::all();
        return view('courses.create', compact('teachers'));
    }

    // Store new course
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'code' => 'required|string|max:20|unique:courses',
            'description' => 'nullable|string',
            'credit_hours' => 'required|integer|min:1|max:6',
            'semester' => 'required|string|max:20',
            'level' => 'required|string|max:50',
            'department' => 'required|string|max:100',
            'teacher_id' => 'required|exists:teachers,id',
        ]);

        Course::create($request->all());

        return redirect()->route('courses.index')->with('success', 'Course added successfully!');
    }

    // Show form to edit course
    public function edit($id)
    {
        $course = Course::findOrFail($id);
        $teachers = Teacher::all();
        return view('courses.edit', compact('course', 'teachers'));
    }

    // Update existing course
    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'code' => 'required|integer|max:99999999|unique:courses,code,' . $course->id,
            'description' => 'nullable|string',
            'credit_hours' => 'required|integer|min:1|max:6',
            'semester' => 'required|string|max:20',
            'level' => 'required|string|max:20',
            'department' => 'required|string|max:20',
            'teacher_id' => 'required|exists:teachers,id',
        ]);

        $course->update($request->all());

        return redirect()->route('courses.index')->with('success', 'Course updated successfully!');
    }

    // Delete a course
    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Course deleted successfully!');
    }
}
