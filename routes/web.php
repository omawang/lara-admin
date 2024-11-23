<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/posts', \App\Livewire\Posts\Index::class)
    ->middleware(['auth'])
    ->name('posts');

require __DIR__ . '/auth.php';
