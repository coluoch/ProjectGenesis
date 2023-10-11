@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Doctor</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('doctors.update', $doctor->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $doctor->name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ $doctor->email }}" required>
                        </div>

                        <div class="form-group">
                            <label for="specialization">Specialization</label>
                            <input type="text" name="specialization" id="specialization" class="form-control" value="{{ $doctor->specialization }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Doctor</button>
                        <a href="{{ route('doctors.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
