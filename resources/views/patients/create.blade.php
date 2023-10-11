@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Patient</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('patients.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea name="address" id="address" class="form-control" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="medical_history">Medical History (optional)</label>
                            <textarea name="medical_history" id="medical_history" class="form-control"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Create Patient</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
