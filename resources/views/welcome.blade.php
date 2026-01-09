<form action="{{ route('students.store') }}" method="POST">
    @csrf <input type="text" name="first_name" placeholder="First Name" required>
    
    <input type="text" name="middle_name" placeholder="Middle Name">
    
    <input type="text" name="last_name" placeholder="Last Name" required>
    <input type="date" name="date_of_birth" required>
    <input type="email" name="email" placeholder="Email" required>

    <button type="submit">Save to MySQL</button>
</form>