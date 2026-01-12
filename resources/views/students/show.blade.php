<h2>Student Details</h2>

<table border="1" cellpadding="10">

    <tr>
        <th>Full Name</th>
        <td>{{ $student->first_name }}</td>
    </tr>
     <th>Middle Name</th>
     <td>{{ $student->middle_name }}</td>
    <tr>
        <th>Last Name</th>
     <td>{{ $student->last_name }}</td>
    <tr>
        <th>Email</th>
        <td>{{ $student->email }}</td>
    </tr>
    <tr>
        <th>Date of Birth</th>
        <td>{{ $student->date_of_birth }}</td>
    </tr>
</table>

<br>
<a href="{{ route('students.index') }}">Back to List</a>