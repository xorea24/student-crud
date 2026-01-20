<style>
    /* 1. Background Animation */
    @keyframes gradientFlow {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    body { 
        margin: 0;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Inter', sans-serif;
        background: linear-gradient(-45deg, #020617, #0f172a, #1e1b4b, #020617);
        background-size: 400% 400%;
        animation: gradientFlow 15s ease infinite;
        overflow: hidden;
    }

    /* 2. The Login Card Container */
    .login-card {
        position: relative;
        width: 100%;
        max-width: 400px;
        padding: 3px; /* This creates the space for the "border" */
        border-radius: 32px;
        overflow: hidden; /* Clips the rotating light */
        background: rgba(255, 255, 255, 0.05);
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* 3. The Rotating Light Effect */
    .login-card::before {
        content: '';
        position: absolute;
        width: 150%;
        height: 150%;
        /* The rolling light colors: Indigo to Transparent */
        background: conic-gradient(#6366f1, transparent, transparent, #6366f1);
        animation: rotateLight 4s linear infinite;
        z-index: 0;
    }

    @keyframes rotateLight {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    /* 4. The Inner Card (The actual content area) */
    .card-content {
        position: relative;
        width: 100%;
        background: #0f172a; /* Solid dark background to hide the center of the light */
        border-radius: 30px;
        padding: 45px;
        z-index: 1;
        backdrop-filter: blur(20px);
    }

    /* Input Styles matching your theme */
    .form-group { margin-bottom: 24px; text-align: left; }
    .form-group label { display: block; margin-bottom: 8px; font-size: 0.75rem; color: #94a3b8; text-transform: uppercase; letter-spacing: 1px; }
    .form-group input { 
        width: 100%; padding: 12px; background: rgba(0,0,0,0.3); 
        border: 1px solid rgba(255,255,255,0.1); border-radius: 12px; 
        color: white; outline: none; transition: 0.3s;
    }
    .form-group input:focus { border-color: #000122; box-shadow: 0 0 10px rgba(53, 55, 170, 0.2); }

    .btn-login { 
        width: 100%; background: #6366f1; color: white; border: none; 
        padding: 14px; border-radius: 12px; font-weight: bold; cursor: pointer;
        transition: 0.3s;
    }
    .btn-login:hover { background: #4f46e5; transform: translateY(-2px); }
</style>

<div class="login-card">
    <div class="card-content">
        <h2 style="color: white; margin-top: 0; letter-spacing: -1px;">Sign in</h2>
        <p style="color: #64748b; margin-bottom: 30px; font-size: 0.9rem;">Access the Student Management System</p>

        <form action="{{ route('login.submit') }" method="POST">
            @csrf
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="admin@example.com" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="••••••••" required>
            </div>
            <button type="submit" class="btn-login">Continue</button>
        </form>
    </div>
</div>
