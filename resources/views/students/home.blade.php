<h1>Welcome Home, {{ Auth::user()->name }}!</h1>
<p>You are now logged in to the Student CRUD system.</p>

<a href="{{ route('students.index') }}">Go to Student Management</a>

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>