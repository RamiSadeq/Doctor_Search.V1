<!-- Bootstrap 5.3 RTL -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">

<div class="d-flex justify-content-center align-items-center min-vh-100 bg-light">
    <div class="card shadow-lg rounded-4 p-4" style="width: 100%; max-width: 500px;">
        <h3 class="text-center mb-4 text-primary">تسجيل مستخدم جديد</h3>

        @if (session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('user.reg') }}">
            @csrf

            <div class="mb-3">
                <label for="first_name" class="form-label">الاسم الاول</label>
                <input name="first_name" type="text" class="form-control rounded-3" id="first_name" placeholder="أدخل اسمك" required>
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">الاسم الاخير</label>
                <input name="last_name" type="text" class="form-control rounded-3" id="last_name" placeholder="أدخل اسمك" required>
            </div>
             <div class="mb-3">
                <label for="username" class="form-label">اسم المستخدم</label>
                <input name="username" type="text" class="form-control rounded-3" id="username" placeholder="أدخل اسمك" required>
            </div>
            <div class=" mb-3">
                <label for="user_type" class="form-label">نوع المستخدم</label>
                <select name="user_type" class="form-control" required>
                    <option value="patient">مريض</option>
                    <option value="doctor">طبيب</option>
                    <option value="health_focal_point">موظف نظام</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="governorate_id" class="form-label">المحافظة</label>
                <select name="governorate_id" class="form-control" required>
                    <option value="">Select</option>
                    @foreach($governorate as $gov)
                    <option value="{{ $gov->id }}">{{ $gov->governorate_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class=" mb-3">
            <label for="district_id" class="form-label">المنطقة</label>
            <select name="district_id" class="form-control" required>
                    <option value="">Select</option>
                    @foreach($district as $dist)
                        <option value="{{ $dist->id }}">{{ $dist->district_name }}</option>
                     @endforeach
            </select>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">البريد الإلكتروني</label>
                <input name="email" type="email" class="form-control rounded-3" id="email" placeholder="example@email.com" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">كلمة المرور</label>
                <input name="password" type="password" class="form-control rounded-3" id="password" placeholder="••••••••" required>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">تأكيد كلمة المرور</label>
                <input name="password_confirmation" type="password" class="form-control rounded-3" id="password_confirmation" placeholder="أعد إدخال كلمة المرور" required>
            </div>

            <button type="submit" class="btn btn-primary w-100 rounded-3 mt-2">إنشاء حساب</button>
        </form>
    </div>
</div>
