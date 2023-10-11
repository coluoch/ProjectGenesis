@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Appointment Details</div>

                <div class="card-body">
                    <h5>Patient: {{ $appointment->patient->name }}</h5>
                    <h5>Doctor: {{ $appointment->doctor->name }}</h5>
                    <p>Date: {{ $appointment->appointment_date }}</p>
                    <p>Time: {{ $appointment->appointment_time }}</p>
                    <p>Status: {{ ucfirst($appointment->status) }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
