<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\HouseController as AdminHouseController;
use App\Http\Controllers\Admin\SystemLogController;
use App\Http\Controllers\Admin\GlobalSettingController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\ElectronicDeviceController;
use App\Http\Controllers\User\AlertController;
use App\Http\Controllers\User\HouseProfileController;
use App\Http\Controllers\User\EmergencyController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ElectricityReadingController;


Route::post('/api/electricity', [ElectricityReadingController::class, 'store']);
Route::get('/api/electricity/latest', [ElectricityReadingController::class, 'latest']);


// ======================================================
// PUBLIC
// ======================================================

Route::get('/', function () {
    return redirect()->route('login');
});

Route::post('/tes-simpan', function (\Illuminate\Http\Request $request) {
    return response()->json([
        'status' => 'success',
        'message' => 'Rute Web Berhasil!',
        'data' => $request->all()
    ]);
});

// ======================================================
// AUTHENTICATED
// ======================================================

Route::middleware(['auth'])->group(function () {

    // ==================================================
    // ADMIN
    // ==================================================

    Route::middleware('role:admin')
        ->prefix('admin')
        ->name('admin.')
        ->group(function () {

            // Dashboard
            Route::get('/dashboard', [
                AdminDashboardController::class,
                'index'
            ])->name('dashboard');


            // Data Rumah
            Route::resource('houses', AdminHouseController::class);

            Route::post('/houses/{house}/activate', [
                AdminHouseController::class,
                'activate'
            ])->name('houses.activate');

            Route::post('/houses/{house}/block', [
                AdminHouseController::class,
                'block'
            ])->name('houses.block');


            // System Logs
             Route::get('/activity-logs', [SystemLogController::class, 'index'])
            ->name('activity-logs.index');
            // Route::get('/logs', [
            //     SystemLogController::class,
            //     'index'
            // ])->name('logs.index');

            // Route::get('/logs/{log}', [
            //     SystemLogController::class,
            //     'show'
            // ])->name('logs.show');


            // Global Settings
            Route::get('/settings', [
                GlobalSettingController::class,
                'index'
            ])->name('settings.index');

            Route::put('/settings', [
                GlobalSettingController::class,
                'update'
            ])->name('settings.update');
        });


    // ==================================================
    // USER
    // ==================================================

   // ==================================================
// USER
// ==================================================

Route::middleware('role:user')
    ->prefix('user')
    ->name('user.')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [
            UserDashboardController::class,
            'index'
        ])->name('dashboard');


        // Electronic Devices
        Route::resource(
            'electronics',
            ElectronicDeviceController::class
        );


        // Alert Center
        Route::get('/alerts', [
            AlertController::class,
            'index'
        ])->name('alerts.index');

        Route::post('/alerts/{alert}/read', [
            AlertController::class,
            'read'
        ])->name('alerts.read');

        Route::post('/alerts/read-all', [
            AlertController::class,
            'readAll'
        ])->name('alerts.readAll');


        // House Profile
        Route::get('/profile', [
            HouseProfileController::class,
            'index'
        ])->name('profile.index');

        Route::put('/profile', [
            HouseProfileController::class,
            'update'
        ])->name('profile.update');


        // Emergency Power
        Route::post('/emergency/off', [
            EmergencyController::class,
            'off'
        ])->name('emergency.off');

        Route::post('/emergency/on', [
            EmergencyController::class,
            'on'
        ])->name('emergency.on');

    });

});