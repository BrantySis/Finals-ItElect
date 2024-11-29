<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Tenants;
use App\Livewire\Tenants\Index;
use App\Livewire\Tenants\Payments;
use App\Livewire\Tenants\Create;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/tenants', Index::class)->name('tenants.index'); 
    Route::get('/tenants-payments', Payments::class)->name('tenants.payments');
    Route::get('/tenants-create', Create::class)->name('tenants.create');

});

require __DIR__.'/auth.php';
