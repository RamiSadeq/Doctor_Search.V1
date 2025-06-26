@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>قائمة الأطباء</h3>
        <a href="{{ route('doctors.create') }}" class="btn btn-primary">➕ إضافة طبيب</a>
    </div>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>الاسم</th>
                <th>الجنس</th>
                <th>التخصص</th>
                <th>الفرعي</th>
                <th>الدرجة</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($doctors as $doctor)
                <tr>
                    <td>{{ $doctor->doctor_name }}</td>
                    <td>{{ $doctor->gender }}</td>
                    <td>{{ $doctor->specialty->name ?? '---' }}</td>
                    <td>{{ $doctor->subspecialty->name ?? '---' }}</td>
                    <td>{{ $doctor->qualification_degree ?? '---' }}</td>
                    <td>
                        <a href="{{ route('doctors.edit', $doctor->id) }}" class="btn btn-warning btn-sm">✏️ تعديل</a>
                        <form action="{{ route('doctors.destroy', $doctor->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('هل أنت متأكد من الحذف؟');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">🗑️ حذف</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">لا توجد بيانات</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
