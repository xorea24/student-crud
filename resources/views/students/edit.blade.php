<h2>Edit Student</h2>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif


<form action="{{ route('students.update', $student->id) }}" method="POST">
    @csrf
    @method('PUT') 

    <div>
        <label>First Name:</label><br>
        <input type="text" name="first_name" value="{{ old('first_name', $student->first_name) }}" required>
    </div><br>

    <div>
        <label>Middle Name:</label><br>
        <input type="text" name="middle_name" value="{{ old('middle_name', $student->middle_name) }}">
    </div><br>

    <div>
        <label>Last Name:</label><br>
        <input type="text" name="last_name" value="{{ old('last_name', $student->last_name) }}" required>
    </div><br>

    <div>
        <label>Date of Birth:</label><br>
        <input type="date" name="date_of_birth" value="{{ old('date_of_birth', $student->date_of_birth) }}" required>
    </div><br>

    <div>
        <label>Email:</label><br>
        <input type="email" name="email" value="{{ old('email', $student->email) }}" required>
    </div><br>

    <button type="submit" >Update Student Information</button>
    <a href="{{ route('students.index') }}">Cancel</a>
</form>