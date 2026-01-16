<style>
    .details-container { font-family: 'Segoe UI', sans-serif; max-width: 600px; margin: 40px auto; background: #fff; padding: 30px; border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); border: 1px solid #e2e8f0; }
    .details-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; border-bottom: 2px solid #f1f5f9; padding-bottom: 15px; }
    .details-header h2 { color: #1e293b; margin: 0; font-size: 1.5rem; }
    
    .info-row { display: flex; padding: 12px 0; border-bottom: 1px solid #f8fafc; }
    .info-label { width: 150px; font-weight: 600; color: #64748b; font-size: 0.9rem; }
    .info-value { color: #1e293b; font-weight: 500; }
    
    .button-group { display: flex; gap: 15px; margin-top: 30px; }
    .btn-back { color: #64748b; text-decoration: none; font-size: 0.95rem; display: flex; align-items: center; }
    .btn-edit { background: #6366f1; color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-weight: bold; font-size: 0.9rem; }
</style>

<div class="details-container">
    <div class="details-header">
        <h2>Student Profile</h2>
        <a href="{{ route('students.edit', $student->id) }}" class="btn-edit">Edit Profile</a>
    </div>

    <div class="info-row">
        <div class="info-label">First Name</div>
        <div class="info-value">{{ $student->first_name }}</div>
    </div>

    <div class="info-row">
        <div class="info-label">Middle Name</div>
        <div class="info-value">{{ $student->middle_name ?? 'None' }}</div>
    </div>

    <div class="info-row">
        <div class="info-label">Last Name</div>
        <div class="info-value">{{ $student->last_name }}</div>
    </div>

    <div class="info-row">
        <div class="info-label">Email</div>
        <div class="info-value" style="color: #6366f1;">{{ $student->email }}</div>
    </div>

    <div class="info-row" style="border-bottom: none;">
        <div class="info-label">Date of Birth</div>
        <div class="info-value">{{ \Carbon\Carbon::parse($student->date_of_birth)->format('M d, Y') }}</div>
    </div>

    <div class="button-group">
        <a href="{{ route('students.index') }}" class="btn-back">← Back to Students List</a>
    </div>
</div>