<style>
    /**
     * 1. BACKGROUND ANIMATION
     * Creates a slow-moving, cinematic gradient to give the login page a modern, high-end feel.
     * The background cycles through dark navy and indigo hues.
     */
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
        /* Primary brand color pulled from config/settings.php */
        background: linear-gradient(-45deg, #020617, #0f172a, {{ config('settings.theme_color', '#1e1b4b') }}, #020617);
        background-size: 400% 400%;
        animation: gradientFlow 15s ease infinite;
        overflow: hidden;
    }

    /**
     * 2. THE LOGIN CARD CONTAINER
     * Uses relative positioning and overflow hidden to clip the rotating 'border light' effect.
     * The 3px padding creates the 'track' for the animated border light.
     */
    .login-card {
        position: relative;
        width: 100%;
        max-width: 400px;
        padding: 3px; 
        border-radius: 32px;
        overflow: hidden; 
        background: rgba(255, 255, 255, 0.05);
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /**
     * 3. THE ROTATING LIGHT EFFECT
     * A pseudo-element rotating 360deg behind the content to create the glowing border.
     */
    .login-card::before {
        content: '';
        position: absolute;
        width: 150%;
        height: 150%;
        /* Theme color applied to the conic-gradient via Laravel config */
        background: conic-gradient({{ config('settings.theme_color', '#6366f1') }}, transparent, transparent, {{ config('settings.theme_color', '#6366f1') }});
        animation: rotateLight 4s linear infinite;
        z-index: 0;
    }

    @keyframes rotateLight {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    /**
     * 4. THE INNER CARD
     * Sits on top of the rotating light. 
     * Backdrop-filter adds a "Glassmorphism" blur effect for depth.
     */
    .card-content {
        position: relative;
        width: 100%;
        background: #0f172a; 
        border-radius: 30px;
        padding: 45px;
        z-index: 1;
        backdrop-filter: blur(20px);
    }

    /* Form UI Components */
    .form-group { margin-bottom: 24px; text-align: left; }
    
    .form-group label { 
        display: block; 
        margin-bottom: 8px; 
        font-size: 0.75rem; 
        color: #94a3b8; 
        text-transform: uppercase; 
        letter-spacing: 1px; 
    }
    
    .form-group input { 
        width: 100%; 
        padding: 12px; 
        background: rgba(0,0,0,0.3); 
        border: 1px solid rgba(255,255,255,0.1); 
        border-radius: 12px; 
        color: white; 
        outline: none; 
        transition: 0.3s;
        box-sizing: border-box;
    }
    
    .form-group input:focus { 
        border-color: {{ config('settings.theme_color', '#6366f1') }}; 
        box-shadow: 0 0 10px rgba(99, 102, 241, 0.2); 
    }

    .btn-login { 
        width: 100%; 
        background: {{ config('settings.theme_color', '#6366f1') }}; 
        color: white; 
        border: none; 
        padding: 14px; 
        border-radius: 12px; 
        font-weight: bold; 
        cursor: pointer;
        transition: 0.3s;
    }
    
    .btn-login:hover { 
        filter: brightness(1.1); 
        transform: translateY(-2px); 
    }
</style>

<div class="login-card">
    <div class="card-content">
        <h2 style="color: white; margin-top: 0; letter-spacing: -1px;">
            {{ config('app.name') }}
        </h2>
        
        <p style="color: #64748b; margin-bottom: 30px; font-size: 0.9rem;">
            {{ config('settings.login_description', 'Access the Student Management System') }}
        </p>

        <form action="{{ route('login.submit') }}" method="POST">
            @csrf
            
            @if ($errors->any())
                <div style="color: #ef4444; font-size: 0.8rem; margin-bottom: 15px; background: rgba(239, 68, 68, 0.1); padding: 10px; border-radius: 8px;">
                    {{ $errors->first() }}
                </div>
            @endif

            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" placeholder="admin@example.com" value="{{ old('email') }}" required>
            </div>
            
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="••••••••" required>
            </div>
            
            <button type="submit" class="btn-login">Continue</button>
        </form>
    </div>
</div>