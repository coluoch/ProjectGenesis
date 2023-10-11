@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Appointment</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('appointments.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="patient_id">Patient:</label>
                            <select name="patient_id" id="patient_id" class="form-control">
                                @foreach ($patients as $patient)
                                <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="doctor_id">Doctor:</label>
                            <select name="doctor_id" id="doctor_id" class="form-control">
                                @foreach ($doctors as $doctor)
                                <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="appointment_date">Date:</label>
                            <input type="date" name="appointment_date" id="appointment_date" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="appointment_time">Time:</label>
                            <input type="time" name="appointment_time" id="appointment_time" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="status">Status:</label>
                            <select name="status" id="status" class="form-control">
                                <option value="scheduled">Scheduled</option>
                                <option value="rescheduled">Rescheduled</option>
                                <option value="cancelled">Cancelled</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Create Appointment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
