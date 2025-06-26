<!-- Bootstrap 5.3 RTL -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">

<div class="d-flex justify-content-center align-items-center min-vh-100 bg-light">
    <div class="card shadow-lg rounded-4 p-4" style="width: 100%; max-width: 500px;">
        <h3 class="text-center mb-4 text-primary">تسجيل مستخدم جديد</h3>

        @if (session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('user.login') }}">
            @csrf

            
            
            <div class="mb-3">
                <label for="email" class="form-label">البريد الإلكتروني</label>
                <input name="email" type="email" class="form-control rounded-3" id="email" placeholder="example@email.com" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">كلمة المرور</label>
                <input name="password" type="password" class="form-control rounded-3" id="password" placeholder="••••••••" required>
            </div>

            
            
            <button type="submit" class="btn btn-primary w-100 rounded-3 mt-2"> تسجيل الدخول</button>
        </form>
    </div>
</div>
