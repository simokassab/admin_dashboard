<?php

use Illuminate\Support\Facades\Route;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', \App\Livewire\Dashboard::class)->name('dashboard');
//    route for edit project
    Route::get('/projects/{project}', \App\Livewire\Projects\Edit::class)->name('editProject');
    Route::get('/projects/{project}/details', \App\Livewire\Projects\Details::class)->name('projectDetails');
    Route::get('/integrations/{tracking}/details', \App\Livewire\Tracking\Index::class)->name('TrackingDetails');

});
