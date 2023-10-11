@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Doctor Details</div>

                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Name</th>
                                <td>{{ $doctor->name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $doctor->email }}</td>
                            </tr>
                            <tr>
                                <th>Specialization</th>
                                <td>{{ $doctor->specialization }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ route('doctors.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
