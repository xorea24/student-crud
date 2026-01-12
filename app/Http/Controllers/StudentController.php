<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\Student; // IMPORT: Required to interact with the database
=======
use App\Models\Student;
>>>>>>> f1e3744 (Initial commit - Student CRUD with update and delete)
use Illuminate\Http\Request;

class StudentController extends Controller
{
<<<<<<< HEAD
    // List all students from MySQL
=======
>>>>>>> f1e3744 (Initial commit - Student CRUD with update and delete)
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

<<<<<<< HEAD
    // Show the form to create a new student
=======
>>>>>>> f1e3744 (Initial commit - Student CRUD with update and delete)
    public function create()
    {
        return view('students.create');
    }

<<<<<<< HEAD
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
=======
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'email' => 'required|email|unique:students,email'
        ]);

        Student::create($validated);

        return redirect()->route('students.index')->with('success', 'Student added successfully!');
    }

    // --- ADDED: SHOW METHOD (View) ---
    public function show(Student $student)
    {
        // This returns a view showing details of one specific student
        return view('students.show', compact('student'));
    }

    // --- ADDED: EDIT METHOD (Show Update Form) ---
    public function edit(Student $student)
    {
        // This returns the form to edit the student's information
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255', // Added for consistency
            'last_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'email' => 'required|email|unique:students,email,' . $student->id
        ]);

        $student->update($validated);
        return redirect()->route('students.edit', $student->id)->with('success', 'Student updated successfully!');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
>>>>>>> f1e3744 (Initial commit - Student CRUD with update and delete)
    }
}