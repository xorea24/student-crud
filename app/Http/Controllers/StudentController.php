<?php

namespace App\Http\Controllers;

use App\Models\Student; 
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // List all students from MySQL
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    // Show the form to create a new student
    public function create()
    {
        return view('students.create');
    }

    // Save the new student information to MySQL
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name'    => 'required|string|max:255',
            'middle_name'   => 'nullable|string|max:255', 
            'last_name'     => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'email'         => 'required|email|unique:students,email'
        ]);

        Student::create($validated);
        return redirect()->route('students.index')->with('success', 'Student saved successfully!');
    }

    // Show the edit form for a specific student
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    // Update the information in MySQL
    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'first_name'    => 'required|string|max:255',
            'middle_name'   => 'nullable|string|max:255',
            'last_name'     => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            // Ignores the current student's ID for the unique email check
            'email'         => 'required|email|unique:students,email,' . $student->id
        ]);

        $student->update($validated);
        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    // Remove the record from MySQL (or Soft Delete if configured)
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}