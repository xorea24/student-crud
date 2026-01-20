<style>
    /* Theme color from config */
    :root { --primary: {{ config('settings.theme_color', '#6366f1') }}; }
    
    body { display: flex; height: 100vh; background: #f8fafc; font-family: 'Inter', sans-serif; margin: 0; overflow: hidden; }
    
    /* Sidebar matching your Login Card's dark navy */
    .sidebar { width: 260px; background: #0f172a; color: white; padding: 25px; display: flex; flex-direction: column; box-shadow: 4px 0 10px rgba(0,0,0,0.05); }
    .sidebar h2 { margin-bottom: 30px; font-size: 1.5rem; color: white; }
    
    .nav-item { padding: 12px 15px; color: #94a3b8; text-decoration: none; display: flex; align-items: center; gap: 10px; border-radius: 12px; margin-bottom: 8px; transition: all 0.3s ease; }
    
    /* Dynamic Active State */
    .nav-item.active { background: var(--primary); color: white; font-weight: 600; box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3); }
    .nav-item:hover:not(.active) { background: rgba(255,255,255,0.05); color: white; }

    /* Content Area */
    .main-content { flex: 1; padding: 40px; overflow-y: auto; background: #f8fafc; }
    .welcome-card { background: white; padding: 50px; border-radius: 32px; border: 1px solid #e2e8f0; box-shadow: 0 10px 30px rgba(0,0,0,0.02); }
    
    .welcome-card h1 { font-size: 2.5rem; color: #0f172a; margin-top: 0; letter-spacing: -1px; }
    
    .btn-action { padding: 14px 28px; border-radius: 14px; text-decoration: none; display: inline-block; font-weight: 600; transition: 0.3s; }
    .btn-primary { background: var(--primary); color: white; }
    .btn-secondary { background: #f1f5f9; color: #475569; }
    
    .btn-action:hover { transform: translateY(-2px); filter: brightness(1.1); }

    /* Logout Button Styling */
    .btn-logout { background: none; border: 1px solid rgba(255,255,255,0.1); color: #94a3b8; width: 100%; padding: 12px; border-radius: 12px; cursor: pointer; font-weight: 600; transition: 0.3s; }
    .btn-logout:hover { background: rgba(239, 68, 68, 0.1); color: #ef4444; border-color: transparent; }
</style>

<aside class="sidebar">
    <h2 style="letter-spacing: -1.5px;">{{ config('app.name') }}</h2>
    <nav>
        <a href="{{ route('dashboard') }}" class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <span>🏠</span> Home
        </a>
        <a href="{{ route('students.index') }}" class="nav-item {{ request()->routeIs('students.index*') ? 'active' : '' }}">
            <span>👥</span> Students
        </a>
    </nav>
    
    <form action="{{ route('logout') }}" method="POST" style="margin-top: auto;">
        @csrf
        <button type="submit" class="btn-logout">
            Logout
        </button>
    </form>
</aside>

<main class="main-content">
    <div class="welcome-card">
        <h1>Welcome, {{ Auth::user()->first_name ?? 'Admin' }}!</h1>
        <p style="color: #64748b; font-size: 1.2rem; margin-bottom: 35px; line-height: 1.6; max-width: 600px;">
            You are successfully logged into <strong>{{ config('app.name') }}</strong>. 
            Manage your student records, update enrollment details, or add new students using the cozntrols below.
        </p>
        
        <div style="display: flex; gap: 15px;">
            <a href="{{ route('students.index') }}" class="btn-action btn-primary">View Student List</a>
            <a href="{{ route('students.create') }}" class="btn-action btn-secondary">+ Add New Student</a>
        </div>
    </div>
</main>