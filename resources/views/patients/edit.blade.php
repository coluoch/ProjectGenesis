@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Patient</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('patients.update', $patient->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $patient->name) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $patient->email) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $patient->phone) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea name="address" id="address" class="form-control" required>{{ old('address', $patient->address) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="medical_history">Medical History (optional)</label>
                            <textarea name="medical_history" id="medical_history" class="form-control">{{ old('medical_history', $patient->medical_history) }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Patient</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection