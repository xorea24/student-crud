<h2>Students List</h2>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<a href="{{ route('students.create') }}">Add New Student</a>

<table border="1" cellpadding="5" style="margin-top: 10px; border-collapse: collapse;">
<tr>
    <th>First Name</th>
    <th>Middle Name</th>
    <th>Last Name</th>
    <th>Date of Birth</th>
    <th>Email</th>
    <th>Actions</th> </tr>

@foreach($students as $student)
<tr>
    <td>{{ $student->first_name }}</td>
    <td>{{ $student->middle_name }}</td>
    <td>{{ $student->last_name }}</td>
    <td>{{ $student->date_of_birth }}</td>
    <td>{{ $student->email }}</td>
    <td>
        <a href="{{ route('students.show', $student->id) }}">View</a> |

        <a href="{{ route('students.edit', $student->id) }}">Edit</a> |

        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" style="color:red; border:none; background:none; cursor:pointer; text-decoration:underline; padding:0;" onclick="return confirm('Are you sure you want to delete this student?')">
                Delete
            </button>
        </form>
    </td>
</tr>
@endforeach
</table>