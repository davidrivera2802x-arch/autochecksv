<?php

use App\Http\Controllers\VehicleReportController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;

Route::get('/upgrade', [PaymentController::class, 'upgrade'])
    ->middleware('auth');

Route::post('/process-payment', [PaymentController::class, 'process'])
    ->middleware('auth');

Route::get('/mechanics', function () {

    $mechanics = \App\Models\Mechanic::all();

    return view('mechanics.index', compact('mechanics'));

})->middleware('auth');

Route::get('/admin/reports', function () {

    $reports = \App\Models\VehicleReport::latest()->get();

    return view('admin.reports', compact('reports'));

})->middleware('admin');

Route::get('/admin/users', function () {

    $users = \App\Models\User::latest()->get();

    return view('admin.users', compact('users'));

})->middleware('admin');

Route::get('/premium-report', function () {
    return 'Reporte Premium';
})->middleware('premium');

Route::get('/vin-report/{id}', [VehicleReportController::class, 'show'])
    ->middleware('auth')
    ->name('vin.show');

Route::get('/admin/dashboard', function () {

    $users = \App\Models\User::count();

    $reports = \App\Models\VehicleReport::count();

    $payments = \App\Models\Payment::count();

    $mechanics = \App\Models\Mechanic::count();

    return view('admin.dashboard', compact(
        'users',
        'reports',
        'payments',
        'mechanics'
    ));

})->middleware('admin');

Route::get('/vin-search', [VehicleReportController::class, 'index'])
    ->middleware('auth')
    ->name('vin.search');

Route::post('/vin-search', [VehicleReportController::class, 'store'])
    ->middleware('auth')
    ->name('vin.store');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/admin', function () {
    return 'Panel Administrador';
})->middleware('admin');

require __DIR__.'/auth.php';
