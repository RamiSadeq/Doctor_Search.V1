<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Governorate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Subspecialty;
use App\Models\Specialty;

class UserOperationController
{
    /**
     * Display a listing of the resource.
     */
    public function  showRegisterForm()
    {
        //$specialties = Specialty::all();
    $district = District ::all();
$governorate=Governorate::all();
//dd($district);
//    $doctors = Doctor::with(['specialty', 'subspecialty'])->latest()->get();

        return view('user_reg_view',compact('district', 'governorate'));
    }
      public function register(Request $request)
    {
 $request->validate([
        'username'        => 'required|string|max:255|unique:users,username',
        'email'           => 'required|email|unique:users,email',
        'password'        => 'required|string|min:6|confirmed',
        'first_name'      => 'required|string|max:255',
        'last_name'       => 'required|string|max:255',
        'phone_number'    => 'nullable|string|max:50',
        'user_type'       => 'required|in:patient,doctor,health_focal_point',
        'governorate_id'  => 'nullable|integer|exists:governorates,id',
        'district_id'     => 'nullable|integer|exists:districts,id',
    ]);
    ///dd( $request);
    try{
   $user= User::create([
        
        'username'       => $request->username,
        'first_name'     => $request->first_name,
        'last_name'      => $request->last_name,
        'email'          => $request->email,
        'password_hash'  => Hash::make($request->password),
        'phone_number'   => $request->phone_number,
        'user_type'      => $request->user_type,
        'governorate_id' => $request->governorate_id,
        'district_id'    => $request->district_id,
    ]);
   // dd($user);

        return redirect('/user/register')->with('success', 'Registration successful. Please login.');
     } catch (\Exception $e) {
        dd($e);
        // هنا يمكن تسجيل الخطأ أو عرضه
        return redirect()->back()->withErrors(['error' => 'حدث خطأ أثناء التسجيل: ' . $e->getMessage()]);
    }
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
