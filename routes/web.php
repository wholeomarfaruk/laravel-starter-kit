<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\Website\Home\Home::class)->name('home');
Route::get('/projects', \App\Livewire\Website\Projects\Projects::class)->name('projects');
Route::get('/projects/{slug}', \App\Livewire\Website\Projects\ProjectDetails::class)->name('projects.details');
Route::get('/offers', \App\Livewire\Website\Offers\Offers::class)->name('offers');
Route::get('/blogs',\App\Livewire\Website\Blogs\Blogs::class)->name('blogs');
Route::get('/contact-us',\App\Livewire\Website\contact\ContactUs::class)->name('contact');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/test',function (){
    return view('test');
});
