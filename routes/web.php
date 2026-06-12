<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', \App\Livewire\Home::class)->name('home');
    Route::get('/calendar', \App\Livewire\Calendar::class)->name('calendar');
    Route::get('/album', \App\Livewire\Album::class)->name('album');
    Route::get('/forum', \App\Livewire\Forum::class)->name('forum');
    Route::get('/concerts', \App\Livewire\Concerts::class)->name('concerts');
    
    Route::redirect('/dashboard', '/home')->name('dashboard');
});

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
