<?php

use App\Http\Controllers\JournalController;
use App\Http\Controllers\ProfileController;
use App\Models\Journal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $countTuntas    = Journal::where('user_id', Auth::id())->where('keterangan', 'Tuntas')->count();
    $countTotal     = Journal::where('user_id', Auth::id())->count();

    return view('dashboard', compact('countTuntas', 'countTotal'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Route Profile
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });

    // Route Jurnal 
    Route::controller(JournalController::class)->group(function () {
        Route::get('/journals', 'index')->name('journals.index');
        Route::get('/journals/create', 'create')->name('journals.create');
        Route::get('/journals/store', 'store')->name('journals.store');
        Route::post('/journals/generate', 'generate')->name('journals.generate');
        Route::get('/journals/{journal}/edit', 'edit')->name('journals.edit');
        Route::put('/journals/{journal}', 'update')->name('journals.update');
    });
});

require __DIR__.'/auth.php';
