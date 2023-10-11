<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::all();
        return Inertia::render('Appointments/Index', ['appointments' => $appointments]);
    }

    public function create()
    {
        $doctors = User::where('role', 'doctor')->get();
        $patients = Patient::all();
        return Inertia::render('Appointments/Create', ['doctors' => $doctors, 'patients' => $patients]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:users,id',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required|date_format:H:i',
            'status' => 'required|in:scheduled,rescheduled,cancelled',
        ]);

        Appointment::create($validatedData);

        return redirect()->route('appointments.index')->with('success', 'Appointment created successfully.');
    }

    public function show($id)
    {
        $appointment = Appointment::findOrFail($id);
        return Inertia::render('Appointments/Show', ['appointment' => $appointment]);
    }

    public function edit($id)
    {
        $appointment = Appointment::findOrFail($id);
        $doctors = User::where('role', 'doctor')->get();
        $patients = Patient::all();
        return Inertia::render('Appointments/Edit', ['appointment' => $appointment, 'doctors' => $doctors, 'patients' => $patients]);
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:users,id',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required|date_format:H:i',
            'status' => 'required|in:scheduled,rescheduled,cancelled',
        ]);

        $appointment = Appointment::findOrFail($id);
        $appointment->update($validatedData);

        return redirect()->route('appointments.index')->with('success', 'Appointment updated successfully.');
    }

    public function destroy(string $id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        return redirect()->route('appointments.index')->with('success', 'Appointment deleted successfully.');
    }
}
