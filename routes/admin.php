<?php

use Illuminate\Support\Facades\Route;

Route::get('/dashboard', \App\Livewire\Admin\Dashboard\Dashboard::class)->name('admin.home');
