<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the students.
     */
public function index()
{
   // No statistics needed, just return the simple dashboard view
    return view('dashboard');
}
    

    /**
     * Show the form for creating a new student.
     */
    public function create()
    {
        // Display the form located at resources/views/students/create.blade.php
        return view('students.create');
    }

    

    /**
     * Store a newly created student in the database.
     */
    public function store(Request $request)
    {
        // Validate the incoming form data
        $validated = $request->validate([
            'first_name'    => 'required|string|max:255',
            'middle_name'   => 'nullable|string|max:255', 
            'last_name'     => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'email'         => 'required|email|unique:students,email'
        ]);

        // Create the student record using the validated data
        Student::create($validated);
        
        // Redirect back to the list with a success message
        return redirect()->route('students.index')->with('success', 'Student saved successfully!');
    }

    /**
     * Display the specified student.
     */
    public function show($id)
    {
        // Find the student by ID or throw a 404 error if not found
        $student = Student::findOrFail($id);
        
        // Show the individual student profile view
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified student.
     */
    public function edit(Student $student)
    {
        // Pass the existing student object to the edit form
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified student in the database.
     */
    public function update(Request $request, Student $student)
    {
        // Validate data, ensuring the unique email check ignores the current student's ID
        $validated = $request->validate([
            'first_name'    => 'required|string|max:255',
            'middle_name'   => 'nullable|string|max:255',
            'last_name'     => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'email'         => 'required|email|unique:students,email,' . $student->id
        ]);

        // Update the database record
        $student->update($validated);
        
        // Redirect to list with success message
        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified student from the database.
     */
    public function destroy(Student $student)
    {
        // Delete the student record
        $student->delete();
        
        // Redirect back to the list
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}

