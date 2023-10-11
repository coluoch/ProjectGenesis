<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User as Authenticatable;

class DoctorController extends Controller
{

    public function __construct()
    {
        $this->middleware('doctor')->except(['index', 'show']);  // Apply 'doctor' middleware to all methods except 'index' and 'show'
        // Or
        // $this->middleware('doctor')->only(['profile', 'updateProfile']);  // Apply 'doctor' middleware only to 'profile' and 'updateProfile' methods
    }

    /**
     * Display a listing of doctors.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $doctors = User::where('role', 'doctor')->get();
        return view('doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new doctor.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('doctors.create');
    }

    /**
     * Store a newly created doctor in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'specialization' => 'required',
        ]);

        $validatedData['role'] = 'doctor';
        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        return redirect()->route('doctors.index')->with('success', 'Doctor created successfully.');
    }

    /**
     * Display the specified doctor.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $doctor = User::where('role', 'doctor')->findOrFail($id);
        return view('doctors.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified doctor.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $doctor = User::where('role', 'doctor')->findOrFail($id);
        return view('doctors.edit', compact('doctor'));
    }

    /**
     * Update the specified doctor in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'specialization' => 'required',
        ]);

        $doctor = User::where('role', 'doctor')->findOrFail($id);
        $doctor->update($validatedData);

        return redirect()->route('doctors.index')->with('success', 'Doctor updated successfully.');
    }

    public function profile() {
        $doctor = auth()->user();
        return view('doctors.profile', compact('doctor'));
    }
    
    public function updateProfile(Request $request) {
        $user = auth()->user();
    
        // Check if the user is not null and is an instance of the User model
        if (!$user || !$user instanceof User) {
            return back()->with('error', 'User not authenticated or unexpected data type.');
        }
    
        // Check if the user is a doctor
        if (!$user->isDoctor()) {
            return back()->with('error', 'User is not a doctor.');
        }
    
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            'specialization' => 'required',
            // ... any other fields you want doctors to update
        ]);
    
        // Update the basic user details
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->save();
    
        // Update the doctor details
        $doctorDetails = $user->doctorDetails; // This fetches the doctor details using the relationship
    
        if ($doctorDetails) {
            $doctorDetails->specialization = $validatedData['specialization'];
            // ... you can continue to update any other doctor-specific attributes here...
            $doctorDetails->save();
        } else {
            // Handle the error scenario where the doctor details couldn't be found
            return back()->with('error', 'Doctor details could not be updated.');
        }
    
        return back()->with('success', 'Profile updated successfully.');
    }         

    /**
     * Remove the specified doctor from the database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $doctor = User::where('role', 'doctor')->findOrFail($id);
        $doctor->delete();

        return redirect()->route('doctors.index')->with('success', 'Doctor deleted successfully.');
    }
}
