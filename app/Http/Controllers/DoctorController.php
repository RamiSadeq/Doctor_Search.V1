<?php

namespace App\Http\Controllers;
use App\Models\Subspecialty;
use App\Models\Specialty;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController
{
   public function index()
    {
        $doctors = Doctor::with(['specialty', 'subspecialty'])->get();
        print_r($doctors); 
               return view('doctors.index', compact('doctors'));
    }
     public function create()
    {
     $specialties = Specialty::all();
    $subspecialties = Subspecialty::all();
    $doctors = Doctor::with(['specialty', 'subspecialty'])->latest()->get();

    return view('doctors.create', compact('specialties', 'subspecialties', 'doctors'));}
     public function store(Request $request)
    {
        $request->validate([
            'doctor_name' => 'required',
            'gender' => 'required',
            'specialty_id' => 'required|exists:specialties,id',
            'subspecialty_id' => 'nullable|exists:subspecialties,id',
        ]);

        Doctor::create($request->all());

        return redirect()->route('doctors.index')->with('success', 'تمت إضافة الطبيب بنجاح');
    }
      public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);
        $specialties = Specialty::all();
        $subspecialties = Subspecialty::all();
        return view('doctors.edit', compact('doctor', 'specialties', 'subspecialties'));
    }
    
    public function update(Request $request, $id)
    {
        $doctor = Doctor::findOrFail($id);

        $request->validate([
            'doctor_name' => 'required',
            'gender' => 'required',
            'specialty_id' => 'required|exists:specialties,id',
            'subspecialty_id' => 'nullable|exists:subspecialties,id',
        ]);

        $doctor->update($request->all());

        return redirect()->route('doctors.index')->with('success', 'تم التحديث بنجاح');
    }
        public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();
        return redirect()->route('doctors.index')->with('success', 'تم الحذف بنجاح');
    }

}
