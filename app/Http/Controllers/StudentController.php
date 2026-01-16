<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

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

    // THIS IS THE METHOD LARAVEL SAYS IS MISSING
    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'first_name'    => 'required|string|max:255',
            'middle_name'   => 'nullable|string|max:255',
            'last_name'     => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'email'         => 'required|email|unique:students,email,' . $student->id
        ]);

        $student->update($validated);
        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
} // <--- Make sure this is the VERY LAST line of your file