@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Appointments</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Patient</th>
                                <th>Doctor</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($appointments as $appointment)
                            <tr>
                                <td>{{ $appointment->id }}</td>
                                <td>{{ $appointment->patient->name }}</td>
                                <td>{{ $appointment->doctor->name }}</td>
                                <td>{{ $appointment->appointment_date->format('Y-m-d') }}</td>
                                <td>{{ $appointment->appointment_time }}</td>
                                <td>{{ $appointment->status }}</td>
                                <td>
                                    <a href="{{ route('appointments.show', $appointment->id) }}" class="btn btn-primary btn-sm">View</a>
                                    <a href="{{ route('appointments.edit', $appointment->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this appointment?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7">No appointments available.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <a href="{{ route('appointments.create') }}" class="btn btn-success">Add Appointment</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
