<style>
    .form-container { font-family: 'Segoe UI', sans-serif; max-width: 600px; margin: 40px auto; background: #fff; padding: 30px; border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); border: 1px solid #e2e8f0; }
    .form-header { margin-bottom: 25px; border-bottom: 2px solid #f1f5f9; padding-bottom: 15px; }
    .form-header h2 { color: #1e293b; margin: 0; font-size: 1.5rem; }
    
    .form-group { margin-bottom: 20px; }
    .form-group label { display: block; margin-bottom: 8px; font-weight: 600; color: #475569; font-size: 0.9rem; }
    .form-group input { width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; box-sizing: border-box; font-size: 1rem; transition: border 0.2s; }
    .form-group input:focus { outline: none; border-color: #6366f1; ring: 2px solid #6366f1; }
    
    .button-group { display: flex; align-items: center; gap: 15px; margin-top: 30px; }
    .btn-update { background: #6366f1; color: white; padding: 12px 24px; border: none; border-radius: 8px; font-weight: bold; cursor: pointer; font-size: 1rem; }
    .btn-update:hover { background: #4f46e5; }
    .btn-cancel { color: #64748b; text-decoration: none; font-size: 0.95rem; }
    .btn-cancel:hover { text-decoration: underline; }
    
    .error-msg { color: #ef4444; font-size: 0.8rem; margin-top: 5px; }
</style>

<div class="form-container">
    <div class="form-header">
        <h2>Edit Student Details</h2>
    </div>

    @if(session('success'))
        <div style="background: #dcfce7; color: #166534; padding: 12px; border-radius: 6px; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT') 

        <div class="form-group">
            <label>First Name</label>
            <input type="text" name="first_name" value="{{ old('first_name', $student->first_name) }}" required>
            @error('first_name') <div class="error-msg">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Middle Name (Optional)</label>
            <input type="text" name="middle_name" value="{{ old('middle_name', $student->middle_name) }}">
        </div>

        <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="last_name" value="{{ old('last_name', $student->last_name) }}" required>
            @error('last_name') <div class="error-msg">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Date of Birth</label>
            <input type="date" name="date_of_birth" value="{{ old('date_of_birth', $student->date_of_birth) }}" required>
        </div>

        <div class="form-group">
            <label>Email Address</label>
            <input type="email" name="email" value="{{ old('email', $student->email) }}" required>
            @error('email') <div class="error-msg">{{ $message }}</div> @enderror
        </div>

        <div class="button-group">
            <button type="submit" class="btn-update">Update Student Information</button>
            <a href="{{ route('students.index') }}" class="btn-cancel">Cancel</a>
        </div>
    </form>
</div>