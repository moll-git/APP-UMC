<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', \App\Livewire\Home::class)->name('home');
    Route::get('/calendar', \App\Livewire\Calendar::class)->name('calendar');
    Route::get('/album', \App\Livewire\Album::class)->name('album');
    Route::get('/forum', \App\Livewire\Forum::class)->name('forum');
    Route::get('/concerts', \App\Livewire\Concerts::class)->name('concerts');
    Route::get('/configuracion', \App\Livewire\Configuracion::class)->name('configuracion');
    Route::get('/admin', \App\Livewire\Admin::class)->name('admin');
    
    Route::redirect('/dashboard', '/home')->name('dashboard');
    Route::get('/sheet_music', \App\Livewire\SheetMusic::class)->name('sheet_music');
    Route::post('/logout', function (\App\Livewire\Actions\Logout $logout) {
        $logout();
        return redirect('/');
    })->name('logout');
});

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
