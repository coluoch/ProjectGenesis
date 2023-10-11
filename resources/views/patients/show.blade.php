@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Patient Details</div>

                <div class="card-body">
                    <h2>{{ $patient->name }}</h2>
                    <p><strong>Email:</strong> {{ $patient->email }}</p>
                    <p><strong>Phone:</strong> {{ $patient->phone }}</p>
                    <p><strong>Address:</strong> {{ $patient->address }}</p>

                    @if ($patient->medical_history)
                        <p><strong>Medical History:</strong></p>
                        <p>{{ $patient->medical_history }}</p>
                    @endif

                    <a href="{{ route('patients.index') }}" class="btn btn-primary">Back to Patients</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
