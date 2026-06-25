<?php

use App\Http\Controllers\Admin\BarangayController;
use App\Http\Controllers\Admin\BhwController;
use App\Http\Controllers\Admin\MunicipalityController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Bhw\ChildController;
use App\Http\Controllers\Bhw\OptCaseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ParentDashboardController;
use App\Http\Controllers\ReportController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.store');
});

Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

Route::middleware([
    'auth',
    RoleMiddleware::class . ':dswd',
])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::resource('municipalities', MunicipalityController::class);
        Route::resource('barangays', BarangayController::class);
        Route::resource('bhws', BhwController::class);
    });

Route::middleware([
    'auth',
    RoleMiddleware::class . ':bhw',
])
    ->prefix('bhw')
    ->name('bhw.')
    ->group(function () {
        Route::resource('children', ChildController::class);

        Route::get('/children/{child}/opt-cases/create', [OptCaseController::class, 'create'])
            ->name('opt-cases.create');

        Route::post('/children/{child}/opt-cases', [OptCaseController::class, 'store'])
            ->name('opt-cases.store');
    });

Route::middleware([
    'auth',
    RoleMiddleware::class . ':dswd,bhw',
])
    ->group(function () {
        Route::get('/reports', [ReportController::class, 'index'])
            ->name('reports.index');
    });

Route::middleware([
    'auth',
    RoleMiddleware::class . ':parent',
])
    ->group(function () {
        Route::get('/parent/dashboard', [ParentDashboardController::class, 'index'])
            ->name('parent.dashboard');
    });