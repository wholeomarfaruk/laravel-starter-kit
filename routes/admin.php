<?php

use App\Http\Controllers\Admin\FileUploadController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', \App\Livewire\Admin\Dashboard\Dashboard::class)->name('dashboard');

//user managements
Route::get('/users', App\Livewire\Admin\Users\Users::class)->name('users');

// Profile and Settings
Route::get('/profile', App\Livewire\Admin\Profile\Profile::class)->name('profile');
Route::get('/settings', App\Livewire\Admin\Settings\Settings::class)->name('settings');

//permissions
Route::get('/permissions/roles', App\Livewire\Admin\Permissions\RoleList::class)->name('roles.list');
Route::get('/permissions/role/create', App\Livewire\Admin\Permissions\RoleCreate::class)->name('roles.create');
Route::get('/permissions/role/edit/{id}', App\Livewire\Admin\Permissions\RoleCreate::class)->name('roles.edit');
Route::get('/permissions/panels', App\Livewire\Admin\Permissions\PanelList::class)->name('permissions.panels');

// System Settings
Route::get('/system-settings', App\Livewire\Admin\SystemSettings\SystemSettings::class)->name('system-settings');
Route::get('/system-settings/countries', App\Livewire\Admin\Settings\Countries::class)->name('settings.countries');
Route::get('/system-settings/genders',   App\Livewire\Admin\Settings\Genders::class)->name('settings.genders');

// Activity Log
Route::get('/activity-log', App\Livewire\Admin\ActivityLog\ActivityLog::class)->name('activity-log');

//uploads
Route::get('/uploads', App\Livewire\Admin\File\Uploads::class)->name('uploads');
Route::post('/upload', [FileUploadController::class, 'storeAdmin']);
Route::delete('/upload/revert', [FileUploadController::class, 'revertAdmin']);
