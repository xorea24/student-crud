<style>
    body { background-color: #f3f4f6; font-family: 'Segoe UI', sans-serif; display: flex; align-items: center; justify-content: center; height: 100vh; margin: 0; }
    .login-card { background: white; padding: 40px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); width: 100%; max-width: 400px; }
    .login-card h2 { margin-bottom: 20px; color: #1e293b; text-align: center; }
    .form-group { margin-bottom: 15px; }
    .form-group label { display: block; margin-bottom: 5px; font-weight: 600; color: #475569; }
    .form-group input { width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; box-sizing: border-box; }
    .btn-login { width: 100%; background: #6366f1; color: white; padding: 12px; border: none; border-radius: 8px; font-weight: bold; cursor: pointer; margin-top: 10px; }
    .error { color: #ef4444; font-size: 0.85rem; margin-bottom: 15px; text-align: center; }
</style>

<div class="login-card">
    <h2>Login</h2>

    @if($errors->any())
        <div class="error">Invalid email or password.</div>
    @endif

    <form action="{{ route('login.submit') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" required>
        </div>
        <button type="submit" class="btn-login">Sign In</button>
    </form>
</div>