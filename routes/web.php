<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PatientController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Patients, Doctors, Appointments Resource Routes
Route::resource('patients', PatientController::class);
Route::resource('appointments', AppointmentController::class);

Route::group(['middleware' => ['auth']], function() {
    // Place your doctor-related routes here
    Route::middleware(['doctor'])->group(function () {
        Route::get('/doctor/profile', [DoctorController::class, 'profile'])->name('doctors.profile');
        Route::post('/doctor/profile', [DoctorController::class, 'updateProfile']);
        // ... other doctor-specific routes
    });
    Route::resource('doctors', 'DoctorController');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
