<h2>Add New Student</h2>

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li style="color:red;">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('students.store') }}">
    @csrf
    <label>First Name:</label>
    <input type="text" name="first_name" value="{{ old('first_name') }}"><br>

    <label>Middle Name:</label>
    <input type="text" name="middle_name" value="{{ old('middle_name') }}"><br>

    <label>Last Name:</label>
    <input type="text" name="last_name" value="{{ old('last_name') }}"><br>

    <label>Date of Birth:</label>
    <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}"><br>

    <label>Email:</label>
    <input type="email" name="email" value="{{ old('email') }}"><br>

    <button type="submit">Save</button>
</form>
