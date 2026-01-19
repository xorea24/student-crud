
<style>
    .student-container { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; max-width: 1000px; margin: 20px auto; }
    .header-section { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
    .add-btn { background: #6366f1; color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-weight: bold; }
    
    .list-header { display: grid; grid-template-columns: 2fr 1fr 1fr 1fr 1.5fr; padding: 15px; background: #f8fafc; color: #64748b; font-size: 0.85rem; font-weight: 600; border-bottom: 1px solid #e2e8f0; }
    .student-card { display: grid; grid-template-columns: 2fr 1fr 1fr 1fr 1.5fr; align-items: center; padding: 15px; border-bottom: 1px solid #f1f5f9; transition: background 0.2s; }
    .student-card:hover { background: #f8fafc; }
    
    .name-col { display: flex; align-items: center; gap: 12px; }
    .avatar { width: 40px; height: 40px; background: #e2e8f0; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-weight: bold; color: #475569; }
    
    .action-btns { display: flex; gap: 8px; justify-content: flex-end; }
    .btn-edit { background: #f1f5f9; color: #6366f1; padding: 6px 12px; border-radius: 6px; text-decoration: none; font-size: 0.85rem; }
    .btn-delete { background: none; border: 1px solid #fee2e2; color: #ef4444; padding: 6px; border-radius: 6px; cursor: pointer; }
    .status-badge { background: #dcfce7; color: #166534; padding: 4px 12px; border-radius: 20px; font-size: 0.75rem; font-weight: 600; }
</style>

<div style="">
        <form action="{{ route('logout') }}" method="POST" style="margin:0;">
            @csrf
            <button type="submit" style="background: none; border: 1px solid #e2e8f0; color: #64748b; padding: 10px 15px; border-radius: 8px; cursor: pointer; font-weight: 600;">
                Logout
            </button>
        </form>

<div class="student-container">
    <div class="header-section">
        <h2>Students List</h2>
        <a href="{{ route('students.create') }}" class="add-btn">+ Add New Student</a>
    </div>


    

    @if(session('success'))
        <div style="background: #dcfce7; color: #166534; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
    @endif

    <div class="list-header">
        <div>STUDENT NAME</div>
        <div>BIRTH DATE</div>
        <div>EMAIL</div>
        <div>STATUS</div>
        <div style="text-align: right;">ACTIONS</div>
    </div>

    @foreach($students as $student)
    <div class="student-card">
        <div class="name-col">
            <div class="avatar">{{ substr($student->first_name, 0, 1) }}</div>
            <div>
                <div style="font-weight: 600; color: #1e293b;">{{ $student->first_name }} {{ $student->last_name }}</div>
                <div style="font-size: 0.75rem; color: #94a3b8;">ID: #STU-{{ $student->id }}</div>
            </div>
        </div>
        <div style="color: #475569; font-size: 0.9rem;">{{ $student->date_of_birth }}</div>
        <div style="color: #475569; font-size: 0.9rem;">{{ $student->email }}</div>
        <div><span class="status-badge">● Active</span></div>
        <div class="action-btns">
            <a href="{{ route('students.show', $student->id) }}" class="btn-edit" style="color: #64748b;">View</a>
            <a href="{{ route('students.edit', $student->id) }}" class="btn-edit">Edit</a>
            <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-delete" onclick="return confirm('Are you sure?')">🗑️</button>
            </form>
        </div>
    </div>
    @endforeach
</div>

