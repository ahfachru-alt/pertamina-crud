<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleOAuthController;
use App\Http\Controllers\Admin\ExportController;
use App\Http\Controllers\StreamController;

Route::view('/', 'welcome')->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

// Google OAuth
Route::get('/auth/google/redirect', [GoogleOAuthController::class, 'redirect'])
    ->name('oauth.google.redirect');
Route::get('/auth/google/callback', [GoogleOAuthController::class, 'callback'])
    ->name('oauth.google.callback');

// Admin login alias -> use same login but set intended
Route::get('/admin/login', function() {
    session(['url.intended' => route('admin.dashboard')]);
    return redirect()->route('login');
})->name('admin.login');

// Admin routes
Route::middleware(['auth','verified','role:Admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::view('/dashboard', 'Admin/Dashboard/index')->name('dashboard');

    // Table
    Route::view('/table', 'Admin/Table/index')->name('table.index');
    Route::view('/table/create', 'Admin/Table/create')->name('table.create');
    Route::view('/table/{id}/edit', 'Admin/Table/edit')->name('table.edit');

    // Users
    Route::view('/users', 'Admin/User/index')->name('user.index');
    Route::view('/users/create', 'Admin/User/create')->name('user.create');
    Route::view('/users/{id}/edit', 'Admin/User/edit')->name('user.edit');

    // Maps
    Route::view('/maps', 'Admin/Maps/index')->name('maps.index');
    Route::view('/maps/create', 'Admin/Maps/create')->name('maps.create');
    Route::view('/maps/{id}/edit', 'Admin/Maps/edit')->name('maps.edit');

    // Location
    Route::view('/locations', 'Admin/Location/index')->name('location.index');
    Route::view('/locations/create', 'Admin/Location/create')->name('location.create');
    Route::view('/locations/{id}/edit', 'Admin/Location/edit')->name('location.edit');

    // Contact
    Route::view('/contacts', 'Admin/Contact/index')->name('contact.index');
    Route::view('/contacts/create', 'Admin/Contact/create')->name('contact.create');
    Route::view('/contacts/{id}/edit', 'Admin/Contact/edit')->name('contact.edit');

    // Notifications & Messages
    Route::view('/notifications', 'Admin/Notifications/index')->name('notification');
    Route::view('/messages', 'Admin/Messages/index')->name('message');

    // Export
    Route::get('/export/stats', [ExportController::class, 'exportStats'])->name('export.stats');
});

// User routes
Route::middleware(['auth','verified','role:User'])->prefix('user')->name('user.')->group(function () {
    Route::view('/dashboard', 'User/Dashboard/index')->name('dashboard');
    Route::view('/maps', 'User/Maps/index')->name('maps');
    Route::view('/location', 'User/Location/index')->name('location');
    Route::view('/room', 'User/Room/index')->name('room');
    Route::view('/cctv', 'User/Cctv/index')->name('cctv');
    Route::view('/contact', 'User/Contact/index')->name('contact');
});

// Stream controls
Route::middleware(['auth','verified'])->group(function () {
    Route::post('/stream/{cctv}/start', [StreamController::class, 'start'])->name('stream.start');
    Route::delete('/stream/{cctv}/stop', [StreamController::class, 'stop'])->name('stream.stop');
});
