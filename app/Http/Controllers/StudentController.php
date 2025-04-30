<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Image;
use App\Models\Result;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    function studentStore(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'roll' => 'required|integer',
            'section' => 'required|string|max:1',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
        ]);

        // Create and save the student
        $student = new Student();
        $student->name = $request->name;
        $student->roll = $request->roll;
        $student->section = $request->section;
        $student->phone_number = $request->phone;
        $student->address = $request->address;
        $student->save();

        // Redirect with success message
        return redirect('student_form')->with('success', 'New student added successfully!');
    }

    public function studentWithResult()
    {
        // eager‑load results and paginate
        $students = Student::with('results')->paginate(10);   // 10 rows per page
        return view('student_list', compact('students'));
    }

    function show($id)
    {
        $student = Student::findOrFail($id);
        return view('student_view', compact('student'));
    }

    function student_edit($id)
    {
        $student = Student::findOrFail($id);
        return view('student_edit', compact('student'));
    }

    function student_update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'roll' => 'required|integer',
            'section' => 'required|string|max:1',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
        ]);

        $student = Student::findOrFail($id);
        $student->name = $request->name;
        $student->roll = $request->roll;
        $student->section = $request->section;
        $student->phone_number = $request->phone;
        $student->address = $request->address;
        $student->save();

        return redirect('student_list')->with('success', 'Student updated successfully!');
    }

    function delete($id)
    {
        $student = Student::findOrFail($id);

        if ($student->delete()) {
            return redirect('student_list')->with('warning', 'Student deleted successfully!');
        } else {
            return redirect('student_list')->with('error', 'Student not deleted!');
        }
    }
    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'student_id' => 'required|exists:students,id',
        ]);

        try {
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('images', 'public');
                $image_path = basename($path);

                $image = new Image();
                $image->image_path = $image_path;
                $image->student_id = $request->student_id;
                $image->save();

                return redirect()->route('upload_image')
                    ->with('success', 'Image uploaded successfully')
                    ->with('image_path', $image_path)
                    ->with('student_id', $request->student_id);
            }
        } catch (\Exception $e) {
            if ($e->getCode() == 23000) {
                return redirect()->route('upload_image')
                    ->with('error', 'An image is already set for this student ID. Please choose a different ID.');
            }
            return redirect()->route('upload_image')
                ->with('error', 'There was an error uploading the image. Please try again.');
        }

        return redirect()->route('upload_image')
            ->with('error', 'No image uploaded. Please select an image to upload.');
    }
    public function studentWithImage()
    {
        $students = Student::with('images')->get();
        return view('upload_image', compact('students'));
    }
    public function index()
    {
        $students = Student::paginate(10);
        return view('dashboard', ['students' => $students]);
    }
    public function create()
    {
        return view('students.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'roll' => 'required|integer',
            'section' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'address' => 'nullable|string|max:255',
        ]);

        // Attempt to create a new student
        $student = Student::create([
            'name' => $request->name,
            'roll' => $request->roll,
            'section' => $request->section,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
        ]);

        // Check if creation was successful
        if ($student) {
            return redirect()->route('students.create')->with('success', 'Student added successfully.');
        } else {
            return redirect()->route('students.create')->with('error', 'Failed to add student. Please try again.');
        }
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'roll' => 'required|integer',
            'section' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'address' => 'nullable|string|max:255',
        ]);

        $student = Student::findOrFail($id);
        $student->update([
            'name' => $request->name,
            'roll' => $request->roll,
            'section' => $request->section,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
        ]);

        return redirect()->route('students.edit', ['student' => $id])->with('success', 'Student updated successfully');
    }
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('dashboard')->with('success', 'Student deleted successfully');
    }
}
