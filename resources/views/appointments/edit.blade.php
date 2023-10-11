@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Appointment</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('appointments.update', ['appointment' => $appointment->id]) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="patient_id">Patient:</label>
                            <select name="patient_id" id="patient_id" class="form-control">
                                @foreach ($patients as $patient)
                                    <option value="{{ $patient->id }}" {{ $appointment->patient_id == $patient->id ? 'selected' : '' }}>
                                        {{ $patient->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="doctor_id">Doctor:</label>
                            <select name="doctor_id" id="doctor_id" class="form-control">
                                @foreach ($doctors as $doctor)
                                    <option value="{{ $doctor->id }}" {{ $appointment->doctor_id == $doctor->id ? 'selected' : '' }}>
                                        {{ $doctor->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="appointment_date">Date:</label>
                            <input type="date" name="appointment_date" id="appointment_date" class="form-control" value="{{ $appointment->appointment_date }}" required>
                        </div>

                        <div class="form-group">
                            <label for="appointment_time">Time:</label>
                            <input type="time" name="appointment_time" id="appointment_time" class="form-control" value="{{ $appointment->appointment_time }}" required>
                        </div>

                        <div class="form-group">
                            <label for="status">Status:</label>
                            <select name="status" id="status" class="form-control">
                                <option value="scheduled" {{ $appointment->status === 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                                <option value="rescheduled" {{ $appointment->status === 'rescheduled' ? 'selected' : '' }}>Rescheduled</option>
                                <option value="cancelled" {{ $appointment->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Appointment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
