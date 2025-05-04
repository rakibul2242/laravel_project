<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Result;
use App\Models\Course;

class ResultController extends Controller
{
    public function index()
    {
        $results = Result::with(['student', 'course.teacher'])->paginate(10);

        return view('results.index', compact('results'));
    }

    public function create()
    {
        $students = Student::all();
        $courses = Course::all();
        return view('results.create', compact('students', 'courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'result' => 'required|in:A+,A,A-,B+,B,B-,C+,C,C-,D,F',
        ]);

        // Check if result already exists for this student and course
        $exists = Result::where('student_id', $request->student_id)
            ->where('course_id', $request->course_id)
            ->exists();

        if ($exists) {
            return redirect()->back()->with('error', 'This student already has a result for this course.');
        }

        Result::create($request->only('student_id', 'course_id', 'result'));

        return redirect()->route('results.create')->with('success', 'Result added successfully.');
    }

    public function edit($id)
    {
        $result = Result::with(['student', 'course.teacher'])->findOrFail($id);
        return view('results.edit', compact('result'));
    }

    public function update(Request $request, $id)
    {
        // Validate the result input
        $request->validate([
            'result' => ['required', 'in:A+,A,A-,B+,B,B-,C+,C,C-,D,F'],
        ]);

        // Find the result entry
        $result = Result::findOrFail($id);

        // Update the result grade
        $result->result = $request->result;
        $result->save();

        // Redirect with success message
        return redirect()->route('results.index')->with('success', 'Result updated successfully.');
    }

    public function destroy($id)
    {
        $result = Result::findOrFail($id);
        $result->delete();
        return redirect()->route('results.index')->with('success_distroy', 'result deleted successfully.');
    }
}
