<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DoctorController extends Controller
{
    public function __construct()
    {
        $this->middleware('doctor')->except(['index', 'show']);
    }

    public function index()
    {
        $doctors = User::where('role', 'doctor')->get();
        return Inertia::render('Doctors/Index', ['doctors' => $doctors]);
    }

    public function create()
    {
        return Inertia::render('Doctors/Create');
    }

    public function store(Request $request)
    {
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

    public function show($id)
    {
        $doctor = User::where('role', 'doctor')->findOrFail($id);
        return Inertia::render('Doctors/Show', ['doctor' => $doctor]);
    }

    public function edit($id)
    {
        $doctor = User::where('role', 'doctor')->findOrFail($id);
        return Inertia::render('Doctors/Edit', ['doctor' => $doctor]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'specialization' => 'required',
        ]);

        $doctor = User::where('role', 'doctor')->findOrFail($id);
        $doctor->update($validatedData);

        return redirect()->route('doctors.index')->with('success', 'Doctor updated successfully.');
    }

    public function profile() 
    {
        $doctor = auth()->user();
        return Inertia::render('Doctors/Profile', ['doctor' => $doctor]);
    }

    public function updateProfile(Request $request) 
    {
        $user = auth()->user();

        if (!$user || !$user instanceof User) {
            return back()->with('error', 'User not authenticated or unexpected data type.');
        }

        if (!$user->isDoctor()) {
            return back()->with('error', 'User is not a doctor.');
        }

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            'specialization' => 'required',
        ]);

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->save();

        $doctorDetails = $user->doctorDetails;

        if ($doctorDetails) {
            $doctorDetails->specialization = $validatedData['specialization'];
            $doctorDetails->save();
        } else {
            return back()->with('error', 'Doctor details could not be updated.');
        }

        return back()->with('success', 'Profile updated successfully.');
    }

    public function destroy($id)
    {
        $doctor = User::where('role', 'doctor')->findOrFail($id);
        $doctor->delete();

        return redirect()->route('doctors.index')->with('success', 'Doctor deleted successfully.');
    }
}
